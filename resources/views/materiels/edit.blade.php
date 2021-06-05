@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('materiels') }}"> Back</a>
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

    <form action="{{ route('materiels.update',$materiel->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Reference:</strong>
                         <input type="text" name="referenceMateriel" value="{{ $materiel->referenceMateriel }}" class="form-control" placeholder="Reference materiel">
                     </div>
                 </div>

                 <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Nom:</strong>
                         <input type="text" class="form-control"  value="{{ $materiel->nom }}" name="nom" placeholder="Nom materiel">
                     </div>
                 </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn warning">Enregistrer</button>
            </div>
        </div>

    </form>
@endsection
