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
        Schema::table('tombs', function (Blueprint $table) {
            $table->boolean("available");
            $table->longText("description")->nullable();
            $table->string("state", 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tombs', function (Blueprint $table) {
            $table->dropColumn("available");
            $table->dropColumn("description");
            $table->dropColumn("state");
        });
    }
};
