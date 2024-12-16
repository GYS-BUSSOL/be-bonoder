<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Helpers\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PrintApprovalController extends Controller
{
    public function printApproval(){
        try {
            $date = request('date', Carbon::now()->format('Ymd'));
            $printApproval = DB::select("EXEC dbo.SP_GetApprovalPrint ?", [$date]);
            return Response::success(' ' . $date, $printApproval);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
    
public function printApprovalWithCondition($trackId){
    // Masih Di cek Kembali Nanti
        try {
            $crdby = 'test';
            $crdt = Carbon::now()->format('Y-m-d H:i:s');

            $conditionPrint = request('print', true);
            if($conditionPrint == true){
                // TODO: Kondisi jika office yang print = 1
                $officePrint = DB::select("EXEC dbo.SP_UpdateAndInsertOfficeButtonPrintApproval", [$trackId, $crdby, $crdt]);
                return Response::success(' Print With Office: ' . $trackId, $officePrint);
            }else{
                dd("Print With Supplier".$trackId);
                // TODO: Kondisi jika Supplie yang print = 0
                $supplierPrint = DB::select("EXEC dbo.SP_UpdateAndInsertSupplierButtonPrintApproval", [$trackId, $crdby, $crdt]);
                return Response::success(' Print With Supplier: ' . $trackId, $supplierPrint);
            }
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}