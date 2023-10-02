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
            $table->string('name',50);
            $table->string('family_head_name',50);
            $table->string('relation_with_head',50);
            $table->enum('gender',['male','female','third_gender']);
            $table->integer('age');
            $table->boolean('physically_disabled');
            $table->boolean('orphan');
            $table->boolean('lactating');
            $table->text('displaced_from');
            $table->bigInteger('relief_camp_id');
            $table->boolean('active_status');
            //$table->foriegn('relief_camp_id')->references('relief_camp_id')->on('relief_camps')->onDelete('cascade');
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
