<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            Schema::create('lojas', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('url');
                $table->float('avaliacao')->nullable();
                $table->string('localizacao')->nullable();
                $table->timestamps();
            });

            Log::info('Tabela lojas criada com sucesso.');
        } catch (\Exception $excecao) {
            Log::error('Erro ao criar tabela lojas: ' . $excecao->getMessage());
            throw $excecao;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lojas');
    }
};
