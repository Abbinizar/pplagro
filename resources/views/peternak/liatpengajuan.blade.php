@extends('layouts.navbarternak')
@section('middle')
<!-- Middle Column -->
<div class="w3-col m7">
   <div class="w3-row">
    <div class="w3-container">
      <a href="{{url('peternak/lihatpengajuan')}}" id="btn_miliksendiri" class="w3-card w3-button w3-half w3-yellow w3-hover-grey" title="Menunggu Konfirmasi"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Menunggu Konfirmasi"></a>
      <a href="{{url('peternak/lihatpembayaran')}}" id="btn_semua" onclick="go('semua');" class="w3-card w3-button w3-half  w3-light-blue w3-hover-blue" title="Telah Dikonfirmasi"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Telah Dikonfirmasi"></a>
      
    </div>
  </div>

     @foreach($data as $row)
    
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
 
    <span class="w3-right w3-opacity">{{$row->updated_at}}</span>
   
   Peternak : {{$row->user->name}}
    <hr class="w3-clear">
    
   Jenis Hewan : {{$row->jenisHewan}}
  
    <span class="w3-right w3-opacity"></span>


     <img src="{{url('img/ternak/'.$row->foto)}}" alt="-" class="w3-col">
 
    <hr class="w3-clear">
    {{$row->status_pengajuan}}
      
 <a href="{{url('peternak/lihatpengajuan/setujui')}}/{{$row->id_pengajuan}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Terima</a>
  <a href="{{url('peternak/lihatpengajuan/tolak')}}/{{$row->id_pengajuan}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Tolak</a>
  
  </div> 



  @endforeach
 <br>
 
 
  <!-- End Middle Column -->
</div>
@endsection



