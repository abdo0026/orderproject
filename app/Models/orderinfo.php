<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderinfo extends Model
{
    use HasFactory;

    protected $table = 'orderinfos';
    protected $primaryKey = 'id';
    protected $fillable = ['orderid', 'name'];
    
    
    public function order()
    {
        return $this->belongsTo(order::class, 'orderinfoid');
    }
}
