@extends('layout.app')

@section('title')
    Board
@endsection
 
@section('content')
<div id="app">

    <section id="sectionBoard">
            
        @if ($idPage == $firstBoard)
        @else
        <a href="/board/read/{{ $idBD }}/{{ $idPage-1 }}"><img src="/img/back.svg" alt="précédent" id="backBoard"></a>
        @endif

        <div id="page">
            <img draggable="false" src="/storage/pages/{{ $board->pluck('board_image')[0] }}" alt="planche de BD" id="img" class="boardsBD noselect">
        </div>
        
        @if ($idPage == $lastBoard)
        @else
        <a href="/board/read/{{ $idBD }}/{{ $idPage+1 }}"><img src="/img/next.svg" alt="suivant" id="nextBoard"></a>
        @endif
        
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
                @foreach ($boards as $board)
                    <a href="http://"><option value="{{ $board->board_number }}">{{ $board->board_number }}</option>
                @endforeach
            </select>
    </form>

</div>
@endsection