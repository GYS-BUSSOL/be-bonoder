<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Helpers\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    public function formDelivery(){
        try {
            $date = request('date', Carbon::now()->format('Ymd'));
            $formDelivery = DB::select("EXEC dbo.SP_GetFormDelivery ?", [$date]);
            return Response::success(' Success: '.$date, $formDelivery);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}