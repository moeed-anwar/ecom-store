<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    // public function index(){
    //     $categories = Category::count();
    //     $products = Product::count();
    //     return view('admin.dashboard',compact('products','categories'));
    // }
    public function index()
{
    $totalCategories = Category::count();
    $totalProducts = Product::count();
    $totalOrders = Order::count();
    $recentCategories = Category::latest()->take(4)->get();
    $recentProducts = Product::latest()->take(4)->get();
    $recentOrders = Order::latest()->take(4)->get();
    return view('admin.dashboard',compact('totalCategories','totalOrders','totalProducts','recentCategories','recentProducts','recentOrders'));
}
}
