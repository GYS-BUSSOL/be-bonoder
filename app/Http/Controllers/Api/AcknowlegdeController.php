<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AcknowlegdeController extends Controller
{
    public function index()
    {
        try {
            $aksesRole = request('akses', 'admin');
            $nama = request('nama', '');
            $groupid = request('groupid', '');
            $date = request('date', Carbon::now()->format('Ymd'));
            $filter = request('filter', '');
            $ancknowledge = DB::select('EXEC dbo.SP_GetDataAncknowledge ?,?,?,?', [$aksesRole, $nama, $groupid, $date, $filter]);
            return Response::success(' ancknowledge', $ancknowledge);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}