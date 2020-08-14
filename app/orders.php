<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    
    protected $fillable = ['jumlah_orders', 'id_product'];
    //
}
