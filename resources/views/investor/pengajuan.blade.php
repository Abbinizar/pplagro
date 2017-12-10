@extends('layouts.navbar2')
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



  
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
            <form action="{{url('investor/pengajuan/'.$row->id_ternak.'/tambah')}}" method="post" accept-charset="utf-8">
              {{csrf_field()}}
                 <label for="jangkawaktu" onclick="setData();" style="width: 100px;">Jangka Waktu : </label>
                 <br>
                @foreach($roi as $r)
                <input type="radio" name="roi" value="{{$r->id_roi}}">Jangka Waktu : {{$r->jangka_waktu}} bulan
                <br>
                Harga Asuransi : {{$r->asuransi}}
                <br>
                Harga Pakan :{{$r->pakan}}
                <br>
                Harga Rawat : {{$r->rawat}}
                <br>

                Total :{{$r->rawat+$r->pakan+$row->harga+($row->harga*1.3)}} <br>
                @if ($errors->has('roi')) <p style="color: red">{{ $errors->first('roi') }}</p> @endif
                         @endforeach
                            <br>
                            
                      
                       <script>
        $(document).ready(function(){
            setROI();
        })
        function setROI(){
      
        }
    </script>
                       <br>
                       <br>
              <button type="submit" id="ajukan" class="w3-button w3-theme" onclick="setAjukan()"><i class="fa fa-pencil"></i>Ajukan</button> 
            </form>
            <br>
           
            
          </div>
        </div>
      </div>
    </div>
  
  </div> 
  
@endforeach
  <!-- End Middle Column -->
</div>
  

@endsection



