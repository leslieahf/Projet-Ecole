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
        Schema::create('objets', function (Blueprint $table) {
            $table->string('id');
            $table->string('nom');
            $table->string('type');
            $table->string('salle');
            $table->string('connectivite');
            $table->string('statut');
            $table->string('mode');
            $table->integer('etat_batterie')->nullable();
            $table->integer('temperature')->nullable();
            $table->integer('niveau_encre')->nullable();
            $table->integer('niveau_remplissage')->nullable();
            $table->integer('conso_Wh')->default(0)->nullable();
            $table->integer('nbre_utilisations')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objets');
    }
};
