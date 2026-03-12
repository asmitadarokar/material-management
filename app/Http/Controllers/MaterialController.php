<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Category;

class MaterialController extends Controller
{
    // Show Material List
    public function MaterialList(){
        $materials = Material::with('category')->latest()->paginate(10);
        return view('material.list')->with('materials', $materials);
    }
    // Add Material Form
    public function AddMaterial() {
        $categories = Category::whereNull('deleted_at')->get();
        return view('material.add')->with('categories', $categories);
    }
    // Store Material Data
    public function StoreMaterial(Request $request) {
            $request->validate([
            'category_id' => 'required',
            'material_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/u|max:255',
            'opening_balance' => 'required|numeric',
        ]);

        Material::create([
            'category_id' => $request->category_id,
            'name' => $request->material_name,
            'opening_balance' => $request->opening_balance
        ]);
        return redirect()->route('material.list')->with('success','Material Added Successfully');
    }
    // Edit Material Form
    public function EditMaterial($id){
        $material = Material::findOrFail($id);
        $categories = Category::whereNull('deleted_at')->get();
        return view('material.edit',compact('categories', 'material'));
    }
    // Update Material Data
    public function UpdateMaterial(Request $request, $id) {
        $request->validate([
            'category_id' => 'required',
            'material_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/u|max:255',
            'opening_balance' => 'required|numeric',
        ]);
       $material = Material::findOrFail($id);
        $material->update([
            'category_id' => $request->category_id,
            'name' => $request->material_name,
            'opening_balance' => $request->opening_balance
        ]);
        return redirect()->route('material.list')->with('success','Material updated successfully');
    }
    // Delete Material data by id
    public function DeleteMaterial($id){
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->route('material.list')->with('success','Material deleted successfully');
    }
}
