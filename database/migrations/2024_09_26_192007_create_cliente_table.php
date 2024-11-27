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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('cpf')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            $table->string('razao_social')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('ie')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};