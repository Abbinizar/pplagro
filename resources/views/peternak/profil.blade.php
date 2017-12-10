@extends('layouts.head')
@section('body')
<!-- Navigation-->

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('/')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Solusi</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-md-12">
        <i class="fa fa-newspaper-o"></i>Profil
      </div>
      <hr class="mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-footer small text-muted pull-right">Last Update {{Auth::user()->updated_at}}
          </div>
          <hr class="my-2">
          <div class="card-body">
            <form action="{{url('Mahasiswa/Update')}}" method="post" accept-charset="utf-8">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-2">
                  <label class="pull-right">Username</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="username" value="{{Auth::user()->username}}" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label class="pull-right">Nama</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label class="pull-right">Email</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label class="pull-right">Universitas</label>
                </div>
                <div class="col-md-4">
                  <select name="id_universitas" class="form-control">
                    @foreach($universitas as $row)
                    @if($row->id_universitas == Auth::user()->id_universitas)
                    <option value="{{$row->id_universitas}}" selected>{{$row->nama}}</option>
                    @else 
                    <option value="{{$row->id_universitas}}">{{$row->nama}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label class="pull-right">NIM</label>
                </div>
                <div class="col-md-4">
                  <input type="text" name="nim" class="form-control" value="{{Auth::user()->nim}}" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label class="pull-right">No Hp</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="no_hp" value="{{Auth::user()->no_hp}}" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label class="pull-right">Facebook</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="facebook" value="{{Auth::user()->facebook}}" placeholder="">
                </div>
              </div><div class="row">
                <div class="col-md-2">
                  <label class="pull-right">Twitter</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="twitter" value="{{Auth::user()->twitter}}" placeholder="">
                </div>
              </div><div class="row">
                <div class="col-md-2">
                  <label class="pull-right">Instagram</label>
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="instagram" value="{{Auth::user()->instagram}}" placeholder="">
                </div>
              </div><div class="row">
                <div class="col-md-2">
                  <label class="pull-right">Biografi</label>
                </div>
                <div class="col-md-4">
                  <textarea name="keterangan" rows="5" class="form-control">{{Auth::user()->keterangan}}</textarea>
                </div>
              </div>
              </div><div class="row">
                <div class="col-md-2">
                  <!-- <label class="pull-right">Simpan</label> -->
                </div>
                <div class="col-md-4">
                  <button type="submit" style="width: 325px; margin-left: 12px;" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>
  <!-- /Card Columns-->
</div>
<!-- Example DataTables Card-->
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
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
