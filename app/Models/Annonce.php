<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'prix',
        'ville_id',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo("\App\Models\User");
    }

    public function Ville()
    {
        return $this->belongsTo("\App\Models\Ville");
    }

    public function Image()
    {
        return $this->belongsTo("\App\Models\Image");
    }

    public function Sous_categories()
    {
        return $this->belongsToMany("\App\Models\Sous_categorie");
    }


}
