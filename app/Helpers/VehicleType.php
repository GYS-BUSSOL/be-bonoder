<?php

namespace App\Helpers;

class VehicleType {
    private static $vehicleTypes = [
        'Carry' => 'Carry',
        'L300' => 'L300',
        'Colt Diesel(Engkel)' => 'Colt Diesel(Engkel)',
        'Colt Diesel' => 'Colt Diesel',
        'Puso' => 'Puso',
        'Tronton' => 'Tronton',
        'Others' => 'Others',
    ];
    public static function getVehicleTypeOptions() {
        $options = [];
        foreach (self::$vehicleTypes as $key => $value) {
            $options[$key] = $value;
        }
        return $options;
    }
}