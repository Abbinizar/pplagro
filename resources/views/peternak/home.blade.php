@extends('layouts.navbarternak')
@section('middle')
<!-- Middle Column -->
<script src="{{url('js/external/jquery/jquery.js')}}"></script>
<div class="w3-col m7"><div class="w3-row">
    <div class="w3-container">
      <a href="{{url('peternak/miliksendiri')}}" id="btn_miliksendiri" class="w3-card w3-button w3-half w3-yellow w3-hover-grey" title="Milik Sendiri"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Milik Sendiri"></a>
      <a href="{{url('peternak/miliksemua')}}" id="btn_semua" onclick="go('semua');" class="w3-card w3-button w3-half  w3-light-blue w3-hover-blue" title="Semua Peternak"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Semua Peternak"></a>
      
    </div>
  </div>
  <br>
 @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

   <div class="w3-row">
   <h4>
    Peternak :{{$row->user->name}}<br>
    {{$row->jenisHewan}}
   </h4>
  </div>

    <span class="w3-right w3-opacity"></span>
    <h4></h4>
    <hr>
    <img src="{{url('img/ternak/'.$row->foto)}}" alt="-" class="w3-col">
    <hr>
    <p></p>
    
    <p class="pull-left" style="font-size: 10px;"></p>
       <hr class="w3-clear">
         <h4>
     Harga : {{$row->harga}}
   </h4>

     <h4>
     Bobot : {{$row->bobot}} kg
   </h4>
   <h4>
     Lokasi : {{$row->lokasi}}
   </h4>

   <h4>
     {{$row->statusjual}}
   </h4> <br>
 

     @if($row->id_user==Auth::user()->id)
<a href="{{url('peternak/ternak/hapus')}}/{{$row->id_ternak}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">HAPUS</a>
    <a href="{{url('peternak/ternak/ubah')}}/{{$row->id_ternak}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Ubah</a>
     
     @endif

    <!-- <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>  -->
  </div> 
  @endforeach


  <!-- End Middle Column -->
</div>


@endsection



