@extends('layouts.head')
@section('body')
<!-- Navigation-->

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">IDE & Karya</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-10">
        <div class="col-lg-12">
          <!-- Example Bar Chart Card-->
          <!-- Card Columns Example Social Feed-->
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post" accept-charset="utf-8">
                {{csrf_field()}}
                <input type="radio" name="kategori" value="Pendidikan" placeholder="Pendidikan">Pendidikan 
                <input type="radio" name="kategori" value="Pariwisata" placeholder="Pariwisata">Pariwisata
                <input type="radio" name="kategori" value="Sosial" placeholder="Sosial">Sosial
                <textarea name="ide" class="form-control"></textarea>
                <button type="submit" class="btn bto-success">Submit</button>
              </form>
            </div>
          </div>
          <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> Ide & Karya</div>
            <hr class="mt-2">
            <div class="card-columns">
              @foreach($data as $row)
              <div class="card mb-3">
              <!-- <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185" alt="">
              </a> -->
              <div class="card-body">
                <h6 class="pull-right"><a href="#" style="font-size: 10px;">{{$row->kategori}}</a></h6>
                <h6 class="card-title mb-1"><a href="#">{{$row->user->name}}</a></h6>
                <p class="card-text small">{{$row->ide}}
                </p>
              </div>
              <hr class="my-0">
              <div class="card-footer small text-muted">Posted {{$row->tanggal}}
                <!-- <a href="{{url(Auth::user()->status.'/Solusi/Tambah/')}}/{{$row->id_berita}}" class="btn btn-primary pull-right">Beri Solusi</a> -->
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-md-2">
        
      </div>
    </div>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    @endsection
