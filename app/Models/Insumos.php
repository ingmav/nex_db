<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    public $incrementing = true;
    
    protected $table = 'MS_ARTICULOS';  
    protected $fillable = ["NOMBRE_ARTICULO", "ESTATUS", "MS_FAMILIA_ID", "CANTIDAD_MINIMA", "ACTUALIZACION", "UNITARIO", "ANCHO", "UNIDAD_VENTA", "PAQUETE", "UNIDAD_COMPRA", "LARGO", "UNIDAD_PRINCIPAL", "TIPO"];
}
