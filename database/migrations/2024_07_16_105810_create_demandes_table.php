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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("armateur_id")->constrained()->onDelete('cascade');
            $table->foreignId("navire_id")->constrained()->onDelete('cascade');
            $table->unsignedBigInteger("annee");
            $table->date("dateDemande");
            $table->enum("type", ['LPDC','LPDP','LPPC','LPPH' ]);
            $table->string('numero', 20)->unique();
            $table->enum("option",['chalutiers','palangriers','senneurs','casiers']);
            $table->string("libelleOption");
            $table->integer("ouvertureMaille");
            $table->string("enginsAuthorizes");
            $table->string("modeAcces");
            $table->unsignedBigInteger("redevance");
            $table->string("conditionsSpeciales");
            $table->date("debutValidite");
            $table->date("finValidite");
            $table->unsignedBigInteger("duree");
            $table->string("zoneAuthorizes");
            $table->string("zoneInterdites")->nullable();
            $table->string("especesLibres")->nullable();
            $table->string("prisesAccessoires")->nullable();
            $table->string("especesProtegees")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
