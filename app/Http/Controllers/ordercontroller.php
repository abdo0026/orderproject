<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\takeawayorder;
use App\Services\deliveryorder;
use App\Services\dineinorder;

class ordercontroller extends Controller
{
   


  
    public function store(Request $request)
    {
        $ordertype = $request->ordertype;
        
        $service;

        switch ($ordertype) {
            case "takeaway":
                $validatedData = $request->validate([
                    'userid' => 'bail|required|numeric|gt:0|exists:users,id',
                    'ordertypeid' => 'bail|required|numeric|gt:0|exists:ordertypes,id',
                    'orderitems' => 'bail|required|array',
                    'totalprice' => 'numeric|gt:-1',
                    'totalitems' => 'numeric|gt:0',
                    'Notes' => 'string',
        
                    'orderitems.*.itemid' => 'bail|required|numeric|gt:0|exists:items,id',
                    'orderitems.*.price' => 'bail|required|numeric|gt:-1',
                    'orderitems.*.qty' => 'bail|required|numeric|gt:0',
                    'orderitems.*.Notes' => 'string'
        
                ]);
                $service = new takeawayorder($request);
              break;


            case "delivery":
                $validatedData = $request->validate([
                    'userid' => 'bail|required|numeric|gt:0|exists:users,id',
                    'ordertypeid' => 'bail|required|numeric|gt:0|exists:ordertypes,id',
                    'orderitems' => 'bail|required|array',
                    'totalprice' => 'numeric|gt:-1',
                    'totalitems' => 'numeric|gt:0',
                    'Notes' => 'string',
        
                    'orderitems.*.itemid' => 'bail|required|numeric|gt:0|exists:items,id',
                    'orderitems.*.price' => 'bail|required|numeric|gt:-1',
                    'orderitems.*.qty' => 'bail|required|numeric|gt:0',
                    'orderitems.*.Notes' => 'string',

                    'orderinfo.name' => 'bail|required|string',
                    'orderinfo.phone' => 'bail|required|numeric|gt:0',
                    'orderinfo.deleveryfees' => 'bail|required|numeric|gt:-1'
        
                ]);
                $service = new deliveryorder($request);
              break;



            case "dinein":
                $validatedData = $request->validate([
                    'userid' => 'bail|required|numeric|gt:0|exists:users,id',
                    'ordertypeid' => 'bail|required|numeric|gt:0|exists:ordertypes,id',
                    'orderitems' => 'bail|required|array',
                    'totalprice' => 'numeric|gt:-1',
                    'totalitems' => 'numeric|gt:0',
                    'Notes' => 'string',
        
                    'orderitems.*.itemid' => 'bail|required|numeric|gt:0|exists:items,id',
                    'orderitems.*.price' => 'bail|required|numeric|gt:-1',
                    'orderitems.*.qty' => 'bail|required|numeric|gt:0',
                    'orderitems.*.Notes' => 'string',


                    'orderinfo.name' => 'bail|required|string',
                    'orderinfo.table' => 'bail|required|numeric|gt:0',
                    'orderinfo.servicecharge' => 'bail|required|numeric|gt:-1'
                ]);
                $service = new dineinorder($request);
              break;
              
            default:
              return response()->json(['message' => 'un known order type']);
          }

        
        
        
        return $service->createorder();
    }



    public function additem(Request $request)
    {
        
        $validatedData = $request->validate([
            'orderid' => 'bail|required|numeric|gt:0|exists:orders,id',
            'itemid' => 'bail|required|numeric|gt:0|exists:items,id',
            'price' => 'bail|required|numeric|gt:-1',
            'qty' => 'bail|required|numeric|gt:0',
            'Notes' => 'string'

        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
     
    }
}
