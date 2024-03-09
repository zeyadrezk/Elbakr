<?php

namespace App\Http\Controllers\mid;

use App\Http\Controllers\Controller;
use App\Mail\reset;
use App\Mail\Verify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique',
        ]);

        $user = User::onlyTrashed()->where('email', $request->email)->first();

        if($user){
            $user->restore(); // Restore the user account
            Auth::logout(); // Log out the user
            $email = $user->email;
            return redirect()->route('user.send.otp', compact('email'))->with('success', 'تم استعادة الحساب ');

        }else {
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $user = new User;
            $user->email = $request->input('email') ?? null;
            $user->f_name = 'user';
            $user->l_name = 'user';
            $user->phone = $request->input('email');
            $user->password = hash::make($request->input('password'));
            $user->save();

            $email = $user->email;

            return redirect()->route('user.send.otp', compact('email'));
        }

    }

    public function sendOtp(Request $request)
    {
        $email = $request->email;
        do {
            $otp = random_int(10000, 99999);
        } while (User::where('otp', $otp)->exists());
        $user = User::where('email', $email)->first();
        if($user) {
            $user->otp = $otp;
            $user->save();
            $email = $user->email;
            Mail::to($email)->send(new Verify($email, $otp));

            return view('mid.user.verify_mail', compact('email'));
        }
        return redirect()->back()->withErrors('البريد الالكتروني غير صحيح ');
    }


    public function checkotp(Request $request)
    {
        $request->validate([
            'n1' => 'required|numeric|digits:1',
            'n2' => 'required|numeric|digits:1',
            'n3' => 'required|numeric|digits:1',
            'n4' => 'required|numeric|digits:1',
            'n5' => 'required|numeric|digits:1',
            'email' => 'required|email',
        ]);

        // If validation passes, you can access the OTP values
        $otp = $request->n1 . $request->n2 . $request->n3 . $request->n4 . $request->n5;
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user->otp == $otp) {
            return view('mid.user.complete_register', compact('email'));
        }

        return redirect()->back()->withErrors(['error' => 'الرقم السري المتغير غير صحيح ']);

    }

    //public function completeRegister
    public function completeRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'phone' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|email'
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            $email = $request->input('email');
            return view('mid.user.complete_register', ['email' => $email])->withErrors($validator);
        }

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        $user->f_name = $request->input('f_name');
        $user->l_name = $request->input('l_name');
        $user->phone = $request->input('phone');
        $user->email =$email;
        $user->otp = null ;
        $user->password = Hash::make($request->input('password'));

        $user->save();


        return redirect()->route('user.home'); // Redirect to success route
    }




    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('user.home'); // Redirect to dashboard after successful login
        }

        // Authentication failed...
        return redirect()->back()->withErrors(['email' => 'البريد الالكتروني او كلمة المرور غير صحيح ']);

    }

    public function sendOtpPassword(Request $request)
    {
        $email = $request->email;
        do {
            $otp = random_int(10000, 99999);
        } while (User::where('otp', $otp)->exists());
        $user = User::where('email', $email)->first();
        if($user) {
            $user->otp = $otp;
            $user->save();
            $email = $user->email;
            Mail::to($email)->send(new reset($email, $otp));
            return view('mid.user.check_forget_password', compact('email'));
        }
        return redirect()->back()->withErrors('البريد الالكتروني غير صحيح ');
    }


    public function checkOtpPassword(Request $request)
    {
        $request->validate([
            'n1' => 'required|numeric|digits:1',
            'n2' => 'required|numeric|digits:1',
            'n3' => 'required|numeric|digits:1',
            'n4' => 'required|numeric|digits:1',
            'n5' => 'required|numeric|digits:1',
            'email' => 'required|email',
        ]);

        // If validation passes, you can access the OTP values
        $otp = $request->n1 . $request->n2 . $request->n3 . $request->n4 . $request->n5;
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user->otp == $otp) {
            return view('mid.user.reset_password', compact('email','otp'));
        }
        return redirect()->back()->withErrors(['error' => 'الرقم السري المتغير غير صحيح ']);
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
            return view('mid.user.reset_password', ['email' => $email,'otp'=>$otp])->withErrors($validator);
        }


        $user = User::where('email', $email)->first();
        // If the user exists and the OTP is correct
        if ($user && $user->otp == $otp) {
            // Update the user's password
            $user->password = bcrypt($request['password']);
            $user->save();

            // Redirect the user to the desired page
            return redirect()->route('user.login.form')->with('success', 'تم تغيير كلمة المرور بنجاح');
        }

        // If the OTP validation fails, return to the view with errors
        return view('mid.user.reset_password', compact('email','otp'))->withErrors(['otp' => 'الرقم السري المتغير غير صحيح']);
    }







}
