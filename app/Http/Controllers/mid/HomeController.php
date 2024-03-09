<?php

namespace App\Http\Controllers\mid;

use App\Http\Controllers\Controller;
use App\Models\AskPriceCategory;
use App\Models\Branch;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProjectCategory;
use App\Models\Work;

class HomeController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::get();
        $branches = Branch::get();
        $project_categories = ProjectCategory::get();
        $work_Duct = Work::where('type','duct')->get();
        $our_work = Work::where('type','repair')->get();
        $products = Product::with('category', 'brand')->take(9)->get();
        $products2 = Product::with('category', 'brand')->take(9)->get();
        $ask_categories = AskPriceCategory::get();
        $chunks_products = $products->chunk(3);
        $chunks_Acc = $products2->chunk(3);
        return view('mid.home', compact('categories'
            ,'branches','project_categories','work_Duct','our_work','chunks_products','chunks_Acc','ask_categories'));
    }






}
