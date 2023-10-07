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
        Schema::create('public_healths', function (Blueprint $table) {
            $table->id();
            $table->string('public_health_name',100);
            $table->string('officer_name',50);
            $table->unsignedBigInteger('officer_contact')->unique();
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('relief_camp_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_healths');
    }
};
