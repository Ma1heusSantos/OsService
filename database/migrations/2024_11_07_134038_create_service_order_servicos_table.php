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
        Schema::create('service_order_servicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_order_id')->constrained('service_order')->onDelete('cascade');
            $table->foreignId('servicos_id')->constrained('servicos')->onDelete('cascade');
            $table->integer('quantidade')->nullable();
            $table->decimal('preco', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_order_servicos');
    }
};