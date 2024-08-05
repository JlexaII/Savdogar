<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->string('vehicle_type')->nullable(); // Тип транспортного средства
            $table->string('make')->nullable();         // Марка
            $table->string('model')->nullable();        // Модель
            $table->integer('year')->nullable();        // Год выпуска
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('advertisements', function (Blueprint $table) {
            //
        });
    }
};
