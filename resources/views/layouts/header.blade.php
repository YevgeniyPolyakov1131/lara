@php $categories = \App\Models\Categorie::all() @endphp
<header>

    <div id='header' class="row justify-content-center">

        <div id='logo'>
        
        </div>

        <div id='recherche'>

        </div>

    </div>

    <nav id='menu'>
        <ul class="row justify-content-center">
        @foreach($categories as $categorie)
            <li class="dropbutton">
            <a href="{{ url('annonces/cat/' . $categorie->id) }}" class="btn btn-secondary">
                <?= $categorie->name ?>
            </a>
            <ul class="dropmenu">
                @foreach($categorie->sous_categories as $sous_categorie)

                <li> <a class="dropdown-item" href="{{ url('annonces/souscat/' . $sous_categorie->id) }}">{{ $sous_categorie->name }}</a></li>

                @endforeach
            </ul>
            </li>
        @endforeach

        </ul>
    </nav>  


</header>



