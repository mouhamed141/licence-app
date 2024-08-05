<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navire extends Model
{
    use HasFactory;

    protected $fillable = [
        "armateur_id",
        "matricule",
        "nomNavire",
        "armement",
        "pavillon",
        "jauge",
        "longueur",
        "mode",

    ];

    public function armateur()
    {
        return $this->belongsTo(Armateur::class,'armateur_id');
    }

}
