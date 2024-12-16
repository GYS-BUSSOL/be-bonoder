<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Helpers\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{    
    /**
     * reportGrading
     *
     * @return void
     */
    public function reportGrading(){
        try {
            $dateFrom = request('date_from', Carbon::now()->format('Y-m-d'));
            $dateTo = request('date_to', Carbon::now()->format('Y-m-d'));
            $reportGrading = DB::select("EXEC dbo.sp_detail_grading ?,?", [$dateFrom, $dateTo]);
            return Response::success(' ' . $dateFrom . ' - ' . $dateTo, $reportGrading);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
    
    /**
     * reportAncknowledge
     *
     * @return void
     */
    public function reportAncknowledge(){
        try {
            $date = request('date', Carbon::now()->format('Ymd'));
            $reportAncknowledge = DB::select("EXEC dbo.SP_GetReportAncknowledge ?", [$date]);
            Log::info($reportAncknowledge);

            return Response::success(' ' . $date, $reportAncknowledge);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
    
    /**
     * reportAncknowledgeDetail
     *
     * @param  mixed $trackId
     * @return void
     */
    public function reportAncknowledgeDetail($trackId){
        try {
            $encryptTrackId = encrypt($trackId);
            $reportAncknowledgeDetail = DB::select("EXEC dbo.SP_GetReportAncknowledgeDetail ?", [$encryptTrackId]);
            return Response::success(' ' . $trackId, $reportAncknowledgeDetail); 
        }catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}