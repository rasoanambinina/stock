
@extends('products.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <h2>Listes des demandes</h2>

        <button class="open-button" onclick="openForm()">Ajouter un demande</button>

        <table class="">
            <tr>
                <th>Personne</th>
                <th>Materiel</th>
                <th>Validation</th>
                <th >Action</th>
            </tr>
            @php $i =1; @endphp
            @foreach ($demandes as $demande)
                <tr>
                    <td>{{ $demande->nomPersonnel }}</td>
                    <td>{{ $demande->nomMateriel }}</td>
                    <td>{{ $demande->validation }}</td>
                    <td>
                        <form action="{{ route('demandes.destroy',$demande->id) }}" method="POST">

                            <a class="btn infos" href="{{ route('demandes.show',$demande->id) }}">Show</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{--/ Affichage paginate num +5 --}}
    </div>



    <div class="form-popup" id="myForm">
        <form action="{{ route('demandes.store') }}" method="POST" class="form-container">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Personne:</strong>
                        <select class="form-control" name="personnelsId">
                            @foreach($listePersonnels as $personnel)
                                <option value="{{$personnel->id}}">{{$personnel->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Materiel:</strong>
                        <select class="form-control" name="materielsId">
                            @foreach($listeMateriels as $materiel)
                                <option value="{{$materiel->id}}">{{$materiel->nom}}</option>
                            @endforeach
                        </select>
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
