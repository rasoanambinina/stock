
@extends('products.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <h2>Listes des materiels sorties</h2>

        <button class="open-button" onclick="openForm()">Ajouter un bon sortie</button>

            <table class="">
                <tr>
                    <th>No</th>
                    <th>NuméroBS</th>
                    <th>Materiel</th>
                    <th>Personnel</th>
                    <th>Quantité Sortie</th>
                    <th >Action</th>
                </tr>
                @php $i =1; @endphp
                @foreach ($bonSorties as $bonSortie)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $bonSortie->numeroBS}}</td>
                        <td>{{ $bonSortie->nomMateriel}}</td>
                        <td>{{ $bonSortie->nomPersonne}}</td>
                        <td>{{ $bonSortie->quantiteSortie }}</td>
                        <td>
                            <form action="{{ route('bonSorties.destroy',$bonSortie->id) }}" method="POST">

                                <a class="btn infos" href="{{ route('bonSorties.show',$bonSortie->id) }}">Show</a>

                                <a class="btn default" href="{{ route('bonSorties.edit',$bonSortie->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

        {{--/ Affichage paginate num +5 --}}

    </div>



    <div class="form-popup" id="myForm">
        <form action="{{ route('bonSorties.store') }}" method="POST" class="form-container">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Numéro:</strong>
                        <input type="number" name="numeroBS" class="form-control" placeholder="numero bonSortie" required>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Materiels:</strong>
                        <select class="form-control" name="materielsId">
                            @foreach($listeMateriels as $materiel)
                                <option value="{{$materiel->id}}">{{$materiel->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Personne:</strong>
                        <select class="form-control" name="personnelsId">
                            @foreach($listePersonnes as $personne)
                                <option value="{{$personne->id}}">{{$personne->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Quantité Sortie:</strong>
                        <input type="text" class="form-control"  name="quantiteSortie" placeholder="Quantité Sortie">
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
