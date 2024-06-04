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
        Schema::create('enseignant_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('classe_id');
            $table->date('date');
            $table->timestamps();

            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant_classes');
    }
};
