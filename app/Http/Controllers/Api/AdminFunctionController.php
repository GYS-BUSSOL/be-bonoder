<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminFunctionController extends Controller
{
    public function graderApproval()
    {
        try {
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
    public function rePendingList() {
        try {
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }

    public function rePendingListDeleteApproval() {
        try {
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }

    public function reSend()
    {
        try {
            // TODO:
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }

    public function scrapLocationGang()
    {
        try {
            $scrapLocationGang = DB::table("v_QMS_get_unloading_locations")->get();
            return Response::success(' Scrap Location Gang', $scrapLocationGang);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}
