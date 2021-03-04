@extends('layouts.app')

@section('content')

@include('layouts.header')

@php

$images = json_decode($annonce->image->description);

@endphp


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:750px">
        <div class="modal-content">
            <div class="modal-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @php $ind = 0; @endphp
                        @foreach($images as $key => $value)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $ind }}"></li>
                        @php $ind++; @endphp
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($images as $key => $value)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url($value) }}" alt="{{ $key }}">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn w-100 btn-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        
<div class="row mt-5 mb-5 justify-content-center"> 
    <div class="col-sm-10">
        <div class="un_annonce row">
            <div class='col-sm-7 un_annonce_images' data-toggle="modal" data-target="#exampleModalCenter">
                <div class="image_big row">
                    <img id="img_base" class="image_base" src='{{ url($images->img_base) }}'>
                </div>
                <div class="image_little row justify-content-between">
                    <div class="image_small">
                        <img id="img_1" src='{{ url($images->img_1) }}'>
                    </div>
                    <div class="image_small">
                        <img id="img_2" src='{{ url($images->img_2) }}'>
                    </div>
                    <div class="image_small">
                        <img id="img_3" src='{{ url($images->img_3) }}'> 
                    </div>                            

                </div>
            </div>


            <div id="messagerie" class="row p-1 col-sm-5 justify-content-center">

                <div class="tab-content profile-tab"  id="messagerieContent">
                    <h5>Propriétaire</h5>
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row-info">
                            <div class="">
                                <label>Nom</label>
                            </div>
                            <div class="">
                                <p>{{ $annonce->user->name }}</p>
                            </div>
                        </div>
                        <div class="row-info">
                            <div class="">
                                <label>Email</label>
                            </div>
                            <div class="">
                                <p>{{ $annonce->user->email }}</p>
                            </div>
                        </div>
                        <div class="row-info">
                            <div class="">
                                <label>Phone</label>
                            </div>
                            <div class="">
                                <p>{{ $annonce->user->cellphone }}</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!------------------------ form Connect------------------------------>
                @if(Auth::check()) @php $user = Auth::user() @endphp
                    <form action="" method="post" >
                            <div class="contacter ">
                                <h5> <span> CONTACTEZ :  </span>{{ strtoupper( $annonce->user->name) }}</h5><br>
                            </div>
                            <div class="form-group">
                                <label for="first_name">Nom :</label>
                                <input type="text" class="form-control"  placeholder="Votre Nom" name="first_name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Prenom :</label>
                                <input type="text" class="form-control"  placeholder="Votre Prenom" name="last_name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="text" class="form-control"  placeholder="Votre Email" name="email" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label for="message">Message : </label>
                                <textarea rows="5" name="message" class="form-control"  placeholder="Votre Message" cols=" 30"></textarea>
                            </div>

                                <input type="submit" name="submit" class="btn btn-success w-100 mt-2" id="but_submit" value="Envoyer">
                    </form>
                @else
                <!------------------------ form deconnect------------------------------>
                    <form action="" method="post" >
                            <div class="contacter ">
                                <h4> <span> CONTACTEZ : </span> {{ strtoupper($annonce->user->name) }}</h4>
                            </div>
                            <div class="form-group">
                                <label for="first_name">Nom :</label>
                                <input type="text" class="form-control"  placeholder="Votre Nom" placeholder="Votre " name="first_name" >
                            </div>

                            <div class="form-group">
                                <label for="last_name">Prenom :</label>
                                <input type="text" class="form-control"  placeholder="Votre Prenom" name="last_name" >
                            </div>

                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="text" class="form-control"  placeholder="Votre Email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="message">Message : </label>
                                <textarea rows="5" name="message" class="form-control"  placeholder="Votre Message" cols=" 30"></textarea>
                            </div>

                                <input type="submit" name="submit" class="btn btn-primary w-100 mt-2" id="but_submit" value="Envoyer">
                    </form>

                @endif
        </div>

            
        </div>
    </div>
        
            <div class='un_annonce_content col-sm-10'>

                <div class='un_annonce_content_first'>
                    <h4 class='titre'>{{ $annonce->titre }}</h4>
                    <h4 class='prix' >{{ ($annonce->annonce_prix > 0) ? $annonce->prix."$" : "Gratuit" }}</h4>

                    <p class='description'> <span > Description :</span>  <br> {{ $annonce->description }}</p>
                </div>

                <div class='location_date d-flex justify-content-between'>
                    <p class='ville'>{{ $annonce->created_at->format('m.d.y') }}</p>
                    <p class='date'>{{ $annonce->ville->name }}</p>
                </div>

                @if(Auth::check())
                    @if(Auth::id() == $annonce->user->id)

                        <div class="action_click d-flex justify-content-between col-sm-2">
                            <a class='ajoutFavoris' id ="{{ $annonce->id }}"><i class="far fa-heart "></i></a> 
                            <a class='modifierAnnonce' href="{{ url('annonce/'.$annonce->id.'/edit') }}"><i class="far fa-edit"></i></a> 
                            <a class='suprimerAnnonce trigger-btn' id="{{ $annonce->id }}" href="#ModalDelete" data-toggle="modal" ><i class="far fa-trash-alt"></i></a> 
                        </div>

                    @else

                        <div class="action_click d-flex justify-content-end">
                            <a class='ajoutFavoris' id ="{{ $annonce->id }}"><i class="far fa-heart "></i></a> 
                        </div>
                    
                    @endif
                @endif
        </div>
    </div>     




<script>

    $(window).on('load',function(){ 

        $('.un_annonce img').on('click',function(){

            let id_img = $(this).prop('id');
            $('.carousel-inner').children().removeClass('active');
            $('.carousel-indicators').children().removeClass('active');

            switch (id_img){
                case 'img_base':

                    $($('.carousel-inner').children()[0]).addClass('active');
                    $($('.carousel-indicators').children()[0]).addClass('active');

                    break;

                case 'img_1':

                    $($('.carousel-inner').children()[1]).addClass('active');
                    $($('.carousel-indicators').children()[1]).addClass('active');
                    
                    break;

                case 'img_2':

                    $($('.carousel-inner').children()[2]).addClass('active');
                    $($('.carousel-indicators').children()[2]).addClass('active');
                    
                break;

                case 'img_3':

                    $($('.carousel-inner').children()[3]).addClass('active');
                    $($('.carousel-indicators').children()[3]).removeClass('active');
                    
                break;     
            }

        }); 


    });


</script>



@include('layouts.footer')

@endsection

