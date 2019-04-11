<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Validator,\Hash, \Response, DB;

class PagosController extends Controller
{
    public function index()
    {
        $table = DB::table("MSN_PAGOS")->get();
        return Response::json([ 'data' => $table],200);
    }
}
