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
        Schema::create('renouvellements', function (Blueprint $table) {
            $table->id();
            $table->foreignId("demande_id")->constrained()->onDelete('cascade');
            $table->string('numero', 20)->unique();
            $table->unsignedBigInteger("redevance");
            $table->unsignedBigInteger("annee");
            $table->date("debutValiditeRenouvellement");
            $table->date("finValiditeRenouvellement");
            $table->unsignedBigInteger("duree");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renouvellements');
    }
};
