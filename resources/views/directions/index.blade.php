
@extends('products.layout')
@section('content')
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

            <h2>Liste des directions </h2>
            <br>
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Code Direction</th>
            <th>Nom</th>
            <th width=>Action</th>
        </tr>
        @php $i =1; @endphp
        @foreach ($directions as $direction)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $direction->codeDirection }}</td>
            <td>{{ $direction->nom }}</td>
            <td>
                <form action="{{ route('directions.destroy',$direction->id) }}" method="POST">

                    <a class="btn infos" href="{{ route('directions.show',$direction->id) }}">Show</a>

                    <a class="btn default" href="{{ route('directions.edit',$direction->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
            {{--/ Affichage paginate num +5 --}}
          {{ $directions->links() }}
    </div>

        <button class="open-button" onclick="openForm()">Ajouter un fournisseur</button>

        <div class="form-popup" id="myForm">
            <form action="{{ route('directions.store') }}" method="POST" class="form-container">
                @csrf

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Code Direction:</strong>
                            <input type="text" name="codeDirection" class="form-control" placeholder="Code direction">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nom:</strong>
                            <input type="text" class="form-control" name="nom" placeholder="Nom direction">
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
