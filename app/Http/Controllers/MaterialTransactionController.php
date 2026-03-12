<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Category;
use App\Models\MaterialTransaction;

class MaterialTransactionController extends Controller
{
    public function CreateMaterialInOut(){
        $categories = Category::whereNull('deleted_at')->get();
        $materials = Material::whereNull('deleted_at')->get();
        return view('material_transactions.add',compact('categories','materials'));
    }
    public function StoreMaterialInOut(Request $request){
        $request->validate([
            'material_id' => 'required',
            'date' => 'required',
            'quantity' => 'required|numeric'
        ]);

        MaterialTransaction::create([
            'material_id' => $request->material_id,
            'date' => $request->date,
            'quantity' => $request->quantity
        ]);
        return redirect()->back()->with('success','Material Transaction Saved Successfully');
        // return redirect()->route('inward.create')->with('success','Material Transaction Added Successfully');
    }
}
