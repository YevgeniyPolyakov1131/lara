@extends('layouts.app')

@section('content')

@include('layouts.header')

<div class="accueil_content">

    <h3>Liste des Annonces</h3>
    <div class="row accueil">
        @foreach($annonces as $annonce)
        <div class="col-lg-3  col-md-6 mb-4">
            <div class="card h-100">
                <div class='img_parent w-100'>
                    <a href="{{ url('annonces/'.$annonce->id) }}">
                        <img class='annonce_img' src='{{ url('/'.$annonce->image->preview) }}'>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ url('annonces/'.$annonce->id) }}">{{ $annonce->titre }}</a>
                    </h4>
                    <h4 class="card-price ">{{ ($annonce->prix > 0) ? $annonce->prix."$" : "Gratuit" }}</h4>
                    <p class="card-text">{{ $annonce->description }}</p>
                    <div class='location_date d-flex justify-content-between'>
                        <p class='ville'>{{ $annonce->created_at->format('d.m.y') }}</p>
                        <p class='date'> {{ $annonce->ville->name }}</p>
                    </div>
                </div>
                
                @if(Auth::check())
                <div class="card-footer">
                    @if(Auth::id() == $annonce->user->id)

                    <div class="annonceIcone">
                        <a class='ajoutFavoris' id ="{{ $annonce->id }}"><i class="far fa-heart "></i></a> 
                        <a class='modifierAnnonce' href="{{ url('annonce/'.$annonce->id.'/edit') }}"><i class="far fa-edit"></i></a> 
                        <a class='suprimerAnnonce trigger-btn' id="{{ $annonce->id }}" href="#ModalDelete" data-toggle="modal" ><i class="far fa-trash-alt"></i></a>                        
                    </div>

                    @else

                    <div class="annonceIconeSeul">
                        <a class='ajoutFavoris' id ="{{ $annonce->id }}"><i class="far fa-heart "></i></a> 
                    </div>
                                
                    @endif
                </div>
                @endif 
            </div>
        </div>

        @endforeach

    </div>

    <?= $annonces->links() ?>
</div>



@include('layouts.footer')

@endsection

