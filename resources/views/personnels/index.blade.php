
@extends('products.layout')
@section('content')
             <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            <h2>Liste des personnels </h2>
            <br/>
    <table class="">
        <tr>
            <th>No</th>
            <th>Reference</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro CIN</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Fonction</th>
            <th >Action</th>
        </tr>
        @php $i =1; @endphp
        @foreach ($personnels as $personnel)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $personnel->referencePersonnel }}</td>
            <td>{{ $personnel->nom }}</td>
            <td>{{ $personnel->prenom }}</td>
            <td>{{ $personnel->numCIN }}</td>
            <td>{{ $personnel->telephone }}</td>
            <td>{{ $personnel->adresse }}</td>
            <td>{{ $personnel->fonction }}</td>
            <td>
                <form action="{{ route('personnels.destroy',$personnel->id) }}" method="POST">

                    <a class="btn infos" href="{{ route('personnels.show',$personnel->id) }}">Show</a>

                    <a class="btn default" href="{{ route('personnels.edit',$personnel->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
            {{--/ Affichage paginate num +5 --}}
          {{ $personnels->links() }}
    </div>


             <button class="open-button" onclick="openForm()">Ajouter un personnel</button>

             <div class="form-popup" id="myForm">
                 <form action="{{ route('personnels.store') }}" method="POST" class="form-container">
                     @csrf

                     <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                 <input type="text" name="referencePersonnel" class="form-control" placeholder="Reference Personnel">
                             </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                 <input type="text" class="form-control" name="nom" placeholder="Nom Personnel">
                             </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                 <input type="text" class="form-control" name="prenom" placeholder="Prenom Personnel">
                             </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                 <input type="text" class="form-control" name="numCIN" placeholder="Numéro CIN Personnel">
                             </div>
                         </div>

                         <div class="col-xs-8 col-sm-8 col-md-8">
                             <div class="form-group">
                                 <input type="text" class="form-control" name="telephone" placeholder="Téléphone Personnel">
                             </div>
                         </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                 <select name="fonction" id="fonction" required>
                                     <option value="">choisir la fonction du personnel</option>
                                     <option value="Dépositaire comptable">Dépositaire comptable</option>
                                     <option value="Secrétaire">Secrétaire</option>
                                     <option value="Chef de service">Chef de service</option>
                                 </select>
                             </div>
                         </div>


                         <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                 <input type="text" class="form-control" name="adresse" placeholder="Adresse Personnel">
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
