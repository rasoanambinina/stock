
@extends('products.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <h2>Listes des materiels entrées</h2>

        <button class="open-button" onclick="openForm()">Ajouter un bon entrer</button>

        <table class="">
            <tr>
                <th>No</th>
                <th>NuméroBE</th>
                <th>Materiel</th>
                <th>Fournisseur</th>
                <th>Quantité Entrer</th>
                <th >Action</th>
            </tr>
            @php $i =1; @endphp
            @foreach ($bonEntrers as $bonEntrer)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $bonEntrer->numeroBE}}</td>
                    <td>{{ $bonEntrer->nomMateriel}}</td>
                    <td>{{ $bonEntrer->nomFournisseur}}</td>
                    <td>{{ $bonEntrer->quantiteEntrer }}</td>
                    <td>
                        <form action="{{ route('bonEntrers.destroy',$bonEntrer->id) }}" method="POST">

                            <a class="btn infos" href="{{ route('bonEntrers.show',$bonEntrer->id) }}">Show</a>

                            <a class="btn default" href="{{ route('bonEntrers.edit',$bonEntrer->id) }}">Edit</a>

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
        <form action="{{ route('bonEntrers.store') }}" method="POST" class="form-container">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Numéro:</strong>
                        <input type="number" name="numeroBE" class="form-control" placeholder="numero bonEntrer" required>
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
                        <strong>Fournisseur:</strong>
                        <select class="form-control" name="fournisseursId">
                            @foreach($listeFournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}"> {{$fournisseur->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Quantité Entrer:</strong>
                        <input type="number" class="form-control"  name="quantiteEntrer" placeholder="Quantité Entrer">
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
