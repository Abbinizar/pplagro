<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>KaryaMuda-Form Mahasiswa</title>
	<link rel="stylesheet" href="{{url('css/style_isi.css')}}">

	<meta name="viewport" content="width=device-width, initial-scale=10">
	<link href='logo.png' style="width: 32px;height: 32px;" rel='shortcut icon'>
</head>
<body>
	<div id="fmatas"></div>
	<div id="fmisi">
		<div id="fmisi_atas">
			<center><h2>Daftar Akun</h2></center>
			<div class="fmform" >
				<form method="POST" action="{{url('register')}}">
					{{ csrf_field() }}
					<font style="margin-left: 10px;">Nama :</font><br>
					<input type="text" name="name" value="">
					<font style="margin-left: 10px;">Email :</font><br>
					<input type="text" name="email">
					<font style="margin-left: 10px;">Username :</font><br>
					<input type="text" name="username">
					<font style="margin-left: 10px;">Password :</font><br>
					<input type="text" name="password">
					<font style="margin-left: 10px;">Konfirmasi Password :</font><br>
					<input type="text" name="konfirmasi_password">
					<font style="margin-left: 10px;">NIM :</font><br>
					<input type="text" name="nim">
					<font style="margin-left: 10px;">Tanggal lahir :</font><br>
					<input type="date" name="tgl_lahir">
					<font style="margin-left: 10px;">Jenis Kelamin :</font><br>
					<select id="jenkel" name="jenis_kelamin">
						<option value="">-</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>

					<font style="margin-left: 10px;">Asal Universitas :</font><br>
					<select id="Universitas" name="id_universitas">
						@foreach($universitas as $row)
						<option value="{{$row->id_universitas}}">{{$row->nama}}</option>
						option
						@endforeach
					</select>
					<font style="margin-left: 10px;">ID Komunitas :</font><br>
					<select id="Universitas" name="id_komunitas">
						@foreach($komunitas as $row)
						<option value="{{$row->id_komunitas}}">{{$row->nama}}</option>}
						option
						@endforeach
					</select>
					<input type="submit" name="submit" value="submit">
					<button type="button">Batal</button>
				</form> 
			</div>
		</div>
	</div>
	


</body>
</html> 