<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_categorie extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany("\App\Models\Categorie");
    }
}
