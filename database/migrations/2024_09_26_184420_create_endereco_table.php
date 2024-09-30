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
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->string("rua");
            $table->integer("numero");
            $table->string("bairro");
            $table->string("complemento")->nullable(); ;
            $table->string("cidade");
            $table->string("estado");
            $table->string("cep");
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresa')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('endereco', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
        });
        Schema::dropIfExists('endereco');
        
    }
};