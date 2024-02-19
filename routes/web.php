<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{  ReliefCampFacilityController,
                            UserController,
                            AnnouncementController,
                            AanganwadiCentreController,
                            DistrictHelplineController,
                            PublicHealthController,
                            PoliceStationController,
                            ReliefCampController,
                            DashboardController,
                            ReliefCampDemographyController,
                            NodalOfficerController,
                            TrashHandleController,
                            DownloadController
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

Route::controller(UserController::class)->group(function(){
    Route::get('/','showLogin')->name('login');
    Route::post('/','authUser')->name('login.post');
 });
 
Route::group(['middleware'=>['authorization','noBack','noStore']],function(){

    Route::controller(UserController::class)->group(function(){
    
    Route::get('/logout','logout')->name('logout');

    Route::get('/view/profile','viewProfile')->name('view_profile');
    Route::get('/edit/profile/{id?}','editProfileGet')->name('edit_profile');
    Route::post('/edit/profile','editProfilePost')->name('edit_profile.post');
    Route::get('/change/pwd','pwdChangeGet')->name('change_pwd');
    Route::post('/change/pwd','pwdChangePost')->name('change_pwd.post');
    
    Route::get('/register','showRegister')->name('register');
    Route::post('/register','createUser')->name('register.post');

    Route::get('/delete/user/{id}','deleteUser')->name('delete_user');

    Route::get('/user/showall','showAllUser')->name('show_all_user');

    Route::post('/user/userJurisdiction','userJurisdiction')->name('user_jurisdiction');
    
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'show')->name('dashboard');
    });

    Route::prefix('/relief_camp')->controller(ReliefCampController::class)->group(function () {
        Route::get('/','showAllCamps')->name('relief_camps');
        Route::get('/create','showReliefCampForm')->name('create_relief_camp');
        Route::post('/create','createOrUpdateReliefCamp')->name('create_relief_camp.post');
        Route::get('/update/{id}','showReliefCampForm')->name('update_relief_camp');
        Route::get('/show/{id}','showCampById')->name('show_camp_by_id');
        Route::post('/update','createOrUpdateReliefCamp')->name('update_relief_camp.post');
        Route::post('/upload','reliefCampImport')->name('upload_relief_camp.post');
        Route::get('/sub_division/{sub_division_id?}', 'showBySubDivision')->name('relief_camp_by_sub');
        Route::get('/nodal_officer/{nodal_officer_id?}', 'showByNodalOfficer')->name('relief_camp_by_nodal');

        Route::get('/delete/{relief_camp_id}','deleteReliefCamp')->name('delete_relief_camp');
    
    });
    
    Route::prefix('/demography')->controller(ReliefCampDemographyController::class)->group(function () {
        Route::get('/show/all','showAllInmates')->name('inmates');
        Route::get('/showById/{inmate_id?}','showInmateById')->name('inmate_by_id');
        Route::get('/show/{relief_camp_id?}', 'showByCamp')->name('demo_by_camp');
        Route::get('/category/{category?}','showByCategory')->name('demo_by_cat');
        Route::get('/nodalOfficer/{id}','showByNodalOfficer')->name('demo_by_nodal');
        Route::get('/create','showInmatesForm')->name('create_inmates');
        Route::get('/update/{id?}','showInmatesForm')->name('update_inmates');
        Route::post('/create','createOrUpdateInmate')->name('create_inmate.post');
        Route::post('/update','createOrUpdateInmate')->name('update_inmate.post');
        Route::post('/upload','inmatesImport')->name('upload_inmates.post');
        Route::get('delete/{id}','deleteInmate')->name('delete_inmate');
    
    });
    
    Route::prefix('/facilities')->controller(ReliefCampFacilityController::class)->group(function(){
        Route::get('/show/{relief_camp_id?}','showById')->name('camp_facilities');
        Route::get('/create','showFacilitiesForm')->name('create_facilities');
        Route::post('/create','createOrUpdateFacilities')->name('create_facilities.post');
        Route::get('/update/{id?}','showFacilitiesForm')->name('update_facilities');
        Route::post('/update','createOrUpdateFacilities')->name('update_facilities.post');
        Route::post('/upload','campFacilitiesImport')->name('upload_facilities.post');
    });
    
    Route::prefix('/nodal_officers')->controller(NodalOfficerController::class)->group(function(){
        Route::get('/','showAll')->name('show_all_nodal_officer');
        Route::get('/show/{id}','showById')->name('show_nodal_officer_by_id');
        Route::get('/create','showNodalOfficerForm')->name('create_nodal_officer');
        Route::post('/create','createOrUpdateNodalOfficer')->name('create_nodal_officer.post');
        Route::post('upload','nodalOfficerImport')->name('upload_nodal_officer.post');
        Route::get('/update/{nodal_officer_id}','showNodalOfficerForm')->name('update_nodal_officer');
        Route::post('/update','createOrUpdateNodalOfficer')->name('update_nodal_officer.post');
        Route::get('/delete/{id}','deleteNodalOfficer')->name('delete_nodal_officer');
    });

    Route::controller(TrashHandleController::class)->group(function(){
        Route::get('trash/items','deletedItems')->name('deleted_items');
        Route::get('restore/items/{table_name}/{id}','restoreItem')->name('restore_item');
    });

    Route::controller(DownloadController::class)->group(function(){
        Route::get('download/{filename}','downloadExcelSample')->name('download_excel_sample');
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

});



