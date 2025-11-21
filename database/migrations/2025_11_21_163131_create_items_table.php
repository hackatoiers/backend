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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->integer('numero');
            $table->json('dimensoes');
            $table->foreignId('localizacao_id')->constrained('localizacaos');
            $table->foreignId('material_id')->constrained('materiais');
            $table->foreignId('subtipo_id')->constrained('subtipos');
            $table->foreignId('colecao_id')->constrained('colecaos');
            $table->foreignId('acao_conservacao_id')->constrained('acoes_conservacaos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
