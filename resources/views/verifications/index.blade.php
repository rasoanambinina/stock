
@extends('products.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <h2>Listes des verifications</h2>


        <table class="">
            <tr>
                <th>Personne</th>
                <th>Materiel</th>
                <th >Action</th>
            </tr>
            @php $i =1; @endphp
            @foreach ($verifications as $verification)
                <tr>
                    <td>{{ $verification->nomPersonnel }}</td>
                    <td>{{ $verification->nomMateriel }}</td>
                    <td>
                        <form action="{{ route('verifications.destroy',$verification->id) }}" method="POST">
                            <input type="hidden" name="a" value="1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn danger">Valider</button>
                        </form>

                        <form action="{{ route('verifications.destroy',$verification->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="a" value="2">
                            <button type="submit" class="btn danger">Rejeter</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{--/ Affichage paginate num +5 --}}
    </div>



    <div class="form-popup" id="myForm">
        <form action="{{ route('verifications.store') }}" method="POST" class="form-container">
            @csrf


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
