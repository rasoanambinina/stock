@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Bon Sortie</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bonSorties') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bonSorties.update',$bonSortie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h3>Modification bonSortie</h3>

        <!--    <div class="container">
                <form action="/action_page.php">
                    <label for="fname">Reference</label>
                    <input type="text" id="fname" name="firstname" placeholder="reference">

                    <label for="lname">Nom</label>
                    <input type="text" id="lname" name="lastname" placeholder="nom">

                    <label for="lname">Adresse</label>
                    <input type="text" id="lname" name="lastname" placeholder="adresse">


                    <input type="submit" value="Enregistrer">
                </form>
            </div> -->


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numéro:</strong>
                    <input type="number" name="numeroBS" value="{{ $bonSortie->numeroBS }}" class="form-control" placeholder="Numero">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Materiels:</strong>
                    <select class="form-control" name="materielsId">
                        <option value="{{ $mat->id }}">{{ $mat->nom }}</option>
                        @foreach($listeMateriels as $materiel)
                            <option value="{{$materiel->id}}" >{{$materiel->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Personne:</strong>
                    <select class="form-control" name="personnelsId">
                        <option value="{{ $pers->id }}">{{ $pers->nom}}</option>
                        @foreach($listePersonnes as $personne)
                            <option value="{{$personne->id}}" >{{$personne->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantité Sortie:</strong>
                    <input type="text" class="form-control" value="{{ $bonSortie->quantiteSortie }}" name="quantiteSortie" placeholder="Quantité Sortie ">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn warning">Enregistrer</button>
            </div>
        </div>

    </form>
@endsection
