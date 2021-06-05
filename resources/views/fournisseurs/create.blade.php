@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajouter nouveau Fournisseur</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('fournisseurs') }}"> Back</a>
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

<form action="{{ route('fournisseurs.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reference:</strong>
                <input type="text" name="referenceFournisseur" class="form-control" placeholder="Reference Fournisseur">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" class="form-control" name="nom" placeholder="Nom Fournisseur">
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>Adresse:</strong>
                 <input type="text" class="form-control"  name="adresse" placeholder="Adresse Fournisseur">
             </div>
         </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>NomMateriel:</strong>
                 <input type="text" class="form-control"  name="nomMateriel" placeholder="Nom Materiel">
             </div>
         </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn warning">Submit</button>
        </div>
    </div>

</form>




@endsection
