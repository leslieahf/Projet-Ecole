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
            $table->string('connectivite');
            $table->string('statut');
            $table->string('mode');
            $table->integer('etat_batterie');
            $table->integer('temperature');
            $table->integer('niveau_encre');
            $table->integer('niveau_remplissage');
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
