<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;


use App\Http\Requests;
use App\Models\Inventario, App\Models\Insumos;

use Illuminate\Support\Facades\Input;
use \Validator,\Hash, \Response, DB;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        $parametros = $parametros = Input::only('status','q','page','per_page');

        $insumos = DB::table("MS_ARTICULOS")->whereNull("MS_ARTICULOS.DELETED_AT");
        $insumos = $insumos->leftJoin("MS_INVENTARIO", "MS_ARTICULOS.ID", "=", "MS_INVENTARIO.MS_ARTICULO_ID")
                            
                            ->where("MS_INVENTARIO.CANTIDAD_RESTANTE", ">", 0)
                            ->select("MS_ARTICULOS.ID", 
                            "MS_ARTICULOS.NOMBRE_ARTICULO", 
                            DB::RAW("SUM(MS_INVENTARIO.CANTIDAD_RESTANTE) AS RESTANTE"), 
                            "MS_ARTICULOS.CANTIDAD_MINIMA",
                            "MS_ARTICULOS.UNITARIO",
                            DB::RAW("SUM(MS_INVENTARIO.PRECIO_COMPRA) AS COMPRA"))
                            ->groupBy("MS_ARTICULOS.ID", "MS_ARTICULOS.NOMBRE_ARTICULO", "MS_ARTICULOS.CANTIDAD_MINIMA", "MS_ARTICULOS.UNITARIO");

        $insumos = $insumos->get();
        //print_r($insumos);
        foreach ($insumos as $key => $value) {
            if(gettype($value) == "object")
            {
                foreach ($value as $llave => $valor) {
                    //echo gettype($valor);
                    if(gettype($valor) == "object")
                    {

                    }else if(gettype($valor) == "string")
                    {
                        $value->$llave = iconv('latin5', 'utf-8', $value->$llave); 
                    }       
                }
            }   
        }    
        return Response::json([ 'data' => $insumos],200);                  
    }
}
