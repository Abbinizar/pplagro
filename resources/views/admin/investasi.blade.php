@extends('layouts.navbaradmin')
@section('middle')
<!-- Middle Column -->
<script src="{{url('js/external/jquery/jquery.js')}}"></script>
<div class="w3-col m7">

 @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>



 <h4>
   Jangka Waktu : {{$row->jangka_waktu}} bulan

 </h4>

  <h4>
    Biaya investasi : Rp. {{$row->total}}
  </h4>
    
    <p class="pull-left" style="font-size: 10px;"></p>
      <br>
  <a href="{{url('admin/lihatlaporan')}}/{{$row->id_pembayaran}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">LIHAT LAPORAN</a>
 
  </div> 

  @endforeach


  <!-- End Middle Column -->
</div>


@endsection



