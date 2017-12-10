  @extends('layouts.navbarternak')
  @section('middle')
  <!-- Middle Column -->
  <div class="w3-col m7">

    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
          @foreach($data as $row)
            <form action="{{url('peternak/konfirmasibayar')}}/{{$row->id_pembayaran}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}}
              <h6 class="w3-opacity">Konfirmasi Bayar</h6>
              <hr class="w3-clear">
              <label>
                BANK :
              </label>
              <br>
              @foreach($rekening as $r)
                <input type="radio" name="rekening" value="{{$r->id_rekening}}"> BANK : {{$r->namaBank}}
                <br>
               atas nama : {{$r->atasnama}}
                @if ($errors->has('rekening')) <p style="color: red">{{ $errors->first('rekening') }}</p> @endif
                <br>
                         @endforeach
              
              <label for="file"  style="width: 100px;">Bukti Transfer: </label>
              <input type="file" accept=".jpg" name="foto" id="file" class="w3-rest w3-border">
              <br>
              @if ($errors->has('foto')) <p style="color: red">{{ $errors->first('foto') }}</p> @endif
              
              <hr class="w3-clear">
              <button type="submit" class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i>Upload</button> 
            </form>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

