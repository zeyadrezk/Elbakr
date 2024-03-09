<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Mail\reset;
use App\Mail\Verify;
use App\Models\DeviceId;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use ApiTrait;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(422, 'failed', $validator->errors(), null);
        }


        $user = new User;
        $user->email = $request->input('email') ?? null;
        $user->f_name = 'user';
        $user->l_name = 'user';
        $user->phone = $request->input('email');
        $user->password = hash::make($request->input('password'));
        $user->save();

        $email = $user->email;
        return $this->sendOtp($request);
    }

    public function sendOtp(Request $request)
    {
        $email = $request->input('email');
        do {
            $otp = random_int(10000, 99999);
        } while (User::where('otp', $otp)->exists());
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->otp = $otp;
            $user->save();
            $email = $user->email;
            Mail::to($email)->send(new Verify($email, $otp));

            return $this->ApiResponse(200, 'تم ارسال كود التحقق بنجاح', null, ['email' => $email]);
        }

        return $this->ApiResponse(422, 'البريد الالكتروني غير صحيح', null, null);
    }

    public function checkotp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:5',
            'email' => 'required|email',
        ]);

        // If validation passes, you can access the OTP values
        $otp = $request->otp;
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user->otp == $otp) {
            return $this->ApiResponse(200, 'success', null, ['email' => $email]);
        }

        return $this->ApiResponse(422, 'كود التحقق غير صحيح', null, ['email' => $email]);

    }

    public function completeRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'phone' => 'required|unique:users|min:10|max:15',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|email',
            'otp' => 'required|numeric|digits:5',
//            'fcm_token'=>'required|string'
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            $email = $request->input('email');
            return $this->ApiResponse(422, 'failed', $validator->errors(), null);
        }

        $email = $request->input('email');
        $otp = $request->input('otp');
        $user = User::where('email', $email)->where('otp', $otp)->first();

        if ($user) {
            $user->f_name = $request->input('f_name');
            $user->l_name = $request->input('l_name');
            $user->phone = '+966' . $request->input('phone');
            $user->email = $email;
            $user->email_verified_at = now();
            $user->otp = null;
            $user->password = Hash::make($request->input('password'));

            $success['token'] = $user->createToken($user->f_name)->plainTextToken;
            $success['f_name'] = $user->f_name;
            $success['l_name'] = $user->l_name;
            $success['email'] = $user->email;
            $success['phone'] = $user->phone;
            $user->save();

//            $device_id = new DeviceId();
//            $device_id->fcm_token = $request->fcm_token;
//            $device_id->user_id = $user->id;
//            $device_id->save();


            return $this->ApiResponse(200, 'success', null, $success);
        }
        return $this->ApiResponse(422, 'كود التحقق غير صحيح ', null, ['email' => $email]);
    }




    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
//            'fcm_token'=>'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] =  $user->createToken($user->f_name)->plainTextToken;

//            $user->fcm_token = $request->fcm_token;
//            $success['token'] = $user->createToken($user->f_name)->plainTextToken;
            $success['f_name'] = $user->f_name;
            $success['l_name'] = $user->l_name;
            $success['email'] = $user->email;
            $success['phone'] = $user->phone;

            return $this->ApiResponse(200, 'success', null, $success);
        }

        // Authentication failed...
        return $this->ApiResponse(422, 'البريد الالكترني او كلمة المرور غير صحيحة ', null, null);

    }


    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric|digits:5',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $otp = $request->otp;
        $email = $request->email;
        // Check if validation fails
        if ($validator->fails()) {
            $email = $request->input('email');
            return $this->ApiResponse(422, 'failed',  $validator->errors(), null);
        }


        $user = User::where('email', $email)->first();
        if($user == null){
            return $this->ApiResponse(422, 'البريد الالكتروني غير صحيح ', null, null);
        }
        // If the user exists and the OTP is correct
        if ($user && $user->otp == $otp) {

            // Update the user's password
            $user->password = hash::make($request['password']);
            $user->save();

            return $this->ApiResponse(200, 'success', null, null);
            }

        // If the OTP validation fails, return to the view with errors
        return $this->ApiResponse(422, 'otp is wrong', null,null);

    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return $this->ApiResponse(200, 'تم تسجيل الخروج بنجاح', null, null);

    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(422, 'Validation failed', $validator->errors(), null);
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $user = Auth::user();
        // Check if the provided email matches the authenticated user's email
        if ($user->email !== $email || !Hash::check($password, $user->password)) {
            return $this->ApiResponse(403, 'البريد الالكتروني او كلمة المرور غير صحيح', null, null);
        }

        // If both email and password match, delete the user
        $user->delete();
        return $this->ApiResponse(200, 'تم حذف الحساب بنجاح', null, null);
    }



}
