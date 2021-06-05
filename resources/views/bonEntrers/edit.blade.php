@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Bon Entrer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bonEntrers') }}"> Back</a>
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

    <form action="{{ route('bonEntrers.update',$bonEntrer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h3>Modification bonEntrer</h3>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numéro:</strong>
                    <input type="number" name="numeroBE" value="{{ $bonEntrer->numeroBE }}" class="form-control" placeholder="Numero">
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
                    <strong>Fournisseur:</strong>
                    <select class="form-control" name="fournisseursId">
                        <option value="{{ $frs->id }}">{{ $frs->nom}}</option>
                        @foreach($listeFournisseur as $fournisseur)
                            <option value="{{$fournisseur->id}}" >{{$fournisseur->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantité Entrer:</strong>
                    <input type="text" class="form-control" value="{{ $bonEntrer->quantiteEntrer }}" name="quantiteEntrer" placeholder="Quantité Entrer ">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn warning">Enregistrer</button>
            </div>
        </div>

    </form>
@endsection
