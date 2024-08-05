<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [

        "annee",
        "navire_id",
        "armateur_id",
        "dateDemande",
        "type",
        "numero",
        "option",
        "libelleOption",
        "ouvertureMaille",
        "enginsAuthorizes",
        "modeAcces",
        "redevance",
        "conditionsSpeciales",
        "enginsAuthorizes",
        "debutValidite",
        "finValidite",
        "duree",
        "zoneAuthorizes",
        "zoneInterdites",
        "especesLibres",
        "prisesAccessoires",
        "especesProtegees",
    ];


    public function navire()
    {
        return $this->belongsTo(Navire::class, "navire_id" );
    }


    public function armateur()
    {
        return $this->belongsTo(Armateur::class, "armateur_id" );
    }
    public function zones()
    {
        return $this->belongsToMany(Zone::class);
    }


    public static function calculateDuree($debutValidite, $finValidite)
    {
        if ($debutValidite && $finValidite) {
            $debut = Carbon::parse($debutValidite);
            $fin = Carbon::parse($finValidite);

            // Calcul de la différence en mois
            $diffInMonths = $debut->diffInMonths($fin);

            // Si le jour du mois de fin est supérieur au jour du mois de début, on ajoute un mois
            if ($fin->day > $debut->day) {
                $diffInMonths++;
            }

            return $diffInMonths;
        }
        return null;
    }

    public static function generateNumero()
{
    $anneeEncours = date('Y');
    $lastDemande = self::whereYear('created_at', $anneeEncours)->latest()->first();
    $lastRenouvellement = Renouvellement::whereYear('created_at', $anneeEncours)->latest()->first();

    $lastNumber = 0;
    if ($lastDemande) {
        $lastNumber = max($lastNumber, intval(substr($lastDemande->numero, -4)));
    }
    if ($lastRenouvellement) {
        $lastNumber = max($lastNumber, intval(substr($lastRenouvellement->numero, -4)));
    }

    $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    return $anneeEncours . '/SN/' . $newNumber;
}

public function renouvellements()
{
    return $this->hasMany(Renouvellement::class, 'demande_id');
}
}

/*
  public static function generateNumero()
   {
    $anneeEncours = date('Y');
    $lastRecord = self::whereYear('created_at', $anneeEncours)->latest()->first();

    if ($lastRecord) {
        $lastNumber = intval(substr($lastRecord->numero, -4));
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    } else {
        $newNumber = '0001';
    }

    return $anneeEncours . '/SN/' . $newNumber;
   }
}
   */
