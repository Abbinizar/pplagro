@extends('layouts.navbar2')
@section('middle')
<!-- Middle Column -->
<div class="w3-col m7">
  
     @foreach($data as $row)
    
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
 
    <span class="w3-right w3-opacity">{{$row->updated_at}}</span>
   
   Peternak : {{$row->user->name}}
    <hr class="w3-clear">
    
   Jenis Hewan : {{$row->jenisHewan}}
  
    <span class="w3-right w3-opacity"></span>
    <h4>Pakan : {{$row->pakan}} </h4>
    <h4>Perawatan : {{$row->perawatan}}</h4>
    <h4>Asuransi : {{$row->asuransi}}</h4>
    <h4>Jangka Waktu : {{$row->jangkawaktu}}</h4>
    <hr class="w3-clear">
    {{$row->status_pengajuan}}

 <a href="{{url('peternak/lihatpengajuan/setujui')}}/{{$row->id_pengajuan}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Unggah Bukti Transfer</a>
  </div> 


  @endforeach
 <br>
 
 
  <!-- End Middle Column -->
</div>
@endsection



