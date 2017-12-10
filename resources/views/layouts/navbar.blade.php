<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.html"><img style="width: 130px;position: absolute;top: 10px;left: 60px;" src="{{url('img/logo-horizontal.png')}}"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{url('/')}}">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Beranda</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{url(Auth::user()->status.'/Profil')}}">
          <i class="fa fa-fw fa-user"></i>
          <span class="nav-link-text">Profil</span>
        </a>
      </li>
      @if(Auth::user()->status == 'Mahasiswa')
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{url(Auth::user()->status.'/Ide')}}">
          <i class="fa fa-fw fa-wrench"></i>
          <span class="nav-link-text">IDE & Karya</span>
        </a>
      </li>
      @endif
     
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      
    </ul>
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" href="{{url('logout')}}">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>