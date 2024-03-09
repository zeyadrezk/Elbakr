<?php

namespace App\Http\Controllers\mid;

use App\Http\Controllers\Controller;
use App\Models\AskPriceCategory;
use App\Models\Work;

class OurWorkController extends Controller
{
    public function DuctWork()
    {
        $works  = Work::where('type','duct')->get();
        $ask_categories = AskPriceCategory::get();
        $title = 'أعمال ال Duct';
        $description = 'تعرف علي أعمال تمديدات الهواء التي نقدمها ';

        return view('mid.ourWorks',compact('works','ask_categories','title','description'));

    }
    public function repairWork()
    {
        $works  = Work::where('type','repair')->get();
        $ask_categories = AskPriceCategory::get();
        $title = 'أعمال الصيانة';
        $description = 'تعرف علي أعمال الصيانة الخاصة بنا ';

        return view('mid.ourWorks',compact('works','ask_categories','title','description'));

    }



}
