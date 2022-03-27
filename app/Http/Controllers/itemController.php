<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;

class itemController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|string|unique:items,name',
            'price' => 'required|numeric|gt:0'
        ]);
        

        item::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return item::all()->toJson();
    }

 
    public function show($id)
    {
        $item = item::find($id);
        if(!$item)
        {
            return response()->json(['message' => 'item not found']);
        }
        return $item->toJson();
    }

   public function showAll()
   {
    return item::all()->toJson();
   }

    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'bail|string|unique:items,name',
            'price' => '|numeric|gt:0'
        ]);

        $item = item::find($id);
        if(!$item)
        {
            return response()->json(['message' => 'item not found']);
        }
        
        if($request->name){
            $item->name = $request->name;
        }

        if($request->price){
            $item->price = $request->price;
        }
        
        if($request->description){
            $item->description = $request->description;
        }

        $item->save();

        return $item->toJson();
    }


    public function destroy($id)
    {
        $item = item::find($id);
        if(!$item)
        {
            return response()->json(['message' => 'item not found']);
        }

        $item->delete();
        return item::all()->toJson();        
    }
}
