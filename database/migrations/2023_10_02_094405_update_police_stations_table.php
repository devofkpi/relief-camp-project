<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('police_stations', function (Blueprint $table) {
            $table->foreign('address_id')->references('address_id')->on('addresses');
            $table->foreign('relief_camp_id')->references('relief_camp_id')->on('relief_camps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
