<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\UserBonOrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class GraderGroupController extends Controller
{    
    /**
     * getGraderGroup
     *
     * @return void
     */
    public function getUserGraderGroup(){
        try {
            $getUserGraderGroup = DB::select("EXEC dbo.SP_GetUsergetUserGraderGroup"); 
            return Response::success(" Grader Groups", $getUserGraderGroup);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
    public function graderGroups() {
        try {
            $getGraderGroups = DB::select("EXEC dbo.SP_GetGraderGroups");
            return Response::success(" Grader Groups", $getGraderGroups);
        }catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
        
    /**
     * updateUserGraderGroup
     *
     * @param  mixed $userId
     * @return void
     */
    public function updateUserGraderGroup($userId, Request $request) {
        try {
            $userBonOrder = UserBonOrderModel::find($userId);
            $userBonOrder->update([
               'groupid' => $request->groupid
            ]);
            
            return Response::success(" And Update User ". $userBonOrder->display_name, []);
        } catch (\Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}