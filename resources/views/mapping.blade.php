@extends('layout.app') 
@section('title') Zone mapping
@endsection
 
@section('content')
<div id="app">

    <section id="sectionBoard">

        {{-- @if ($idPage == $firstBoard)
        @else
        <a href="/board/read/{{ $idBD }}/{{ $idPage-1 }}"><img src="/img/back.svg" alt="précédent" id="backBoard"></a>
        @endif --}}
        <a href=""><img src="/img/back.svg" alt="précédent" id="backBoard"></a>

        <div id="page">
        
            <img draggable="false" src="/img/plancheBD.JPG" alt="planche de BD" id="img" class="boardsBD noselect" usemap="#planchemap">
            
            <map name="planchemap">
                <area id="map1" shape="rect" coords="0, 967, 949, 1425">
                <area id="map2" shape="rect" coords="483,486, 1430, 945">
            </map>
        </div>

        {{-- @if ($idPage == $lastBoard)
        @else
        <a href="/board/read/{{ $idBD }}/{{ $idPage+1 }}"><img src="/img/next.svg" alt="suivant" id="nextBoard"></a>
        @endif --}}
        <a href=""><img src="/img/next.svg" alt="suivant" id="nextBoard"></a>

    </section>

    <div class="buttonScrollBoard">
        <img src="/img/up.svg" alt="scroll up" id="scrollUpBoard">
        <img src="/img/down.svg" alt="scroll down" id="scrollDownBoard">
    </div>

    <a href="{{ Route('comics_index') }}">
        <button type="button" class="btn btn-outline-secondary" id="buttonReturnBoard">Retour</button>
    </a>

    <!-- For the selection of pages -->
    <form>
        <select id="pageChoice_board">
                <option value="" selected>Pages</option>
                {{-- @foreach ($boards as $board)
                    <a href="http://"><option value="{{ $board->board_number }}">{{ $board->board_number }}</option>
                @endforeach --}}
                <a href="http://"><option value="">1</option>

            </select>
    </form>

    <audio id="audio1">
        <source src="{{ asset('storage/medias/bubble.mp3') }}" type="audio/mp3">
    </audio>

    <audio id="audio2">
        <source src="{{ asset('storage/medias/plouf.mp3') }}" type="audio/mp3">
    </audio>

</div>

<script type="text/javascript">
    var map1 = document.getElementById('map1');
        var audio1 = document.getElementById('audio1');
        var playSound1;

        map1.addEventListener("mouseover", function(event)
        {
            console.log("on mouseover, play sound bubble on this map area: 400,0,600,50");
            playSound1 = setTimeout(function(){audio1.play()}, 2000);          
        });

        map1.addEventListener("mouseout", function(event)
        {
            clearTimeout(playSound1);
            audio1.load();
        });

        var map2 = document.getElementById('map2');
        var audio2 = document.getElementById('audio2');
        var playSound2;

        map2.addEventListener("mouseover", function(event)
        {
            console.log("on mouseover, play sound plouf on this map area: 420,320,740,580");
            playSound2 = setTimeout(function(){audio2.play()}, 500);
        });
        map2.addEventListener("mouseout", function(event)
        {
            clearTimeout(playSound2);
            audio2.load();
        });
</script>

@endsection