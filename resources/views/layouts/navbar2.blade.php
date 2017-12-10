@extends('layouts.head2')
@section('content')
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
 
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
 
  <a href="{{url('logout')}}" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Logout"></a>
  <a href="{{url('/')}}" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="" class="w3-circle" style="height:25px;width:25px" alt="Beranda"></a>
  
</div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="{{url('/')}}" class="w3-bar-item w3-button w3-padding-large">Beranda</a>

  <a href="{{url(Auth::user()->status.'/Solusi')}}" class="w3-bar-item w3-button w3-padding-large">Pengajuan</a>
  <a href="{{url('investor/laporaninvestasi')}}" class="w3-bar-item w3-button w3-padding-large">Laporan Investasi</a>
  <a href="{{url(Auth::user()->status.'/Relawan')}}" class="w3-bar-item w3-button w3-padding-large">Relawan</a>
  <a href="{{url('/logout')}}" class="w3-bar-item w3-button w3-padding-large">Logout</a>
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
         <hr>
         @if(Auth::user()->status == 'peternak')
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i></p>
         @else 
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>{{Auth::user()->name}}</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>{{Auth::user()->created_at}}</p>
         @endif
       </div>
     </div>
     <br>

     <!-- Accordion -->
     <div class="w3-card w3-round">
      <div class="w3-white">
        <a href="{{url('investor/lihatpengajuan')}}"><button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Pengajuan</button></a>
       
        <a href="{{url('investor/laporaninvestasi')}}"><button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i>Pemantauan</button>
        </a>
        <!-- <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
           <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
       </div> -->
     </div>      
   </div>
   <br>

   <!-- Interests --> 
<!--    <div class="w3-card w3-round w3-white w3-hide-small">
    <div class="w3-container">
      <p>Interests</p>
      <p>
        <span class="w3-tag w3-small w3-theme-d5">News</span>
        <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
        <span class="w3-tag w3-small w3-theme-d3">Labels</span>
        <span class="w3-tag w3-small w3-theme-d2">Games</span>
        <span class="w3-tag w3-small w3-theme-d1">Friends</span>
        <span class="w3-tag w3-small w3-theme">Games</span>
        <span class="w3-tag w3-small w3-theme-l1">Friends</span>
        <span class="w3-tag w3-small w3-theme-l2">Food</span>
        <span class="w3-tag w3-small w3-theme-l3">Design</span>
        <span class="w3-tag w3-small w3-theme-l4">Art</span>
        <span class="w3-tag w3-small w3-theme-l5">Photos</span>
      </p>
    </div>
  </div> -->
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
  <!-- <div class="w3-card w3-round w3-white w3-center">
    <div class="w3-container">
      <p>Upcoming Events:</p>
      <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
      <p><strong>Holiday</strong></p>
      <p>Friday 15:00</p>
      <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
    </div>
  </div>
  <br> -->
  <?php $i = 1; ?>

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