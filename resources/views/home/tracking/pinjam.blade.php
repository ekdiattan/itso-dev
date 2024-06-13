@extends('home.partials.public')
<link rel="shortcut icon" href="{{ asset('assets/images/jabar.png') }}">
<nav class="navbar bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <!-- <img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 50px; width: 150px; margin-left: 25px;"> -->
  </a>
  <marquee><img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 50px; width: 150px; margin-left: 35px;">Selamat datang di website IT Solution Dinas Komunikasi & Informatika Provinsi Jawa Barat <img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 50px; width: 150px; margin-left: 0px;"></marquee>
  </div>
</nav>
@section('container')
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
	</head>
	<body><br>
		<div class="row">
			<div class="col-md-4 grid-margin stretch-card">
				<div class="row">
						<div class="card mx-auto" style="width:350px;height: 220px;" id="box1" >
						<div class="card-body">
							<h5 class="card-body text-center">Permohonan Peminjaman Aset</h5>
							</div>
							<a href="/peminjaman" class="btn btn-danger">Ajukan Peminjaman</a>
						</div>
						</div>
						<div class="row">
						<div class="card mx-auto" style="width:350px;height: 250px;" id="box1">
							<div class="card-body">
							<h5 class="card-body text-center">Cek Status Peminjaman Anda Disini</h5>
						</div>
						<a href="/tracking" class="btn btn-primary">Cek Status</a>
						</div>
					</div>
				</div>
		</div>
	</body>
</html>
@endsection