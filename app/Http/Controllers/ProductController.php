<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::where('is_active',true)->paginate(12)->withQuerystring();
        return view('products.index',compact('products')); 
    }

    public function show($slug){
        $product = Product::where('slug',$slug)
                        ->where('is_active',true)
                        ->with('category')
                        ->FirstorFail();
        $relatedProducts = Product::where('category_id',$product->category_id)
                                        ->where('is_active',true)
                                        ->inrandomOrder()
                                        ->limit(4)
                                        ->get();
        return view('products.show',compact('product','relatedProducts'));
    }
}
