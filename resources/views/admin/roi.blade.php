@extends('layouts.navbaradmin')
@section('middle')
<!-- Middle Column -->
<script src="{{url('js/external/jquery/jquery.js')}}"></script>
<div class="w3-col m7">
 <div class="w3-container">
      <a href="{{url('admin/tambahroi')}}" id="btn_miliksendiri" class="w3-card w3-button w3-half w3-yellow w3-hover-grey" title="TAMBAH ROI"><img src="" class="w3-circle" style="height:25px;width:25px" alt="TAMBAH ROI"></a>
      </div>
 @foreach($roi as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

   <h4>
Jangka waktu : {{$row->jangka_waktu}} <br>
Pakan : {{$row->pakan}}
   </h4>
 

    <p class="pull-left" style="font-size: 10px;"></p>
       <hr class="w3-clear">
   <a href="{{url('admin/ubahroi')}}/{{$row->id_roi}}">  <button id="ajukan" class="w3-button w3-theme"><i class="fa fa-pencil"></i>UBAH</button> </a>
    <hr>


  </div> 
  @endforeach


  <!-- End Middle Column -->
</div>


@endsection



