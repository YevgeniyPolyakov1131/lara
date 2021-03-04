@php 
if(isset($categorie_id))
{
    $categorie = \App\Models\Categorie::find($categorie_id);
}

if(isset($sous_categorie_id))
{
    $sous_categorie = \App\Models\Sous_categorie::find($sous_categorie_id);
    $categorie = $sous_categorie->categories[0];
}

$provinces = \App\Models\Province::all();
$villes = \App\Models\Ville::all();

if(isset($_GET["province_id"])) $province_id = $_GET["province_id"]; else $province_id = 1;
if(isset($_GET["ville_id"])) $ville_id = $_GET["ville_id"]; else $ville_id = 1;
if(isset($_GET['prixMin'])) $prixMin = $_GET['prixMin']; else $prixMin = '';
if(isset($_GET['prixMax'])) $prixMax = $_GET['prixMax']; else $prixMax = '';

@endphp

<div id="filtre" class="col-sm-3">

    <h4>Filtrez</h4>
    @if(isset($categorie_id))
    <div class=" filtre_contents accordion" id="accordionExample">
        <h5 class='filtre_titles'>categorie :</h5>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0" id="categorie_{{ $categorie->id }}">
                    <button class="btn btn-link collapsed font-weight-bold pl-0 w-100" type="button" data-toggle="collapse" data-target="#collapse_{{ $categorie->id }}" aria-expanded="true" aria-controls="collapseOne">
                        {{ $categorie->name }} <i class="fas fa-sort-down"></i>
                    </button>
                </h2>
            </div>
            @foreach($categorie->sous_categories as $sous_categorie)
            <div id="collapse_{{ $categorie->id }}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <a class="dropdown-item" href="{{ url('annonces/souscat/' . $sous_categorie->id) }}">{{ $sous_categorie->name }}</a>
                </div>
            </div>
            @endforeach

        </div>

    </div>
    @endif

    @if(isset($sous_categorie_id))
    <div class="filtre_contents accordion" id="accordionExample">
        <h5 class='filtre_titles'>categorie :</h5>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0" id="categorie_{{ $categorie->id }}">
                    <button class="btn btn-link collapsed font-weight-bold pl-0 w-100" type="button" data-toggle="collapse" data-target="#collapse_{{ $categorie->id }}" aria-expanded="true" aria-controls="collapseOne">
                        {{ $categorie->name }} <i class="fas fa-sort-down"></i>
                    </button>
                </h2>
            </div>
            @foreach($categorie->sous_categories as $sous_categorie)
            <div id="collapse_{{ $categorie->id }}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <a class="dropdown-item" href="{{ url('annonces/souscat/' . $sous_categorie->id) }}">{{ $sous_categorie->name }}</a>
                </div>
            </div>
            @endforeach

        </div>

    </div>
    @endif

    <div class='filtre_contents'>

        <form name="frm" action="" method="GET">
            <h5 class='filtre_titles'>Prix</h5>
                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-sm" placeholder="min" name="prixMin" value="{{ $prixMin }}">
                </div>

                <div class="input-group mb-3">
                    <input type="number" class="form-control form-control-sm" placeholder="max" name="prixMax" value="{{ $prixMax }}">
                </div>
                <input type="submit" name="prix" value="filtrez prix" class="btn btn-success btn-sm"> 

        </form>
    </div>

    <div class='filtre_contents'>
        <form name="frm" action="" method="GET">
            <h5 class='filtre_titles'>Lieu</h5>
            
                <label for="province">Province</label>
                <select class="form-control form-control-sm" name="province_id" id="lieuProvince">

                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}" {{ ($province_id == $province->id) ? "selected" : "" }}>{{ $province->name }}</option>
                    @endforeach
                </select><br>

                <label for="ville">Ville</label><br>
                <select class="form-control form-control-sm" name="ville_id" id="lieuVille">
                    @foreach($villes as $ville)
                        @if($ville->province->id == $province_id)
                        <option value="{{ $ville->id }}" {{ ($ville_id == $ville->id) ? "selected" : "" }}>{{ $ville->name }}</option>
                        @endif
                    @endforeach
                </select>

                <br>
                <input type="submit" name="lieu" value="filtrez lieu" class="btn btn-success btn-sm">

        </form>
    </div>


</div>