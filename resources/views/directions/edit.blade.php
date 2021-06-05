@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modification Direction</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('directions') }}"> Back</a>
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

    <form action="{{ route('directions.update',$direction->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Code Direction:</strong>
                         <input type="text" name="codeDirection" value="{{ $direction->codeDirection }}" class="form-control" placeholder="Code direction">
                     </div>
                 </div>

                 <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Nom:</strong>
                         <input type="text" class="form-control"  value="{{ $direction->nom }}" name="nom" placeholder="Nom direction">
                     </div>
                 </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn warning">Enregistrer</button>
            </div>
        </div>

    </form>
@endsection
