<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class InventoryController extends Controller
{
    public function create(Request $request){
        
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'quantity'=>'required',
            'price'=>'required',
            'category'=>'required',
        ]);
        $insert=Inventory::create($data);
        $insert->save();
        return response()->json([
            'status'=>true,
            'message'=>'Record Inserted',
            'data'=>$insert,
        ]);
    }

    public function show(Request $request){
        $show=Inventory::all();
        return response()->json([
            'status'=>true,
            'message'=>"All Inventory ",
            'data'=>$show
        ]);
    }

    public function showById(Request $request, $id){
        $showById=Inventory::find($id);
        if ($showById) {  
            return reponse()->json([
                'status'=>true,
                'message'=>"Inventory Found",
                'data'=>$showById
            ]);
        }
        else {
        $showAll=Inventory::all();
        return response()->json([
            'status'=>true,
            'message'=>"All Inventory ",
            'data'=>$showAll
        ]);
            
        }
    }

    public function update(Request $request, $id){

        $update=Inventory::find($id);
        if ($update) {
            $data=$request->validate([
                'name'=>'required|string|max:255',
                'quantity'=>'required',
                'price'=>'required',
                'category'=>'required',
            ]);
            $insert=Inventory::create($data);
            $insert->save();
            return  response()->json([
                'status'=>true,
                'message'=>'Record Found and Updated Successfully',
                'data'=>$data,
            ]);
        } else {
            return  response()->json([
                'status'=>true,
                'message'=>'Record not Found ',
                'data'=>null,
            ]);
        }
    }

    public function delete (Request $request, $id){
        $delete=Inventory::find($id);
        if ($delete) {
            $delete->delete();
            return  response()->json([
                'status'=>true,
                'message'=>'Record Found and Deleted Successfully',
                'data'=>null,
            ]);
        } else {
            
            return  response()->json([
                'status'=>true,
                'message'=>'Record not Found',
                'data'=>null,
            ]);
        }
        

    }


}
