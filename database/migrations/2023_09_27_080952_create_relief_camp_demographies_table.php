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
        Schema::create('relief_camp_demographies', function (Blueprint $table) {
            $table->id('relief_camp_demography_id');
            $table->string('person_first_name',50);
            $table->string('person_last_name',50);
            $table->string('family_head_name',50);
            $table->string('relation_with_head',50);
            $table->enum('gender',['male','female','third_gender']);
            $table->tinyInteger('age');
            $table->boolean('physically_disabled')->default(false);
            $table->boolean('orphan')->default(false);
            $table->boolean('lactating')->default(false);
            $table->unsignedBigInteger('displaced_from');
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
        Schema::dropIfExists('relief_camp_demographies');
    }
};
