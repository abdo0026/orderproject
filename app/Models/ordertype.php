<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordertype extends Model
{
    use HasFactory;
    protected $table = 'ordertypes';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    
    protected $attributes = [ 
        'classname' => 'order' 
    ];
    public function order()
    {
        return $this->hasMany(order::class, 'ordertypeid');
    }
}
