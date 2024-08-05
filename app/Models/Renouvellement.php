<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Renouvellement extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'numero',
        'annee',
        'duree',
        'redevance',
        'debutValiditeRenouvellemnt',
        'finValiditeRenouvellement',
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class, 'demande_id');
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
}
