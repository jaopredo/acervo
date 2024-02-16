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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("register");                 // Registro do Livro
            $table->foreignId("group_id")->nullable();  // ID do grupo que ele está

            $table->string("cdd", 14);                  // CDD do livro
            $table->string("isbn", 17)->nullable();                 // ISBN do livro

            // $table->string('type', 20);                 // Tipo do Livro
            $table->string("name", 65);                 // Nome do Livro
            $table->string("author", 70);               // Autor do Livro
            $table->integer("publication")->nullable();             // Ano de Publicação
            $table->longText("description")->nullable();
            $table->string("editor", 45);               // Editora do Livro
            $table->integer("pages")->nullable();                   // Quantidade de Páginas
            $table->integer("volume")->nullable();                  // Volume
            $table->integer("example")->nullable();                 // Exemplar
            $table->integer("aquisition_year")->nullable();         // Ano de Aquisição
            $table->string("aquisition", 80)->nullable();           // Método de Aquisição
            $table->string("local", 100)->nullable();               // Local de Aquisição
            $table->boolean("available")->default(1);               // Disponível

            $table->timestamps("");
            $table->unique(["register"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
