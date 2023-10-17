<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SubDivision;
use App\Models\NodalOfficer;
use App\Models\ReliefCamp;
use App\Models\ReliefCampDemography;

class NavigationDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public $nav_sub_data;
    //public $nav_nodal_data;
    //public $total_nodal_officer;
    //public $total_camps;
    //public $total_inmates;
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        $this->nav_sub_data=SubDivision::get();
        //$this->nav_nodal_data=NodalOfficer::get();
        //$total_nodal_officer=$nav_nodal_data->count();
        //$total_camps=ReliefCamp::get()->count();
        //$total_inmates=ReliefCampDemography::get()->count();
        //dd($nav_sub_data);

        view()->composer('layouts.main_layout',function($view){
            $view->with([
                'nav_sub_data'=>$this->nav_sub_data,
            ]);
        });
    }
}
