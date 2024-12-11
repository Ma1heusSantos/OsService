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
        Schema::create('service_order', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->float('preco');
            $table->enum('status',['Concluido','Em andamento','Cancelado']);
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign("usuario_id")->references("id")->on("users");
            $table->foreign("categoria_id")->references("id")->on("categoria_servico");
            $table->foreign("cliente_id")->references("id")->on("cliente");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_order', function (Blueprint $table) {
            $table->dropForeign(['usuario_id','categoria_id','cliente_id']);
            $table->dropColumn('usuario_id');
            $table->dropColumn('categoria_id');
            $table->dropColumn('cliente_id');
        });
        Schema::dropIfExists('service_order');
    }
};