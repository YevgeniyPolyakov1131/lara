<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public function sous_categories()
    {
        return $this->belongsToMany('\App\Models\Sous_categorie');
    }
}
