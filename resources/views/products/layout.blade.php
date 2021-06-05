<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style1.css">
</head>
<body>
<div class="navbar">
    <a href="#home">Accueil</a>
    <a href="{{route('fournisseurs')}}">Fournisseur</a>
    <div class="dropdown">
        <button class="dropbtn">Personnel
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="{{'depositaireComptable'}}">Dépositaire comptable</a>
            <a href="{{route('personnels')}}">Utilisateur</a>
        </div>
    </div>
    <a href="{{route('materiels')}}">Materiels</a>
    <a href="{{route('directions')}}">Direction</a>
    <a href="{{route('bonEntrers')}}">Bon Entrée</a>
    <a href="{{route('bonSorties')}}">Bon Sortie</a>
    <a href="{{route('demandes')}}">Demande</a>
</div>

<div class="content">

    @yield('content')
</div>

<div class="footer">
    <p>Footer</p>
</div>

</body>
</html>
