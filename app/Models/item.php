<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price'];


    public function orderitems()
    {
        return $this->hasMany(orderitems::class, 'itemid');
    }
}
