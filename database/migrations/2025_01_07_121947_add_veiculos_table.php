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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->year('ano_modelo');
            $table->string('placa', 10)->unique();
            $table->string('chassi', length: 17)->unique();
            $table->string('cor', 30);
            $table->string('tipo', 20);
            $table->string('imagem')->nullable();
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};