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
            Schema::create('mecanicos', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('telefone')->nullable();
                $table->string('cpf')->unique();
                $table->string('especialidade')->nullable();
                $table->boolean('status')->default(true);
                $table->date('data_nascimento')->nullable();
                
                $table->unsignedBigInteger('empresa_id')->nullable();
                $table->foreign('empresa_id')->references('id')->on('empresa')->onDelete('set null');
                $table->timestamps();
                $table->softDeletes(); 
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('mecanicos', function (Blueprint $table) {
                $table->dropForeign(['empresa_id']);
                $table->dropForeign(['endereco_id']);
            });
            Schema::dropIfExists('mecanicos');
        }
    };