
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
        </tr>
        @endforeach
    </table>
            {{--/ Affichage paginate num +5 --}}
          {{ $personnels->links() }}

@endsection
