  @section('content')
   @yield('memilih')
  <div class="w3-row">
    <div class="w3-container">
      <a href="" id="btn_miliksendiri" class="w3-card w3-button w3-half w3-yellow w3-hover-grey" title="My Account"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Milik Sendiri"></a>
      <a href="#" id="btn_semua" onclick="go('semua');" class="w3-card w3-button w3-half  w3-light-blue w3-hover-blue" title="My Account"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Semua Peternak"></a>
      
    </div>
  </div>
  @endsection