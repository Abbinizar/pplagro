  @extends('layouts.navbarternak')
  @section('middle')
  <!-- Middle Column -->
  <div class="w3-col m7">

    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">

            @foreach($data as $row)
            <form action="{{url('peternak/ubah/')}}/{{$row->id_ternak}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}}
              <h6 class="w3-opacity">Tambah Hewan</h6>
              <hr class="w3-clear">
             
              <label for="file"  style="width: 100px;">Gambar: </label>
              <input type="file" accept=".jpg" value=" {{$row->foto}}.jpg" name="foto" id="file" class="w3-rest w3-border">
              <br>

              @if ($errors->has('foto')) <p style="color: red">{{ $errors->first('foto') }}</p> @endif
              <label for="jenisHewan"  style="width: 100px;">Jenis Hewan : </label>
              <select name="jenisHewan" id="jenisHewan" style="margin-top: 20px;" class="form-control">
                <option value="sapi perah">Sapi Perah</option>
                <option value="sapi bali">Sapi Bali</option>
                <option value="sapi simental">Sapi Simental</option>
              </select>
              <br>
              <label for="harga"  style="width: 100px;">Harga : </label>
              <input type="number" name="harga" value="{{$row->harga}}" id="harga" class="w3-rest w3-border">

              <br>
              @if ($errors->has('harga')) <p style="color: red">{{ $errors->first('harga') }}</p> @endif
              <label for="bobot"  style="width: 100px;">Bobot (kg) : </label>
              <input type="number" name="bobot" id="bobot" value= "{{$row->bobot}}" class="w3-rest w3-border">
              <br>
              @if ($errors->has('bobot')) <p style="color: red">{{ $errors->first('bobot') }}</p> @endif

              <label for="umur"  style="width: 100px;">Umur (bulan) : </label>
              <input type="number" name="umur" id="umur" value="{{$row->umur}}" class="w3-rest w3-border">
              <br>
              @if ($errors->has('umur')) <p style="color: red">{{ $errors->first('umur') }}</p> @endif

              <label for="lokasi"  style="width: 100px;">Lokasi </label>
              <br>

              <textarea  name="lokasi" contenteditable="true" class="w3-border w3-padding w3-col">{{$row->lokasi}}</textarea>
              <br>
              <label for="deskripsi"  style="width: 100px;">Deskripsi</label>
              <br>
              <textarea  name="deskripsi" contenteditable="true" class="w3-border w3-padding w3-col">{{$row->deskripsi}}</textarea>
              <br>
               @endforeach
              <hr class="w3-clear">
              <button type="submit" class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i>Tambah Hewan </button> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if(Auth::user()->status == 'Komunitas')
  <script src="{{url('js/external/jquery/jquery.js')}}"></script>
 
  @endif
  @endsection

