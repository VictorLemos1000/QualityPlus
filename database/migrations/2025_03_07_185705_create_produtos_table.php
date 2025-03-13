<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::beginTransaction();

        try {
            if (!Schema::hasTable('produtos')) {
                Schema::create('produtos', function (Blueprint $table) {
                    $table->id();
                    $table->string('nome');
                    $table->text('descricao')->nullable();
                    $table->string('categoria');
                    $table->string('marca')->nullable();
                    $table->string('imagem_url')->nullable();
                    $table->timestamps();
                });

                Log::info('Tabela produtos criada com sucesso.');
            } else {
                Log::warning('Tabela produtos já existe.');
            }

            DB::commit();
        } catch (\Exception $excecao) {
            DB::rollBack();
            Log::error('Erro ao criar tabela produtos: ' . $excecao->getMessage());
            throw $excecao;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
