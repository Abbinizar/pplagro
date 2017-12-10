<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>ternakin</title>
    <script src="{{url('/jquery-3.2.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/style_isi.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('bootstrap/css/bootstrap.css')}}">
    <script src="{{url('bootstrap/js/bootstrap.js')}}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=10">
    <link href='logo.png' style="width: 32px;height: 32px;" rel='shortcut icon'>
</head>
<body>
    <div id="fmatas"></div>
    <div id="fmisi">
        <div id="fmisi_atas">
            <center><h2>Daftar Akun</h2></center>
            <div class="fmform" >
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" style="width: 420px; margin-left: 0px;margin-top: 20px;" type="text" class="form-control" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" style="margin-top: 20px;" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" style="margin-top: 20px;" class="form-control" name="password">

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" style="margin-top: 20px;" class="form-control" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 control-label">Status</label>

                        <div class="col-md-6">
                            <select name="status" id="status" onclick="setData();" style="margin-top: 20px;" class="form-control">
                                <option value="Peternak">Peternak</option>
                                <option value="Investor">Investor</option>
                            </select>

                            @if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                     <div class="form-group{{ $errors->has('nohp') ? ' has-error' : '' }}">
                        <label for="nohp" class="col-md-4 control-label">No HP</label>

                        <div class="col-md-6">
                            <input id="nohp" style="width: 420px; margin-left: 0px;margin-top: 20px;" type="text" class="form-control" name="nohp" value="{{ old('nohp') }}">

                            @if ($errors->has('nohp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nohp') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            setData();
        })
        function setData(){
            var a = $('#status').val();
            if (a == 'Mahasiswa') {
                $('#komunitas').show();
                $('#universitas').show();
                $('#kota').hide();
            }else{
                $('#komunitas').hide();
                $('#universitas').hide();
                $('#kota').show();
            }
        }
    </script>


</body>
</html> 