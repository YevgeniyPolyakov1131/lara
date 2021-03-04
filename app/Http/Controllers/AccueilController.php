<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class AccueilController extends Controller
{
    public function index()
    {
        if(isset($_GET["motCle"]))
        {
            $annonces = Annonce::where("titre","like","%".$_GET["motCle"]."%")->paginate(8);
        }
        else
        {
            $annonces = \App\Models\Annonce::paginate(8);
        }
        
        return view("accueil",['annonces' => $annonces]);
    }
}
