@extends('products.layout')
@section('content')
    <div class="form-container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reference:</strong>
                <input type="text" name="referencePersonnel" value="{{ $personnel->referencePersonnel }}" class="form-control" placeholder="Reference Personnel">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" class="form-control"  value="{{ $personnel->nom }}" name="nom" placeholder="Nom Personnel" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prénom:</strong>
                <input type="text" class="form-control"  value="{{ $personnel->prenom }}" name="prenom" placeholder="Prenom Personnel" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Numéro CIN:</strong>
                <input type="text" class="form-control"  value="{{ $personnel->numCIN }}" name="numCIN" placeholder="Numéro CIN Personnel" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Téléphone:</strong>
                <input type="text" class="form-control"  value="{{ $personnel->telephone }}" name="telephone" placeholder="Téléphone Personnel" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Adresse:</strong>
                <input type="text" class="form-control" value="{{ $personnel->adresse }}" name="adresse" placeholder="Adresse Personnel" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fonction:</strong>
                <input type="text" class="form-control" value="{{ $personnel->fonction }}"  name="fonction" placeholder="Fonction Personnel" disabled>
            </div>
        </div>

    </div>
    </div>
@endsection
