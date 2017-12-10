  @extends('layouts.navbaradmin')
  @section('middle')
  <!-- Middle Column -->      
  <div class="w3-col m7">

    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
         
            <form action="{{url('admin/simpanroi')}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}}
              <h6 class="w3-opacity">Tambah Rekening</h6>
              <hr class="w3-clear">
            
              <label for="jangka_waktu"  style="width: 100px;">Jangka Waktu: </label>
              <input type="text" name="jangka_waktu"  id="atasnama" class="w3-rest w3-border">
              <br>
              @if ($errors->has('jangka_waktu')) <p style="color: red">{{ $errors->first('jangka_waktu') }}</p> @endif
              <label for="rawat"  style="width: 100px;">Perawatan: </label>
              <input type="number" name="rawat" id="rawat" class="w3-rest w3-border">
              <br>
              @if ($errors->has('rawat')) <p style="color: red">{{ $errors->first('rawat') }}</p> @endif
            
              <label for="pakan"  style="width: 100px;">Pakan: </label>
              <input type="number" name="pakan" id="pakan" class="w3-rest w3-border">
              @if ($errors->has('pakan')) <p style="color: red">{{ $errors->first('pakan') }}</p> @endif
              <br>
              <label for="asuransi"  style="width: 100px;">Asuransi: </label>
              <input type="number" name="asuransi" id="asuransi" class="w3-rest w3-border">
              @if ($errors->has('asuransi')) <p style="color: red">{{ $errors->first('asuransi') }}</p> @endif
              <hr class="w3-clear">
              <button type="submit" class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i> SIMPAN </button> 
            </form>
          
          </div>
        </div>
      </div>
    </div>
  </div>
 
  @endsection

