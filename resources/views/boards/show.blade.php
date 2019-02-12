@extends('layout.app') 
@section('title') Board
@endsection
 
@section('content')
<div id="app">

    <section id="sectionBoard">
        <a href=""><img src="/img/back.svg" alt="précédent" id="backBoard"></a>
        <div id="page">
            <img draggable="false" src="/storage/images/pages/{{ $board[0] }}" alt="planche de BD" id="img" class="boardsBD noselect">
        </div>
        <a href=""><img src="/img/next.svg" alt="suivant" id="nextBoard"></a>
    </section>
    <div class="buttonScrollBoard">
        <img src="/img/up.svg" alt="scroll up" id="scrollUpBoard">
        <img src="/img/down.svg" alt="scroll down" id="scrollDownBoard">
    </div>
    <button type="button" class="btn btn-outline-secondary" id="buttonReturnBoard">Retour</button>

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