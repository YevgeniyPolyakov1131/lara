<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce_sous_categorie extends Model
{
    use HasFactory;
    protected $table = "annonce_sous_categorie";
    protected $fillable = ["annonce_id", "sous_categorie_id"];
}
