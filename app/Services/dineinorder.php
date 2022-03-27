<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\orderinfo;
use App\Models\order;

class dineinorder extends orderservice{
 
    function __construct($request) {
        parent::__construct($request);
     }

     public function createorder(){
        
        $order =  parent::createorder();
        $info = $this->request->orderinfo;
        $data = [
            'orderid' => $order->id,
            'name' =>   $info['name'],
            'table' =>   $info['table'],
            'servicecharge' =>   $info['servicecharge']
        ];
        $orderinfo = orderinfo::create($data);

        $order->orderinfoid =  $orderinfo->id;
        $order->save();

        return order::with(['orderinfo', 'orderitems'])->where('id',$order->id)->get(); 
     }
}