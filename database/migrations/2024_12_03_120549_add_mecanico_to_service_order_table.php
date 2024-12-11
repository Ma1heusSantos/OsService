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
        Schema::table('service_order', function (Blueprint $table) {
            $table->unsignedBigInteger('mecanico_id');
            $table->foreign('mecanico_id')->references('id')->on('mecanicos')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_order', function (Blueprint $table) {
            $table->dropForeign(['mecanico_id']);
            $table->dropColumn('mecanico_id');
        });
    }
};