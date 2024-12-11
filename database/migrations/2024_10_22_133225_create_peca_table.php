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
        Schema::create('peca', function (Blueprint $table) {
            $table->id();
            $table->string("cod_peca");
            $table->string('nome');
            $table->float('preco');
            $table->integer('quantidade');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();
            $table->softDeletes(); 
            $table->foreign("empresa_id")->references("id")->on("empresa");
            $table->foreign("categoria_id")->references("id")->on("categoria_peca")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peca', function (Blueprint $table) {
            $table->dropForeign(['empresa_id','categoria_id']);
            $table->dropColumn('empresa_id');
            $table->dropColumn('categoria_id');
        });
        
        Schema::dropIfExists('peca');
    }
};