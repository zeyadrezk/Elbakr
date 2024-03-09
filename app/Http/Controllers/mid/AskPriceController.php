<?php

namespace App\Http\Controllers\mid;

use App\Http\Controllers\Controller;
use App\Models\AskPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AskPriceController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'ask_category_id' => 'required|numeric', // Adjust the field name as necessary
            'message' => 'required|string',
        ]);
        $otp = $request->otp;
        $email = $request->email;
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $ask_price = new AskPrice();
        $ask_price->f_name = $request->f_name;
        $ask_price->l_name = $request->l_name;
        $ask_price->email = $request->email;
        $ask_price->phone = $request->phone;
        $ask_price->ask_price_category_id = $request->ask_category_id;
        $ask_price->message = $request->message;
        $ask_price->save();

        return redirect()->back()->withSuccess('تم ارسال طلب السعر بنجاح ');
    }




}
