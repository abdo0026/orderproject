<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\order;
class takeawayorder extends orderservice{
 
    function __construct($request) {
        parent::__construct($request);
     }

     public function createorder(){
        
        $order =  parent::createorder();
        
        return order::with('orderitems')->where('id',$order->id)->get(); 
     }
}