<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function demandes()
    {
        return $this->belongsToMany(Demande::class);
    }


}
