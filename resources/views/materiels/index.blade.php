
@extends('products.layout')
@section('content')
<!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            <h2>Liste des matériels </h2>
            <br>

            <br>

    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Reference</th>
            <th>Nom</th>
            <th>Prix Unitaire</th>
            <th>Stock</th>
            <th >Action</th>
        </tr>
        @php $i =1; @endphp
        @foreach ($materiels as $materiel)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $materiel->referenceMateriel }}</td>
            <td>{{ $materiel->nom }}</td>
            <td>{{ $materiel->prixUnitaire }}</td>
            <td>{{ $materiel->stock }}</td>
            <td>
                <form action="{{ route('materiels.destroy',$materiel->id) }}" method="POST">

                    <a class="btn infos" href="{{ route('materiels.show',$materiel->id) }}">Show</a>

                    <a class="btn default" href="{{ route('materiels.edit',$materiel->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
            {{--/ Affichage paginate num +5 --}}
          {{ $materiels->links() }}
    </div>

<button class="open-button" onclick="openForm()">Ajouter un fournisseur</button>

<div class="form-popup" id="myForm">
    <form action="{{ route('materiels.store') }}" method="POST" class="form-container">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Reference:</strong>
                    <input type="text" name="referenceMateriel" class="form-control" placeholder="Reference materiel">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" class="form-control" name="nom" placeholder="Nom materiel">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prix Unitaire:</strong>
                    <input type="number" class="form-control" name="prixUnitaire" placeholder="Prix Unitaire">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock:</strong>
                    <input type="number" class="form-control" name="stock" placeholder="Stock materiel">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn warning">Ajouter</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
            </div>
        </div>

    </form>
</div>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
@endsection
