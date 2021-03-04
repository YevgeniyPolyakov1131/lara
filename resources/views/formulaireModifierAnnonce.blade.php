@extends('layouts.app')

@section('content')

@include('layouts.header')

@php

$images = $annonce->image->description;

@endphp

<div class="row mt-50 mb-5 p-1 justify-content-center">
    <form action="" method="POST" class="form_ajouter_modifier" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <h1>Modifier un annonce</h1>

        <div class="form-group">
            <label for="titre">Titre</label>
            <input name="titre" type="text" class="form-control @error('titre') is-invalid @enderror" id="titre" aria-describedby="titre" placeholder="Entrez titre" value="{{ old('titre') ? old('titre') : $annonce->titre }}">
            
            @error('titre')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>    

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Entrez description">{{ old('description') ? old('description') : $annonce->description }}</textarea>
                        
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 

        <div class="form-group">
            <label for="prix">Prix</label>
            <input name="prix" type="number" class="form-control @error('prix') is-invalid @enderror" id="prix" aria-describedby="prix" placeholder="Entrez prix" value="{{ old('prix') ? old('prix') : $annonce->prix }}">
            
            @error('prix')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 

        <div class="form-group">
            <label for="ville_id">Ville</label>
            <select name="ville_id" class="form-control @error('ville') is-invalid @enderror" id="ville">
            @foreach($villes as $ville)                   
                <option value="{{ $ville->id }}" @if($ville->id == (old('ville_id') ? old('ville_id') : $annonce->ville_id)) selected @endif > {{ $ville->name }}</option>
            @endforeach    
            </select>
                        
            @error('ville')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>   

        <div class="form-group">
            <label for="sous_categorie_id">Sous-categorie</label>
            <select name="sous_categorie_id" class="form-control @error('sous_categorie') is-invalid @enderror" id="sous_categorie">
            @foreach($sous_categories as $sous_categorie)
                <option value="{{ $sous_categorie->id }}" @if($sous_categorie->id == (old('sous_categorie_id') ? old('sous_categorie_id') : $annonce->sous_categories[0]->id)) selected @endif> {{ $sous_categorie->name }}</option>
            @endforeach
            </select>
                        
            @error('sous_categorie')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 

        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <list-add-images errors="{{ json_encode($errors->getMessages()) }}" :images="{{ $images }}" url="{{ url('/') }}"></list-add-images>

        <button type="submit" class="btn btn-primary" id="but_submit">Modifier</button>

    </form>

</div>


@include('layouts.footer')

@endsection