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
        Schema::table('comparador_precos',  function (Blueprint $table) {
            // Tabelas criadas para o comparador de preços
            $table->id();
            // $table->foreign('rank_melhor_escolha');
            // $table->string('estabelecimento', 255);
            // $table->float('classificacao', 8, 2)->default(5.0);
            // $table->string('nome_produto');
            // $table->decimal('preco', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comparador_precos',  function (Blueprint $table) {
            //
        });
    }
};
