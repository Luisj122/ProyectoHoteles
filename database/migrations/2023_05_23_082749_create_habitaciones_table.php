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
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipo' , ['individual', 'doble', 'suite']);
            $table->integer('capacidad');
            $table->string('descripcion');
            $table->double('precio');
            $table->string('disponibilidad')->default('libre');
            $table->string('imagen');
            $table->foreignId('hotel_id')->constrained('hoteles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
