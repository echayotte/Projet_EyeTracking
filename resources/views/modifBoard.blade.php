@extends('layout.app') 
@section('title') Mapping Board
@endsection
 
@section('content')
<div id="app">

    <section id="sectionBoard">

            <div class="row">

                <div class="col-3">
                    
                    <button type="button" class="btn btn-outline-secondary" id="btnCreateArea">Créer une zone</button>
                    <button type="button" class="btn btn-outline-secondary" id="btnModifArea">Modifier une zone</button>
                    
                    @isset($result) {{{ $result }}} @endisset

                    <div class="card" id="showModalArea">
                        <div class="card-body">
                            <form method="post" action="/modifBoard" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-12">
                                            <label for="tpsDeclenchement">Temps de déclenchement</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-7">
                                            <input type="number" name="declanchement" class="form-control" id="tpsDeclenchement">
                                        </div>
                                        <div class="col-3">
                                            secondes
                                        </div>
                                    </div>
                                </div>

                                <!-- if file does not comply / do not pass validations -->
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <!-- if the sending in the db is successful. The two possible $ results are modifiable in mediascontroller line 45 & 50 -->
                                            
                                <select name="dataType" required>
                                            <option value="img">Image</option> 
                                            <option value="son" >Son</option>
                                            <option value="video">Video</option>
                                        </select>

                                <input type="file" name="file" required/>
                                <p><input id="inputSubmit" type="submit" class="btn btn-primary" value="Valider"></p>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-9" id="boardWithAreas">

                    <div id="page">
                        <img style="border: 1px solid red;" src="{{asset('/storage/pages/hb4.jpg') }}" alt="planche BD">
                    </div>

                </div>

            </div>

    </section>

    <div class="buttonScrollBoard">
        <img src="/img/up.svg" alt="scroll up" id="scrollUpBoard">
        <img src="/img/down.svg" alt="scroll down" id="scrollDownBoard">
    </div>


    <!-- For the selection of pages -->
    {{--
    <form>
        <select id="pageChoice_board">
                <option value="" selected>Pages</option>
                @foreach ($boards as $board)
                    <a href="http://"><option value="{{ $board->board_number }}">{{ $board->board_number }}</option>
                @endforeach
            </select>
    </form> --}}

</div>
@endsection
 {{-- 
@extends('layout.app') 
@section('title') Home
@endsection
 
@section('content')
<div id="app">
    <section id="sectionModifBoard">
        <div class="row">
            <div class="col-4">
                <button type="button" class="btn btn-outline-secondary" id="btnCreateArea">Créer une zone</button>
                <button type="button" class="btn btn-outline-secondary" id="btnModifArea">Modifier une zone</button> @isset($result)
                {{{ $result }}} @endisset

                <div class="card" id="showModalArea">
                    <div class="card-body">
                        <form method="post" action="/modifBoard" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">

                                <div class="row">
                                    <div class="col-12">
                                        <label for="tpsDeclenchement">Temps de déclenchement</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <input type="number" name="declanchement" class="form-control" id="tpsDeclenchement">
                                    </div>
                                    <div class="col-3">
                                        secondes
                                    </div>
                                </div>
                            </div>

                            <!-- if file does not comply / do not pass validations -->
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- if the sending in the db is successful.
                                the two possible $ results are modifiable
                                in mediascontroller line 45 & 50 -->
                            <select name="dataType" required>
                                <option value="img">Image</option> 
                                <option value="son" >Son</option>
                                <option value="video">Video</option>
                            </select>

                            <input type="file" name="file" required/>
                            <p><input type="submit" class="btn btn-primary" value="Valider"></p>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-8" id="boardWithAreas">

                <div id="page">
                    <img src="/img/plancheBD.JPG" alt="planche BD">
                </div>

            </div>

        </div>
    </section>
</div>
@endsection
 --}}