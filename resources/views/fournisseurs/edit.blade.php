@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
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

    <form action="{{ route('fournisseurs.update',$fournisseur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h3>Modification Fournisseur</h3>

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
                         <strong>Reference:</strong>
                         <input type="text" name="referenceFournisseur" value="{{ $fournisseur->referenceFournisseur }}" class="form-control" placeholder="Reference Fournisseur">
                     </div>
                 </div>

                 <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Nom:</strong>
                         <input type="text" class="form-control"  value="{{ $fournisseur->nom }}" name="nom" placeholder="Nom Fournisseur">
                     </div>
                 </div>

                 <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Adresse:</strong>
                         <input type="text" class="form-control" value="{{ $fournisseur->adresse }}" name="adresse" placeholder="Adresse Fournisseur">
                     </div>
                 </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom Materiel:</strong>
                    <input type="text" class="form-control" value="{{ $fournisseur->nomMateriel }}" name="nomMateriel" placeholder="Nom Materiel ">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn warning">Enregistrer</button>
            </div>
        </div>

    </form>
@endsection
