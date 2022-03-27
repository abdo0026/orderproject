<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['userid', 'ordertypeid','totalprice', 'totalitems'];


    public function ordertype()
    {
        return $this->belongsTo(ordertype::class, 'ordertypeid');
    }


    public function orderinfo()
    {
        return $this->hasOne(orderinfo::class, 'orderid');
    }


    public function orderitems()
    {
        return $this->hasMany(orderitems::class, 'orderid');
    }
}
