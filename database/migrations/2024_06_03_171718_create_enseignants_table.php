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
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');
            $table->integer('numero');
            $table->string('matricule')->nullable();
            $table->date('date_naissance');
            $table->string('sexe');
            $table->string('situation')->nullable();  // Vacatatire
            $table->string('statut')->nullable();  // PLeg
            $table->string('email');
            $table->string('password');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignants');
    }
};
