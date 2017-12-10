@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
<script src="{{url('js/external/jquery/jquery.js')}}"></script>
<div class="w3-col m7">
  @foreach($data as $r)
 @foreach($laporan as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

   <div class="w3-row">
   <h4>
    Bobot : {{$row->bobot}}
   </h4>
  </div>

    
    <hr>
   Kondisi : {{$row->kondisi}}
   <br>
   
    
    <p class="pull-left" style="font-size: 10px;"></p>
       <hr class="w3-clear">
   
    <hr>


    <!-- <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>  -->
  </div> 
  @endforeach
   @if($r->statusinvest=='Belum Selesai')
 
  <a href="{{url('investor/jual')}}/{{$r->id_pembayaran}}">
    <button type="submit" class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i>JUAL HEWAN</button> 
  </a>
  @endif

 @endforeach
  <!-- End Middle Column -->
</div>


@endsection



