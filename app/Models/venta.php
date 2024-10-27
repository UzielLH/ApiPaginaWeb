<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $fillable = ['producto_id','fecha','cantidad','total'];
    // Relación uno a muchos inversa
    public function productos(){
        return $this->belongsTo(productos::class,'producto_id');
    }
}
