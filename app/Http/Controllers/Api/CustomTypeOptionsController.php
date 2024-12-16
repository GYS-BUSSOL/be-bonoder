<?php

namespace App\Http\Controllers\Api;

use Throwable;
use App\Helpers\Response;
use App\Helpers\VehicleType;
use App\Http\Controllers\Controller;


class CustomTypeOptionsController extends Controller
{
    public function vehicleTypeOptions(){
        try {
            $VehicleType = VehicleType::getVehicleTypeOptions();
            return Response::success(' Vehicle Type', $VehicleType);
        } catch (Throwable $th) {
            return Response::trow500($th->getMessage());
        }
    }
}