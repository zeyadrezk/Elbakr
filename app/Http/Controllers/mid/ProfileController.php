<?php

namespace App\Http\Controllers\mid;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function logout(Request $request)
    {
//        $user = Auth::user();
//        $user->logout();
//        return redirect()->route('user.login.form')->with('success','تم تسجيل الخروج بنجاح ');

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login.form')->with('success','تم تسجيل الخروج بنجاح ');
    }

    public function profile(Request $request)
    {
//        mid.user.editProfile
        $user = Auth::user();

        return view('mid.user.editProfile', compact('user'));
    }


    public function editProfile(Request $request)
    {
        $validatedData = $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);


        $user = Auth::user();
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('user.profile')->with('success','تم تعديل بياناتك الشخصية بنجاح ');

    }

    public function DeleteAccount(Request $request)
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('user.home')->with('success','تم حذف الحساب ');

    }

    public function changePassword(Request $request)
    {
        return view('mid.user.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

// Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة'])->withInput();
        }

        // Update the user's password
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.home')->with('success', 'تم تغيير كلمة المرور بنجاح ');

    }


    public function favourite(Request $request)
    {
        $favourite = Favourite::with('products','accessories')
            ->where('user_id',Auth::id())
            ->first();


        if ($favourite !== null) {
            $productsCount = $favourite->products->count();
            $accessoriesCount = $favourite->accessories->count();

            if ($productsCount > 0 || $accessoriesCount > 0) {


            } else {


                return view ( 'mid.user.favourite');
            }
        } else {

            return view ( 'mid.user.favourite_null');
        }


    }


}
