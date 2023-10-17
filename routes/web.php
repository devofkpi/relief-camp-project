<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{  ReliefCampFacilityController,
                            AuthController,
                            AnnouncementController,
                            AanganwadiCentreController,
                            DistrictHelplineController,
                            PublicHealthController,
                            PoliceStationController,
                            ReliefCampController,
                            DashboardController,
                            ReliefCampDemographyController,
                            CreateUserController,
                            NodalOfficerController
                        };

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

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','showLogin')->name('login');
    Route::post('/login','authUser')->name('login.post');
    Route::get('logout','logout')->name('logout'); 
 });
 
Route::group(['middleware'=>['authorization']],function(){
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'show')->name('dashboard');
    });

    Route::prefix('/relief_camp')->controller(ReliefCampController::class)->group(function () {
        Route::get('/','showAllCamps')->name('relief_camps');
        Route::get('/sub_division/{sub_division_id?}', 'showBySubDivision')->name('relief_camp_by_sub');
        Route::get('/nodal_officer/{nodal_officer_id?}', 'showByNodalOfficer')->name('relief_camp_by_nodal');
    
    });
    
    Route::prefix('/relief_camp_demography')->controller(ReliefCampDemographyController::class)->group(function () {
        Route::get('/relief_camp/{relief_camp_id?}', 'showByCamp')->name('demo_by_camp');
        Route::get('/category/{category?}','showByCategory')->name('demo_by_cat');
    
    });
    
    Route::controller(ReliefCampFacilityController::class)->group(function(){
        Route::get('/facilities/{relief_camp_id?}','show')->name('camp_facilities');
    });
    
    Route::controller(NodalOfficerController::class)->group(function(){
        Route::get('/create/nodal_officer','show')->name('create_nodal_officer');
        Route::post('/create/nodal_officer','createNodalOfficer')->name('create_nodal_officer.post');
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
    
    Route::controller(DataUploadController::class)->group(function(){
        Route::get('/file-import','importView')->name('import-view'); 
        Route::post('/import','import')->name('import'); 
    });
        

    Route::controller(CreateUserController::class)->group(function(){
        Route::get('/register','showRegister')->name('register');
        Route::post('/register','createUser')->name('register.post');
    });
});



