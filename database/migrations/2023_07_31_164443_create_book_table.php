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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string("register");                 // Registro do Livro
            $table->foreignId("group_id")->nullable();  // ID do grupo que ele está

            $table->string("cdd", 14);                  // CDD do livro
            $table->string("isbn", 17);                 // ISBN do livro

            $table->string("name", 65);                 // Nome do Livro
            $table->string("author", 70);               // Autor do Livro
            $table->integer("publication");             // Ano de Publicação
            $table->string("editor", 45);               // Editora do Livro
            $table->integer("pages");                   // Quantidade de Páginas
            $table->integer("volume");                  // Volume
            $table->integer("example");                 // Exemplar
            $table->integer("aquisition_year");         // Ano de Aquisição
            $table->string("aquisition", 80);           // Método de Aquisição
            $table->string("local", 100);               // Local de Aquisição
            $table->boolean("available");               // Disponível

            $table->timestamps("");
            $table->unique(["register"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
