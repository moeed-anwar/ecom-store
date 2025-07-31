<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index(){
        $categories = Category::withCount('products')->get();
        return view('categories.index',compact('categories'));
    }

    public function show($slug){
        $category = Category::where('slug',$slug)->with('products')->FirstorFail();
        $products = $category->products()->paginate(12)->withQuerystring();
        return view('categories.show',compact('products','category'));
    }
}
