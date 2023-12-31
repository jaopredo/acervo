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
        Schema::create('banneds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('student_id')->nullable();
            $table->string('student_name')->nullable();
            $table->date('expire_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banneds');
    }
};
