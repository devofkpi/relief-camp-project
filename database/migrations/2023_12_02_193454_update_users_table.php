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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('nodal_officer_id')->references('id')->on('nodal_officers');
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
