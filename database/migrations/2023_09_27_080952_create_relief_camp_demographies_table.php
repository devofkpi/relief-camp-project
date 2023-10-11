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
            $table->id();
            $table->string('person_name',100);
            $table->unsignedBigInteger('family_head_id')->nullable();
            $table->unsignedBigInteger('family_head_relation_id')->nullable();
            $table->enum('gender',['male','female','third_gender']);
            $table->tinyInteger('age');
            $table->boolean('physically_disabled')->default(false);
            $table->boolean('orphan')->default(false);
            $table->boolean('lactating')->default(false);
            $table->unsignedBigInteger('address_id');
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
