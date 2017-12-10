  @extends('layouts.navbaradmin')
  @section('middle')
  <!-- Middle Column -->
  <div class="w3-col m7">

    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
         
            <form action="{{url('admin/simpanrekening')}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}}
              <h6 class="w3-opacity">Tambah Rekening</h6>
              <hr class="w3-clear">
            
              <label for="atasnama"  style="width: 100px;">Atas nama : </label>
              <input type="text" name="atasnama"  id="atasnama" class="w3-rest w3-border">
              <br>
              @if ($errors->has('atasnama')) <p style="color: red">{{ $errors->first('atasnama') }}</p> @endif
              <label for="norekening"  style="width: 100px;">Nomer Rekening : </label>
              <input type="text" name="norekening" id="norekening" class="w3-rest w3-border">
              <br>
              @if ($errors->has('norekening')) <p style="color: red">{{ $errors->first('norekening') }}</p> @endif
              <label for="namabank" style="width: 100px;"> BANK : </label>
              <select name="namabank" id="namabank" style="margin-top: 20px;" class="form-control">
                <option value="BNI">BNI</option>
                <option value="BCA">BCA</option>
                <option value="Mandiri">Mandiri</option>
                <option value="BRI">BRI</option>
              </select>
              <hr class="w3-clear">
              <button type="submit" class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i> SIMPAN </button> 
            </form>
          
          </div>
        </div>
      </div>
    </div>
  </div>
 
  @endsection

