@extends('layout.app')
@section('title')
   stuff
@endsection
@section('content')
<button> Créer zone</button>


<!-- Quand on aura un controller qui renvoie et les zone(id+coord) et si elles ont un medai de lié, besoin de faire un foreach : if lié ou non -> afficher le area correspondant en remplacant les coords, et l'id par ceux correspondants.  -->
<img id="background_map"src="http://farm8.staticflickr.com/7259/6956772778_2fa755a228.jpg" alt="Planets" usemap="#planetmap" class="map">

 <map id="map_object"name="planetmap">
<!-- en rouge : avec media -->
<area id="test_area" shape="poly" coords="208,221,208,202,198,199,201,191,218,176,229,155,221,132,196,117,169,131,157,158,163,172,177,164,173,180,190,185,192,199,187,201,185,222" data-maphilight='{"alwaysOn": true,"strokeColor":"FE2E2E","strokeWidth":2,"fillColor":"FE2E2E","fillOpacity":0.6}' data-style= "without-media" href="" >

<!-- en bleu : sans media -->
 <area shape="poly"   data-maphilight='{"alwaysOn": true,"strokeColor":"0000ff","strokeWidth":2,"fillColor":"0000ff","fillOpacity":0.6}' data-style= "with-media"coords="160,225,160,250,202,300" href="" >
 <area shape="poly"   data-maphilight='{"alwaysOn": true,"strokeColor":"0000ff","strokeWidth":2,"fillColor":"0000ff","fillOpacity":0.6}' data-style= "with-media"coords="225,160,250,202,300,160" href="" >

</map>  
@endsection



@section('extraJS')
<script src="http://davidlynch.org/projects/maphilight/jquery.maphilight.js"></script>

<script>
// 

// //init the map for highlighting 
 $('.map').maphilight();


$(document).ready(function()
{
  
  $('area').each(function() {

    //   console.log($(this), 'ici');
    var data = $(this).data('maphilight');
  
    $(this).data('maphilight', data).trigger('alwaysOn.maphilight');   
    
      $(this).click(function(){
            //    console.log($(this))
            //    redirige vers ./area/{id}
            });
    });
    
});  
</script>


@endsection