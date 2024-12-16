<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AncknowlegdeModel;

class AcknowlegdeController extends Controller
{

    public function index()
    {
        $ancknowlegde =AncknowlegdeModel::get();
        return response()->json($ancknowlegde);
    }
}