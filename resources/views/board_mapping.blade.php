@extends('layout.app') 
@section('title') Test media
@endsection



<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
@section('content')
<div id="app">
    <div id="page">
        <section id="sectionBoard">

            <img src="/img/plancheBD.JPG" usemap="#planchemap">

            <map name="planchemap">
                <area style="filter: grayscale(1); cursor:pointer;" shape="rect" coords="400,0,600,50" id="map1">
                <area style="cursor:pointer;" shape="rect" coords="420,320,740,580" id="map2">
            </map>

            <audio id="audio1">
                <source src="/audio/secours.ogg" type="audio/ogg">
            </audio>

            <audio id="audio2">
                <source src="{{ asset('storage/medias/plouf.mp3') }}" type="audio/ogg">
            </audio>

            <script type="text/javascript">
                var map1 = document.getElementById('map1');
                var x1 = document.getElementById('audio1');
                var test1;

                map1.addEventListener("mouseover", function(event){
                    console.log("yes");
                    test1 = setTimeout(function(){x1.play()}, 2000);          
                });
                map1.addEventListener("mouseout", function(event){
                    clearTimeout(test1);
                    x1.load();
                });

                var map2 = document.getElementById('map2');
                var x2 = document.getElementById('audio2');
                var test2;

                map2.addEventListener("mouseover", function(event){
                    console.log("mouseOver ok");
                    test2 = setTimeout(function(){x2.play()}, 2000);
                });
                map2.addEventListener("mouseout", function(event){
                    clearTimeout(test2);
                    x2.load();

                });
            </script>
        </section>
    </div>
</div>
@endsection