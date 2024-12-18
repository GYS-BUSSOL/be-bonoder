<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Helpers\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportGradeController extends Controller
{
    public function invoke()
    {
        try {
            $startDate = request('start_date', Carbon::now()->format('Y-m-d'));
            $endDate = request('end_date', Carbon::now()->format('Y-m-d'));
            $flag = request('flag', 0);

            $reportGrade = DB::select("EXEC dbo.SP_GetReportGrade ?, ?, ?", [$flag, $startDate, $endDate]);
            $totalWeight = 0;

            foreach ($reportGrade as $row) {
                $totalWeight += $row->net_weight_after_cut_weight_prorate;
            }

            $totalWeight = number_format($totalWeight, 2, ',', '.');

            // $totalWeight = number_format($reportGrade->net_weight_after_cut_weight_prorate, 2, ',', '.');

            return Response::success(' ' . $startDate . ' - ' . $endDate, [
                'reportGrade' => $reportGrade,
                'totalTonase' => $totalWeight
            ]);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}
