<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $fillable = ['nombre','departamento','marca','costo','precioVenta','cantidad'];

}
