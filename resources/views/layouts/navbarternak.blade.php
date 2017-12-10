@extends('layouts.head2')
@section('content')
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <img style="width: 130px;position: absolute;top: 5px;left: 93px;" src="{{url('img/logo-horizontal.png')}}">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>

  <a href="{{url('logout')}}" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Logout"></a>
  <a href="{{url('/')}}" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Beranda"></a>
  
</div>
</div>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
        <a href="{{url('peternak/ubahprofil')}}/{{Auth::user()->id}}"> <h4 class="w3-center">{{Auth::user()->name}}</h4> </a>
         
         <p class="w3-center"><img src="{{url('/img/avatar/avatar'.Auth::user()->id.'.jpg')}}" class="w3-circle" style="height:106px;width:106px" alt="avatar"></p>
         <form action="{{url('user/avatar/upload')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
           <input type="file" name="file" id="file" class="w3-half" style="width: 57px;height: 25px;padding-top: 0px;padding-left: 0px;">
           <button type="submit" class="w3-button w3-blue w3-half w3-card pull-right" style="width: 57px;height: 25px;padding-top: 0px;padding-left: 0px;">Simpan</button>
         </form>
         <br>
       
         <br>
         <hr>
 
       
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>{{Auth::user()->name}}</p>
         
       
       </div>
     </div>
     <br>

     <!-- Accordion -->
     <div class="w3-card w3-round">
      <div class="w3-white">
        <a href="{{url('peternak/tambahternak')}}"><button  class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Ternak</button></a>
        <a href="{{url('peternak/lihatpengajuan')}}"><button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>Pengajuan</button></a>
        <a href="{{url('peternak/laporaninvestasi')}}"><button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>Pemantauan</button>
        </a>
         <a href="{{url('peternak/penjualan')}}"><button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>Penjualan</button></a>
     </div>      
   </div>
   <br>

  
  <br>

  <!-- Alert Box -->
  <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
    <!-- <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
      <i class="fa fa-remove"></i>
    </span> -->
    <p><strong>Tentang Saya</strong></p>
    <p>{{Auth::user()->keterangan}}</p>
  </div>

  <!-- End Left Column -->
</div>
@yield('middle')

<!-- Right Column -->
<div class="w3-col m2">
 
  <?php $i = 1; ?>
  
  <div class="w3-card w3-round w3-white w3-center">
    <div class="w3-container">
      <p>{{$i++}}</p>
      <img src="" alt="Avatar" class="w3-circle" style="width:50%"><br>
      <span></span>
      <div class="w3-row w3-opacity">
        <div class="w3-third">
          <button class="w3-button w3-block w3-green w3-section" title="Accept"></button>
        </div>
        <div class="w3-third">
          <button class="w3-button w3-block w3-red w3-section" title="Decline"></button>
        </div>
        <div class="w3-third">
          <button class="w3-button w3-block w3-red w3-section" title="Decline"></button>
        </div>
      </div>
    </div>
  </div>
  <br>
 

  <!-- <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
    <p>ADS</p>
  </div>
  <br>

  <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
    <p><i class="fa fa-bug w3-xxlarge"></i></p>
  </div> -->

  <!-- End Right Column -->
</div>

<!-- End Grid -->
</div>


<!-- End Page Container -->
</div>
<br>

@endsection