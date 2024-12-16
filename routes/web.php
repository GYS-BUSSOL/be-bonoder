<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QcController;
use App\Http\Controllers\Api\AcknowlegdeController;
use App\Http\Controllers\Api\ReportGradeController;
use App\Http\Controllers\Api\CustomTypeOptionsController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\GraderGroupController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\TruckStatusController;

Route::get('/', function () {
    return view('welcome');
});
// Route::prefix('api')->group(function(){
//     Route::prefix('gys')->group(function () {
//         Route::get('/acknowledge', [AcknowlegdeController::class, 'index'])->name('acknowledge');
//         Route::prefix('qc')->group(function () {
//             Route::get('/pending', [QcController::class, 'pendingQC']);
//             Route::get('/finish', [QcController::class, 'finishQC']);
//             Route::get('/{trackId}/detail', [QcController::class, 'qcDetailWithTrackId']);
//         });
//         Route::get('/form-delivery', [DeliveryController::class, 'formDelivery']);
//         Route::get('/truck-status', [TruckStatusController::class, 'invoke']);
//         Route::prefix('report')->group(function(){
//             Route::get('/grade', [ReportGradeController::class, 'invoke']);
//             Route::get('/grading', [ReportController::class, 'reportGrading']);
//             Route::get('/ancknowledge', [ReportController::class, 'reportAncknowledge']);
//             Route::get('/ancknowledge/{trackId}/detail', [ReportController::class, 'reportAncknowledgeDetail']);
//         });
        
//         Route::get('/grader-groups', [GraderGroupController::class, 'graderGroups']);
//         Route::get('/user-grader-groups', [GraderGroupController::class, 'getUserGraderGroup']);
//         Route::get('/user-grader-group/{userId}/update', [GraderGroupController::class, 'updateUserGraderGroup']);


//         Route::prefix('custom')->group(function () {        
//            Route::get('/vehicle-type', [CustomTypeOptionsController::class, 'vehicleTypeOptions']); 
//         });
        
//     });
// });
