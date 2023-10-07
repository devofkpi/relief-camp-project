<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ReliefCampController;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\PublicHealthController;
use App\Http\Controllers\DistrictHelplineController;
use App\Http\Controllers\AanganwadiCentreController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ReliefCampDemographyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(HomePageController::class)->group(function () {
    Route::get('/home', 'show')->name('homepage');
});
Route::controller(ReliefCampController::class)->group(function () {
    Route::get('/relief_camps', 'showAllCamps')->name('relief_camps');
    Route::get('/relief_camp/sub_division/{sub_division_id?}', 'showBySubDivision')->name('relief_camp_by_sub');
    Route::get('/relief_camp/nodal_officer/{nodal_officer_id?}', 'showByNodalOfficer')->name('relief_camp_by_nodal');

});

Route::controller(ReliefCampDemographyController::class)->group(function () {
    Route::get('/relief_camp/demography/{name?}', 'show')->name('relief_camp_demography');
});

Route::controller(PoliceStationController::class)->group(function () {
    Route::get('/police_stations', 'show')->name('police_stations');
});
Route::controller(PublicHealthController::class)->group(function () {
    Route::get('public_health_centres', 'show')->name('public_health_centres');
});
Route::controller(DistrictHelplineController::class)->group(function () {
    Route::get('/district_helplines', 'show')->name('district_helplines');

});
Route::controller(AanganwadiCentreController::class)->group(function () {
    Route::get('/aanganwadi_centres', 'show')->name('aanganwadi_centres');
});
Route::controller(AnnouncementController::class)->group(function () {
    Route::get('announcements', 'show')->name('announcements');
    Route::post('/orders', 'store');
});