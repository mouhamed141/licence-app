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
        Schema::create('navires', function (Blueprint $table) {
            $table->id();
            $table->foreignId("armateur_id")->constrained()->onDelete('cascade');
            $table->string("matricule")->unique();
            $table->string("nomNavire");
            $table->string("armement");
            $table->string("pavillon");
            $table->float("jauge");
            $table->float("longueur");
            $table->string("modeConservation");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navires');
    }
};
