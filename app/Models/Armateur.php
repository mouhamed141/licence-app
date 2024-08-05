<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armateur extends Model
{
    use HasFactory;

    protected $fillable = [
        "cni",
        "nom",
        "prenom"
    ];




     public function navire()
    {
        return $this->hasMany(Navire::class);
    }
}
