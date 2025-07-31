<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:gif,avif,jpeg,jpg,png
            |max:2048',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'sometimes|boolean'
        ]);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_active' => $request->is_active
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $imageName);
            $data['image'] = 'images/products/' . $imageName;
        }
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success','Product added successfully');
    }
    public function edit(Product $product){
        $categories = Category::all();
        return view('admin.products.edit',compact('product','categories'));
    }
    public function update(Request $request,Product $product){
          $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:gif,jpeg,jpg,png',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'sometimes|boolean'
        ]);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_active' => $request->is_active
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/prodcuts'), $imageName);
            $data['image'] = 'images/products/' . $imageName;
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success','Product updated successfully');
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Product deleted successfully');
    }
}
