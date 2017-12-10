@extends('layouts.navbaradmin')
@section('middle')
<!-- Middle Column -->
<div class="w3-col m7">
  

     @foreach($data as $row)
    
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
 
    <span class="w3-right w3-opacity">{{$row->updated_at}}</span>
   
   Peternak : {{$row->user->name}}
    <hr class="w3-clear">
    
   Jenis Hewan : {{$row->jenisHewan}}
  <img src="{{url('img/ternak/'.$row->foto)}}" alt="-" class="w3-col">
    <span class="w3-right w3-opacity"></span>
    <br>
 {{$row->namabank}}
    <hr class="w3-clear">
   {{$row->fotobukti}}
     <img src="{{url('img/buktitransfer/'.$row->fotobukti)}}" alt="-" class="w3-col">
      {{$row->status_bayar}}
  <a href="{{url('admin/lihatbayar/kerjasama')}}/{{$row->id_penjualan}}" class="w3-button w3-theme-d1 w3-margin-bottom pull-right">Konfirmasi Pembayaran</a>

  </div>  @endforeach
 <br>
 
 
  <!-- End Middle Column -->
</div>
@endsection



