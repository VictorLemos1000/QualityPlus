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
        // Criação da tabela users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome do usuário
            $table->string('email')->unique(); // Email único
            $table->timestamp('email_verified_at')->nullable(); // Para verificar quando o email foi verificado
            $table->string('password'); // Senha do usuário
            $table->string('role')->default('cliente'); // Papel do usuário, com valor padrão 'cliente'
            $table->rememberToken(); // Para lembrar o usuário (cookies de login)
            $table->timestamps(); // Timestamps para created_at e updated_at
        });

        // Criação da tabela de tokens de redefinição de senha
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email como chave primária
            $table->string('token'); // Token de redefinição de senha
            $table->timestamp('created_at')->nullable(); // Timestamp para saber quando o token foi criado
        });

        // Criação da tabela de sessões
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID da sessão
            $table->foreignId('user_id')->nullable()->index(); // ID do usuário associado à sessão
            $table->string('ip_address', 45)->nullable(); // Endereço IP do usuário
            $table->text('user_agent')->nullable(); // Agente do usuário (informações sobre o navegador)
            $table->longText('payload'); // Dados da sessão
            $table->integer('last_activity')->index(); // Última atividade da sessão
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Se precisar desfazer a migração, as tabelas são deletadas
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
