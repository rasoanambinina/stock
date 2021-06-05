@extends('products.layout')
@section('content')
    <div class="form-container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reference:</strong>
                    <input type="text" name="referenceFournisseur" value="{{ $fournisseur->referenceFournisseur }}" class="form-control" placeholder="Reference Fournisseur" disabled>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" class="form-control"  value="{{ $fournisseur->nom }}" name="nom" placeholder="Nom Fournisseur" disabled>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adresse:</strong>
                    <input type="text" class="form-control" value="{{ $fournisseur->adresse }}" name="adresse" placeholder="Adresse Fournisseur" disabled>
                </div>
            </div>
    </div>
@endsection
