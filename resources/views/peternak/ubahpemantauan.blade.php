  @extends('layouts.navbarternak')
  @section('middle')
  <!-- Middle Column -->
  <div class="w3-col m7">

    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
          @foreach($data as $row)
            <form action="{{url('peternak/ubahpemantauan')}}/{{$row->id_pemantauan}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}}
              <h6 class="w3-opacity">Ubah Pemantauan</h6>
              <hr class="w3-clear">
            
              <label for="bobot"  style="width: 100px;">Bobot (kg) : </label>
              <input type="number" name="bobot" value="{{$row->bobot}}" id="bobot" class="w3-rest w3-border">
              <br>
              @if ($errors->has('bobot')) <p style="color: red">{{ $errors->first('bobot') }}</p> @endif

             <label for="kondisi"  style="width: 100px;">Kondisi</label>
              <br>
              <textarea  name="kondisi" contenteditable="true" class="w3-border w3-padding w3-col">{{$row->kondisi}}</textarea>
               @if ($errors->has('kondisi')) <p style="color: red">{{ $errors->first('kondisi') }}</p> @endif
              
              <hr class="w3-clear">
              <button type="submit" class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i> SIMPAN </button> 
            </form>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
 
  @endsection

