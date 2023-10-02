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
        Schema::create('relief_camps', function (Blueprint $table) {
            $table->id('relief_camp_id');
            $table->string('name',100);
            $table->string('camp_code',50)->unique;
            $table->text('location');
            $table->bigInteger('sub_division_id');
            $table->boolean('active_status');
            //$table->foreign('sub_division_id')->references('sub_division_id')->on('sub_divisions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relief_camps');
    }
};
