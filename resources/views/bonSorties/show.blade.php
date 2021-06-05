@extends('products.layout')
@section('content')
    <div class="form-container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numéro:</strong>
                    <input type="number" name="numero" value="{{ $bonSortie->numeroBS }}" class="form-control" placeholder="Numéro" disabled>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Matériel:</strong>
                    <input type="text" class="form-control"  value="{{ $materiel->nom }}" name="materiel" placeholder=" Matériel" disabled>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Personnel:</strong>
                    <input type="text" class="form-control"  value="{{ $personnel->nom }}" name="personne" placeholder=" Personne" disabled>
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantité Sortie:</strong>
                <input type="text" class="form-control" value="{{ $bonSortie->quantiteSortie }}" name="quantiteSortie" placeholder="Quantité Sortie" disabled>
            </div>
        </div>
    </div>
@endsection
