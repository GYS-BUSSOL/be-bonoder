<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Http\Controllers\Controller;

class AdminFunctionController extends Controller
{
    public function graderApproval(){

    }
    public function rePendingList() {}

    public function rePendingListDeleteApproval() {}

    public function reSend(){
        try {
            // TODO:
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }

    public function locationGang(){

    }
}
