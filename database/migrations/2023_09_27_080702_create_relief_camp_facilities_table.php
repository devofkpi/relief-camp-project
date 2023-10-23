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
            $table->string('building_type',100)->default('NA');
            $table->integer('number_of_persons');
            $table->integer('number_of_rooms');
            $table->integer('number_of_halls');
            $table->boolean('separate_kitchen')->default(true);
            $table->boolean('open_space')->default(true);
            $table->integer('water_tanks_capacity')->nullable();
            $table->double('water_avail_ratio')->nullable();
            $table->integer('number_of_toilets')->nullable();
            $table->double('toilet_ratio_per_person')->nullable();
            $table->integer('number_of_buckets')->nullable();
            $table->double('bucket_ratio_per_person')->nullable();
            $table->integer('number_of_mugs')->nullable();
            $table->double('mug_ratio_per_person')->nullable();
            $table->boolean('sufficient_cooking_utensils')->default(true);
            $table->integer('number_of_mattresses')->nullable();
            $table->double('mattress_ratio_per_person')->nullable();
            $table->integer('number_of_badsheets')->nullable();
            $table->double('badsheet_ratio_per_person')->nullable();
            $table->integer('number_of_pillows')->nullable();
            $table->double('pillow_ratio_per_person')->nullable();
            $table->integer('number_of_blankets')->nullable();
            $table->double('blanket_ratio_per_person')->nullable();
            $table->integer('number_of_mosquitos')->nullable();
            $table->double('mosquito_ratio_per_person')->nullable();
            $table->boolean('sufficient_lighting_facility')->default(true);
            $table->integer('number_of_fans')->nullable();
            $table->double('fans_ratio_per_person')->nullable();
            $table->boolean('sufficient_plates_glases')->default(true);
            $table->text('fuel_sources')->default('firewood');
            $table->integer('availability_of_fuel_in_days')->nullable();
            $table->integer('availability_of_rice_in_days')->nullable();
            $table->integer('availability_of_dal_in_days')->nullable();
            $table->integer('availability_of_veg_in_days')->nullable();
            $table->integer('number_of_persons_staying_at_night')->nullable();
            $table->integer('availability_of_food_grains_in_days')->nullable();
            $table->boolean('safe_drinking_water')->default(true);
            $table->boolean('provisioning_of_supplement')->default(true);
            $table->integer('availability_of_soap_consumable_in_days')->nullable();
            $table->integer('number_of_school_going_students')->nullable();
            $table->integer('number_of_students_linked_to_school')->nullable();
            $table->double('per_of_students_linked_to_school')->nullable();

            $table->integer('number_of_child_identified_anganwadi')->nullable();
            $table->integer('number_of_child_linked_anganwadi')->nullable();
            $table->double('per_child_linked_anganwadi')->nullable();
            $table->integer('number_of_pregnant_women')->nullable();
            $table->integer('number_of_pregnant_women_linked_health')->nullable();
            $table->double('per_of_pregnant_women_linked_health')->nullable();
            $table->integer('number_of_disabled_person')->nullable();
            $table->integer('number_of_disabled_person_liked_facility')->nullable();
            $table->double('per_of_disabled_person_liked_facility')->nullable();
            $table->integer('number_of_child_separated_parents')->nullable();
            $table->integer('number_of_child_separated_parents_linked_sw')->nullable();
            $table->double('per_of_child_separated_parents_linked_sw')->nullable();
            $table->date('date_visit_of_health')->nullable();
            $table->date('date_visit_of_phed')->nullable();
            $table->date('date_visit_of_social_welfare')->nullable();
            $table->date('date_visit_of_cafpd')->nullable();
            $table->date('date_visit_of_edu')->nullable();
            $table->date('date_visit_of_pow')->nullable();
            $table->date('date_visit_of_mahud_ceo_adc')->nullable();
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
