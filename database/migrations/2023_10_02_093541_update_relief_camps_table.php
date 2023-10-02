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
        Schema::table('relief_camps', function (Blueprint $table) {
            $table->foreign('address_id')->references('address_id')->on('addresses');
            $table->foreign('sub_division_id')->references('sub_division_id')->on('sub_divisions');
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
