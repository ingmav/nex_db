<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Validator,\Hash, \Response, DB;

class PruebaController extends Controller
{
    public function index()
    {
        $table = DB::table("MS_ARTICULOS")->get();
        return Response::json([ 'data' => $table],200);
    }
}
