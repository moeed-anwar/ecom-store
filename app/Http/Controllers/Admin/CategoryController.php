<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate();
        return view('admin.categories.index',compact('categories'));
    }
    public function create(){
        return view('admin.categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
         $data = [
           'name' => $request->name,
           'slug' => Str::slug($request->name),
           'description' => $request->description 
        ];
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/categories'), $imageName);
            $data['image'] = 'images/categories/' . $imageName;
        }
        Category::create($data);
        
        return redirect()->route('admin.categories.index')->with('success','Category created succesfully');
    }
    public function edit(Category $category){
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request,Category $category){
                $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
         $data = [
           'name' => $request->name,
           'slug' => Str::slug($request->name),
           'description' => $request->description 
        ];
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/categories'), $imageName);
            $data['image'] = 'images/categories/' . $imageName;
        }
        $category->update($data);
        
        return redirect()->route('admin.categories.index')->with('success','Category updated succesfully');
    }



    public function destroy(Category $category){

         if ($category->products()->count()) {
        return redirect()->route('admin.categories.index')
            ->with('error', 'Cannot delete category because it has related products.');
    }

    
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','Category Deleted Successfully');
    }
    
}
