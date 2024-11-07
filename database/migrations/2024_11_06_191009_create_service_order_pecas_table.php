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
        Schema::create('service_order_pecas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peca_id')->onDelete('cascade');
            $table->unsignedBigInteger('service_order_id')->onDelete('cascade');
            $table->integer('quantidade')->onDelete('cascade'); 
            
            $table->foreign("peca_id")->references("id")->on("peca");
            $table->foreign("service_order_id")->references("id")->on("service_order");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_order_pecas', callback: function (Blueprint $table) {
            $table->dropForeign(['peca_id','service_order_id']);
            $table->dropColumn('peca_id');
            $table->dropColumn('service_order_id');
        });
        Schema::dropIfExists('service_order_pecas');
    }
};