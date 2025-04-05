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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('prenom');
            $table->string('nom');
            $table->string('email');
            $table->string('login')->default('default_login');
            $table->string('mdp')->default('default_mdp');
            $table->integer('age');
            $table->string('sexe');
            $table->date('date_de_naissance');
            $table->string('type_membre');
            $table->integer('nbre_connexions')->default(0);
            $table->integer('nbre_consultations')->default(0);
            $table->integer('points_exp')->default(0);
            $table->string('niveau')->default('Débutant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
