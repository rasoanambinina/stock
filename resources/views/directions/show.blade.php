@extends('products.layout')
@section('content')

    <div class="form-container">
        <button class="btn back">Retourner</button>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code Direction:</strong>
                <input type="text" name="codeDirection" value="{{ $direction->codeDirection }}" class="form-control" placeholder="Code direction" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" class="form-control"  value="{{ $direction->nom }}" name="nom" placeholder="Nom direction" disabled>
            </div>
        </div>

    </div>
    </div>
@endsection
