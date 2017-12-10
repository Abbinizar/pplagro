@extends('layouts.navbar2')
@section('middle')


<!-- Middle Column -->
<div class="w3-col m7">
<div class="w3-container">
      <a href="{{url('investor/lihatpengajuan')}}" id="btn_miliksendiri" class="w3-card w3-button w3-half w3-yellow w3-hover-grey" title="Menunggu Konfirmasi"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Menunggu Konfirmasi"></a>
      <a href="{{url('investor/lihatpembayaran')}}" id="btn_semua" onclick="go('semua');" class="w3-card w3-button w3-half  w3-light-blue w3-hover-blue" title="Telah Dikonfirmasi"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Telah Dikonfirmasi"></a>
      
    </div>
 <div class="w3-row-padding">
    @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

   <div class="w3-row">
   <h4>
   Peternak : {{$row->user->name}} 
  

   </h4>
   <h4>
      Jenis Hewan : {{$row->jenisHewan}}
   </h4>
   <h4>Total : Rp. {{$row->total}}</h4>
   <h4> Jangka Waktu : {{$row->jangka_waktu}} bulan</h4>
  </div>

   
    
    <hr>
     <img src="{{url('img/ternak/'.$row->foto)}}" alt="-" class="w3-col">
    <hr>
    <p></p>
    {{$row->status}}
    <p class="pull-left" style="font-size: 10px;"></p>
  @if($row->status_pengajuan=='Menunggu Persetujuan')
 <a href="{{url('investor/lihatpengajuan/batal')}}/{{$row->id_pengajuan}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Batal</a>
 <a href="{{url('investor/lihatroi')}}/{{$row->id_pengajuan}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Lihat ROI</a>
  


 @else
  <a href="{{url('investor/konfirmasibayar')}}/{{$row->id_pembayaran}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Bayar</a>


 @endif


 
  </div> 
  @endforeach
  </div>

</div>
<script src="{{url('js/external/jquery/jquery.js')}}"></script>

@endsection



