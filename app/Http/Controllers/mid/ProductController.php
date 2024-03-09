<?php

namespace App\Http\Controllers\mid;

use App\Http\Controllers\Controller;
use App\Models\AskPriceCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productByCategory(Request $request)
    {
        $category_id = $request->category_id;
        if($category_id ) {
            $category = ProductCategory::where('id', $category_id)->first();
            $products = Product::with('category', 'brand')->where('product_category_id', $category_id)->paginate(9);
        }else{
            $category = "اجهزة التكييف";
            $products = Product::with('category', 'brand')->paginate(9);
        }

        $ask_categories = AskPriceCategory::get();

        return view('mid.products', compact('products','category','ask_categories'));
    }


}
