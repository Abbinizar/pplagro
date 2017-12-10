@extends('layouts.navbaradmin')
@section('middle')
<!-- Middle Column -->
<script src="{{url('js/external/jquery/jquery.js')}}"></script>
<div class="w3-col m7">
 <div class="w3-container">
      <a href="{{url('admin/peternak')}}" id="btn_miliksendiri" class="w3-card w3-button w3-half w3-yellow w3-hover-grey" title="PETERNAK"><img src="" class="w3-circle" style="height:25px;width:25px" alt="PETERNAK"></a>
        <a href="{{url('admin/investor')}}" id="btn_miliksendiri" class="w3-card w3-button w3-half w3-blue w3-hover-grey" title="INVESTOR"><img src="" class="w3-circle" style="height:25px;width:25px" alt="INVESTOR"></a>

      </div>
 @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

  Nama: {{$row->name}} <br>
  Email : {{$row->email}} <br>
  Tanggal Daftar : {{$row->created_at}}    
    <p class="pull-left" style="font-size: 10px;"></p>
    

  </div> 
  @endforeach


  <!-- End Middle Column -->
</div>


@endsection



