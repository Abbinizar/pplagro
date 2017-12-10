@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
<div class="w3-col m7">

  
  
  
  
  <br>
 @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

   <div class="w3-row">
   <h4>
    {{$row->user->name}} :  {{$row->jenisHewan}}
   </h4>
  </div>

    <span class="w3-right w3-opacity"></span>
    <h4></h4>
    <hr>
    <img src="{{url('img/ternak/'.$row->foto)}}" alt="-" class="w3-col">
    <hr>
    <p></p>
    
    <p class="pull-left" style="font-size: 10px;"></p>
    <a href="{{url('investor/pengajuan')}}/{{$row->id_ternak}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Pengajuan</a>
 
    <!-- <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>  -->
  </div> 
  @endforeach


  <!-- End Middle Column -->
</div>
<script src="{{url('js/external/jquery/jquery.js')}}"></script>

@endsection



