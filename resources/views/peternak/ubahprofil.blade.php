@if(Auth::user()->status == 'Admin')
 @extends('layouts.navbaradmin')
@elseif(Auth::user()->status == 'Investor')
@extends('layouts.navbar2')
@else
  @extends('layouts.navbarternak')
  @endif
  @section('middle')
  <!-- Middle Column -->
  <div class="w3-col m7">

    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
          <div class="w3-container w3-padding">
            <form action="{{url('ubahprofil')}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}}
              <h6 class="w3-opacity">PROFIL ANDA</h6>
              <hr class="w3-clear">
              <label for="harga"  style="width: 100px;">Nama : </label>
              <input type="text" name="name" id="name" value="{{Auth::user()->name}}" class="w3-rest w3-border">

              <br>
              @if ($errors->has('name')) <p style="color: red">{{ $errors->first('name') }}</p> @endif
              <label for="email"  style="width: 100px;">Email: </label>
              <input type="email" name="email" value="{{Auth::user()->email}}" id="email" class="w3-rest w3-border">
              <br>
              @if ($errors->has('email')) <p style="color: red">{{ $errors->first('email') }}</p> @endif

             
              
              <label for="nohp"  style="width: 100px;">NO HP </label>
              <input type="text" name="nohp" id="nohp" value="{{Auth::user()->nohp}}" class="w3-rest w3-border">

              <br>
               @if ($errors->has('nohp')) <p style="color: red">{{ $errors->first('nohp') }}</p> @endif
              <br>
              <hr class="w3-clear">
              <button type="submit" class="w3-button w3-theme w3-col"><i class="fa fa-pencil"></i>SIMPAN PROFIL </button> 
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

