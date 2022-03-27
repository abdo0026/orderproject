<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\item;
use App\Models\orderitems;

abstract class orderservice {

    protected $request;    

    
    function __construct($request) {
       $this->request = $request;
    }

    public function createorder(){
      
      // create order header
      $data = $this->request->all();
      $items = $data['orderitems'];

       if(!$this->request->totalprice){
         $data += ['totalprice' => 0];
       }   

       if(!$this->request->totalitems){
         $data += ['totalitems' => count($items)];
       }   
       

      $order =  order::create($data);


      // create order detail
      $orderid = $order->id;
      $total_qty = 0;
      $total_price = 0;
      foreach ($items as $item) {
         $item += ['orderid' => $orderid];
         
         if(!$item['price']){
            $i = item::find(item['itemid']);           
            $item += ['price' => $i->price];
         }  


         if(!$item['qty']){
            $data += ['qty' => 1];
         }  

         $total_price += $item['price'];
         $total_qty += $item['qty'];
         
         orderitems::create($item);
      }
      
      $order->totalprice = $total_price;
      $order->totalitems = $total_qty;
      $order->save();
      //return order::with('orderitems')->where('id',$order->id)->get(); 
      return $order;
    }
   
  }