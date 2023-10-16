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
        //
        // Schema::table('relief_camp_demographies', function (Blueprint $table) {
        //      $table->foreign('family_head_id')->references('id')->on('family_heads');
        //      $table->foreign('family_head_relation_id')->references('id')->on('family_head_relations');
        //     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
