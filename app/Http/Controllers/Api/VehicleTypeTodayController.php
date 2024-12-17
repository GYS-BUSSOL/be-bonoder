<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Helpers\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VehicleTypeTodayController extends Controller{
    public function getVehicleToday(){
        try {
            $date = request('date', Carbon::now()->format('Ymd'));
            $vehicleType = DB::select("EXEC dbo.SP_GetVehicleNoPlatToday ? ", [$date]);
            return Response::success(' '. $date , $vehicleType);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}