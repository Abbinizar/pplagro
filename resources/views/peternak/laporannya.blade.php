@extends('layouts.navbarternak')
@section('middle')
<!-- Middle Column -->
 <script src="{{url('/jquery-3.2.1.min.js')}}"></script>
<div class="w3-col m7">
  @foreach($data as $row)
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <!-- <img src="/w3images/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"> -->
    <span class="w3-right w3-opacity">{{$row->updated_at}}</span>
    <h4>{{$row->user->name}}</h4>
    <hr class="w3-clear">
    <p>{{$row->jenisHewan}}</p>
  <img src="{{url('img/ternak/'.$row->foto)}}" alt="-" class="w3-col">
  <h1>
    Harga : {{$row->harga}}
<br>
Bobot : {{$row->bobot}} <br>
Umur : {{$row->umur}} <br>
Lokasi : {{$row->lokasi}} <br>
Deskripsi : {{$row->deskripsi}} <br>
  </h1>
<a href="{{url('peternak/formpemantauan')}}/{{$row->id_pembayaran}}">  <button class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i>Tambah Laporan</button>  </a>
@endforeach


  
    <div class="w3-row-padding">
    <center>
      LAPORAN
    </center>
      <div class="w3-col m12">
      @foreach($laporan as $lapor)
     
        <div class="w3-card w3-round w3-white">
        Bobot : {{$lapor->bobot}} <br>
        Kondisi : {{$lapor->kondisi}}

        </div>
        <a href="{{url('peternak/ubahlaporan')}}/{{$lapor->id_pemantauan}}">  <button id="ajukan" class="w3-button w3-theme"><i class="fa fa-pencil"></i>UBAH LAPORAN</button> </a>
 
        @endforeach
      </div>
    </div>
  
  </div> 
  

  <!-- End Middle Column -->
</div>
  

@endsection



