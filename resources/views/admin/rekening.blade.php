@extends('layouts.navbaradmin')
@section('middle')
<!-- Middle Column -->
<script src="{{url('js/external/jquery/jquery.js')}}"></script>
<div class="w3-col m7">
 <div class="w3-container">
      <a href="{{url('admin/tambahrekening')}}" id="btn_miliksendiri" class="w3-card w3-button w3-half w3-yellow w3-hover-grey" title="TAMBAH REKENING"><img src="" class="w3-circle" style="height:25px;width:25px" alt="TAMBAH REKENING"></a>
      </div>
 @foreach($rekening as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>


 <h4>Nama : {{$row->atasnama}}
   
 </h4> 
 <h4>
    No rekening :{{$row->norekening}}
 </h4>
 <h4>
    BANK : {{$row->namaBank}}
 </h4>
  
    
    <p class="pull-left" style="font-size: 10px;"></p>
      <br>
   <a href="{{url('admin/ubahbank')}}/{{$row->id_rekening}}">  <button id="ajukan" class="w3-button w3-theme"><i class="fa fa-pencil"></i>UBAH</button> </a>
 


    <!-- <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>  -->
  </div> 
  @endforeach


  <!-- End Middle Column -->
</div>


@endsection



