<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Annonce_sous_categorie;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    public function afficherAnnonce($id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('annonce',['annonce' => $annonce]);
    }

    public function afficherAnnoncesParCategorie($id)
    {        
        $annonces = Annonce::join("annonce_sous_categorie","annonce_sous_categorie.annonce_id","=","annonces.id")
                           ->join("categorie_sous_categorie","categorie_sous_categorie.sous_categorie_id","=","annonce_sous_categorie.sous_categorie_id")
                           ->where("categorie_id","=",$id)->get();
        return view('annonces',["categorie_id" => $id, "annonces" => $annonces]);
    }

    public function afficherAnnoncesParSousCategorie($id)
    {
        $annonces = Annonce::join("annonce_sous_categorie","annonce_sous_categorie.annonce_id","=","annonces.id")
                            ->where("sous_categorie_id","=",$id)->get();
        return view('annonces',["sous_categorie_id" => $id, "annonces" => $annonces]);
    }

    public function afficherFormulaireAjouterAnnonce()
    {
        $villes = \App\Models\Ville::all();
        $sous_categories = \App\Models\Sous_categorie::all();
        return view('FormulaireAjouterAnnonce',['villes' => $villes, 'sous_categories' => $sous_categories]);
    }

    public function ajouterAnnonce(Request $request)
    {

        $annonce = Annonce::create($request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'prix' => 'required',
            'user_id' => 'required',
            'ville_id' => 'required',
            'sous_categorie_id' => 'required',
            'img_base' => 'mimes:jpeg,bmp,png|max:2048',
            'img_1' => 'mimes:jpeg,bmp,png|max:2048',
            'img_2' => 'mimes:jpeg,bmp,png|max:2048',
            'img_3' => 'mimes:jpeg,bmp,png|max:2048',
            'img_4' => 'mimes:jpeg,bmp,png|max:2048',
            'img_5' => 'mimes:jpeg,bmp,png|max:2048',
        ]));

        Annonce_sous_categorie::create(['annonce_id' => $annonce->id,'sous_categorie_id' => $request['sous_categorie_id']]);

        $annonce->image_id = ImageController::createImage($request, $annonce->id);
        $annonce->save();

        return redirect()->action([AccueilController::class, 'index']);

    }

    public function afficherFormulaireModifierAnnonce($id)
    {
        $annonce = Annonce::with(["sous_categories"])->findOrFail($id);
        $villes = \App\Models\Ville::all();
        $sous_categories = \App\Models\Sous_categorie::all(); 
        return view('FormulaireModifierAnnonce',['villes' => $villes, 'sous_categories' => $sous_categories, 'annonce' => $annonce]);
    }

    public function modifierAnnonce(Request $request, $id)
    {
        $annonce = Annonce::findOrFail($id);

        $annonce->update($request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'prix' => 'required',
            'user_id' => 'required',
            'ville_id' => 'required',
            'img_base' => 'mimes:jpeg,bmp,png|max:2048',
            'img_1' => 'mimes:jpeg,bmp,png|max:2048',
            'img_2' => 'mimes:jpeg,bmp,png|max:2048',
            'img_3' => 'mimes:jpeg,bmp,png|max:2048',
            'img_4' => 'mimes:jpeg,bmp,png|max:2048',
            'img_5' => 'mimes:jpeg,bmp,png|max:2048',
        ]));


        return redirect()->action([AccueilController::class, 'index']);


    }

}
