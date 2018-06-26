@extends('layout.app')

@section('title')
Modifier Bande dessinée
@endsection

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@section('content')

<div class="container modify">
    <form method="POST" enctype="multipart/form-data" action="{{ action('ComicsController@update', [$comic->comic_id]) }}">
        @csrf

        <section class="page-titles">
            <h2>Modifier la Bande Dessinée</h2>
            <p>/</p>
        </section>

        <label for="titre">Titre de la Bande Dessinée :</label>
        <input type="text" id="titre" name="titre" value="{{$comic->comic_title}}"/>
        
        <label for="editeur"> Nom de l'éditeur :</label>
        <input type="text" id="editeur" name="editeur" value="{{$comic->comic_publisher}}"/>

        <label for="auteur">Nom de l'auteur :</label>
        <input type="text" id="auteur" name="auteur" value="{{$comic->comic_author}}"/>

        <p class="label-miniature">Miniature :</p>
        <div class="contain-miniature">
            <label class="label-browse" id="label-browse" for="miniature">Parcourir . . .</label>
            <input class="inputfile" type="file" id="miniature" name="miniature" />
            <span id="fileuploadurl">{{$comic->comic_miniature_url}}</span>
        </div>

        <div class="material-toggle">
            @if($comic->comic_publication === 1)
            <input id="publication" name="publication" type="checkbox" checked="checked" />
            @else
            <input id="publication" name="publication" type="checkbox" />
            @endif
            <label for="publication" class="label-amber"></label>
            <p class="label-publication">Publication On/Off</p>
        </div>

        <input class="btn-outline" type="submit" value="MODIFIER" />

        <div id="delete-group">
            <h4 id="delete-bd-title">Supprimer la Bande Dessinée</h4>
            <a id="delete-bd-icon" href="{{route('comic_delete',[$comic->comic_id])}}"><i class="material-icons catalogue">delete_forever</i></a>
        </div>

    </form>


  <!--   <form>
        <h4>Modifier une page </h4>
        <label for="page">Selectionner une page</label>

        <select id="page">
            <option selected value="0">choisissez une page</option>
            <option value="1">Nom/numero de la page</option>
            <option value="2">Nom/numero de la page</option>
            <option value="3">Nom/numero de la page</option>
            <option value="4">Nom/numero de la page</option>
        </select>

        <button>Aller à la modification de la page</button>
    </form> -->
</div>
@endsection