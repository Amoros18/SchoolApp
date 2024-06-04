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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dossier_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('matiere_id');
            $table->integer('note');
            $table->integer('coef');
            $table->timestamps();

            $table->foreign('dossier_id')->references('id')->on('dossiers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
