<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitems extends Model
{
    use HasFactory;
    
    protected $table = 'orderitems';
    protected $primaryKey = 'id';
    protected $fillable = ['orderid', 'itemid','price', 'qty'];

    public function order()
    {
        return $this->belongsTo(order::class, 'orderid');
    }

    public function item()
    {
        return $this->belongsTo(item::class, 'itemid');
    }

}
