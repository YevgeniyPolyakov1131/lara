@extends('layouts.app')

@section('content')

@include('layouts.header')

<div id='containt' class="row mt-5 mb-5 justify-content-center ">

   @include('layouts.filter')


    <div id="annonces" class="col-sm-9">
        
        @foreach($annonces as $annonce)
        <div class="annonce row p-3 d-flex flex-row">
            <div class='img_parent col-sm-3'>
                <a href="{{ url('annonces/'.$annonce->id) }}">
                    <img class='annonce_img' src='{{ url('/'.$annonce->image->preview) }}'>
                 </a>
            </div>
            <div class='annonce-content col-sm-9'>
                <div class='annonceHeader'>
                    <div class="annonceTitrePrix">
                        <a href="{{ url('annonces/'.$annonce->id) }}">
                            <h4 class='titre'>{{ $annonce->titre }}</h4>
                            <h4 class='prix' >{{ ($annonce->prix > 0) ? $annonce->prix."$" : "Gratuit" }}</h4>
                        </a>
                    </div>

                    <div class='d-flex justify-content-between'>
                        <p class='ville'>{{ $annonce->created_at->format('d.m.y') }}</p>
                        <p class='date'>{{ $annonce->ville->name }}</p>
                    </div>
                    <p class='description'>{{ $annonce->description }}</p>
                                        
                    @if(Auth::check())
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
                    @endif  
                                    
                   
                </div>
            </div>

        </div>
        @endforeach


    </div>

</div>


@include('layouts.footer')

@endsection

