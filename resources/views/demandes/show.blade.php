@extends('products.layout')
@section('content')
    <div class="form-container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Personne:</strong>
                    <input type="text" name="personne" value="{{ $personne->nom }}" class="form-control" placeholder="Personne" disabled>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Materiel:</strong>
                    <input type="text" class="form-control"  value="{{ $materiel->nom }}" name="materiel" placeholder="Materiel" disabled>
                </div>
            </div>

@endsection
