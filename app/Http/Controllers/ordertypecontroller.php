<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ordertype;
class ordertypecontroller extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|string|unique:ordertypes,name',
            'classname' => 'string'
        ]);
        

        ordertype::create([
            'name' => $request->name,
            'classname' => $request->price
        ]);

        return ordertype::all()->toJson();
    }

 
    public function show($id)
    {
        $ordertype = ordertype::find($id);
        if(!$ordertype)
        {
            return response()->json(['message' => 'order type not found']);
        }
        return $ordertype->toJson();
    }

   public function showAll()
   {
    return ordertype::all()->toJson();
   }

    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'bail|string|unique:ordertypes,name',
            'classname' => 'string'
        ]);

        $ordertype = ordertype::find($id);
        if(!$ordertype)
        {
            return response()->json(['message' => 'order type not found']);
        }
        
        if($request->name){
            $ordertype->name = $request->name;
        }

        if($request->classname){
            $ordertype->classname = $request->classname;
        }
        
        

        $ordertype->save();

        return $ordertype->toJson();
    }


    public function destroy($id)
    {
        $ordertype = ordertype::find($id);
        if(!$ordertype)
        {
            return response()->json(['message' => 'order type not found']);
        }

        $ordertype->delete();
        return ordertype::all()->toJson();        
    }
}
