@extends('layouts.navbaradmin')
@section('middle')
<!-- Middle Column -->
<script src="{{url('js/external/jquery/jquery.js')}}"></script>
<div class="w3-col m7">
 
 @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

   <div class="w3-row">
   <h4>
    Bobot : {{$row->bobot}} kg
   </h4>
  </div>

   
   Kondisi : {{$row->kondisi}}
   <br>
   
    
    <p class="pull-left" style="font-size: 10px;"></p>
       <hr class="w3-clear">
   
  


    <!-- <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>  -->
  </div> 
  @endforeach


  <!-- End Middle Column -->
</div>


@endsection



