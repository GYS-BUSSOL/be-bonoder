<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TruckStatusController extends Controller
{
    public function invoke()
    {
        try {
            $date = request('date', Carbon::now()->format('Ymd'));
            $trucks = DB::select("EXEC dbo.SP_GetTruckStatus ?", [$date]);
            return Response::success(' ' .$date, $trucks);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}
