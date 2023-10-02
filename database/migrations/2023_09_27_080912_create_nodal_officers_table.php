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
        Schema::create('nodal_officers', function (Blueprint $table) {
            $table->id('nodal_officer_id');
            $table->string('officer_name',50);
            $table->string('officer_designation',100);
            $table->unsignedInteger('officer_contact')->unique();
            $table->unsignedBigInteger('relief_camp_id');
            $table->boolean('active_status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nodal_officers');
    }
};
