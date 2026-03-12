<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Show Category List
    public function CategoryList(){
        // $categories = category::all();
        $categories = Category::latest()->get();
        return view('Category.list')->with('categories', $categories);
    }
    // Add Category Form
    public function AddCategory() {
        return view('Category.add');
    }
    // Store Category Data
    public function StoreCategory(Request $request) {
        $request->validate(['name' => 'required|unique:categories']);

        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('category.list')->with('success', 'Category created!');
    }
    // Edit Category Form
    public function EditCategory($id){
         $categories = category::all();
         $category = Category::findOrFail($id);
        //  print_r($category); die;
         return view('Category.edit')->with('category', $category);;
    }
    // Update Category Data
    public function UpdateCategory(Request $request, $id) {
        $request->validate(['name' => 'required|unique:categories,name,'.$id]);
        $category = Category::findOrFail($id);
        $category->update([ 'name' => $request->name ]);
        return redirect()->route('category.list')->with('success','Category updated successfully');
    }
    // Delete Category Data by id
    public function DeleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.list')
            ->with('success','Category deleted successfully');
    }
}
