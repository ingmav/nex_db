<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Inventario extends BaseModel
{
    public $incrementing = true;
    
    protected $table = 'MSN_INVENTARIO';  
    protected $fillable = ["MSN_ARTICULOS_FACTURA_ID", "MS_ARTICULO_ID", "CANTIDAD", "DESCRIPCION", "ANCHO", "LARGO", "PRECIO_UNITARIO", "CANTIDAD_TOTAL", "CANTIDAD_RESTANTE_TOTAL", "MONTO_SIN_IVA", "MONTO_TOTAL", "ACTIVO"];
}
