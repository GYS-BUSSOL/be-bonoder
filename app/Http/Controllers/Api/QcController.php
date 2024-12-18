<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Helpers\VehicleType;
use Carbon\Carbon;
use App\Models\QcModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class QcController extends Controller
{
    public function pendingQC(){
        
        try {
            $date = request('date', Carbon::now()->format('Ymd'));
            $qc = DB::select("EXEC dbo.GetScalingDataPending ?", [$date]);
            return Response::success(' Pending: '. $date, $qc);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
    public function finishQC(){
        
        try {
            $date = Carbon::today()->format('Ymd');
            $qcData = QcModel::where('trackid','like', "TRK-{$date}%")->get();
            return Response::success(' Success: '.Carbon::today()->format('Ymd'), $qcData);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
    
    public function qcDetailWithTrackId($trackId){
        try {
            $qcWithTrackId = DB::select("EXEC dbo.GetScallingQcWithTrackId ?", [$trackId]);
            return Response::success(' Success: '.$trackId , $qcWithTrackId);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}