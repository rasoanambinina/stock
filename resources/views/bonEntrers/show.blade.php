@extends('products.layout')
@section('content')
    <div class="form-container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numéro:</strong>
                    <input type="number" name="numero" value="" class="form-control" placeholder="Numéro" disabled>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Matériel:</strong>
                    <input type="text" class="form-control"  value="" name="materiel" placeholder=" Matériel" disabled>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fournisseur:</strong>
                    <input type="text" class="form-control" value="" name="fournisseur" placeholder="Fournisseur" disabled>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantité Entrer:</strong>
                <input type="text" class="form-control" value="{{ $bonEntrer->quantiteEntrer }}" name="quantiteEntrer" placeholder="Quantité Entrer" disabled>
            </div>
        </div>
    </div>
@endsection
