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
        Schema::create('relief_camp_daily_report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('relief_camp_id');
            $table->integer('inmates_on_previous_day');
            $table->integer('inmates_leaving_today');
            $table->integer('inmates_joined_today');
            $table->integer('total_inmates_today');
            $table->date('today_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relief_camp_daily_report');
    }
};
