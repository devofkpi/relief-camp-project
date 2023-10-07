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
        Schema::create('relief_camp_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('building_type',100);
            $table->integer('number_of_persons');
            $table->integer('number_of_rooms');
            $table->integer('number_of_halls');
            $table->integer('number_of_toilets');
            $table->integer('number_of_persons_utilising_toilets');
            $table->integer('number_of_persons_staying_at_night');
            $table->integer('number_of_mattresses');
            $table->integer('number_of_badsheets');
            $table->integer('number_of_blankets');
            $table->integer('number_of_mosquito');
            $table->integer('number_of_fans');
            $table->integer('availability_of_food_grains_in_days');
            $table->integer('availability_of_veg_in_days');
            $table->boolean('safe_drinking_water')->default(true);
            $table->boolean('provisioning_of_supplement')->default(true);
            $table->unsignedBigInteger('relief_camp_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relief_camp_facilities');
    }
};
