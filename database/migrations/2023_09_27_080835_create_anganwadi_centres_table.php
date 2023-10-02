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
        Schema::create('anganwadi_centres', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('officer_name',50);
            $table->integer('officer_contact')->unique();
            $table->text('location');
            $table->bigInteger('relief_camp_id');
            //$table->foreign('relief_camp_id')->references('relief_camp_id')->on('relief_camps')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anganwadi_centres');
    }
};
