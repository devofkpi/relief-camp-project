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
        view()->composer('layouts.main_layout',function($view){
            $view->with([
                'nav_sub_data'=>$this->nav_sub_data,
            ]);
        });
    }
}
