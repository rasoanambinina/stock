@extends('products.layout')
@section('content')
    <div class="form-container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reference:</strong>
                <input type="text" name="referenceMateriel" value="{{ $materiel->referenceMateriel }}" class="form-control" placeholder="Reference materiel" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" class="form-control"  value="{{ $materiel->nom }}" name="nom" placeholder="Nom materiel" disabled>
            </div>
        </div>

    </div>
    </div>
@endsection
