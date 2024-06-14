@extends('home.partials.public')
<link rel="shortcut icon" href="{{ asset('assets/images/jabar.png') }}">
<nav class="navbar bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    </a>
  <marquee><img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 50px; width: 150px; margin-left: 35px;">Selamat datang di website IT Solution Dinas Komunikasi & Informatika Provinsi Jawa Barat <img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 50px; width: 150px; margin-left: 0px;"></marquee>
  </div>
</nav>

<div class="col-lg-12 grid-margin stretch-card px-3 py-3">
  @section('container')
  @if(session('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><b>Detail Permohonan</b></h4>
      <p class="card-text bg-warning">Mohon untuk menyimpan No. Tiket, karena dapat digunakan untuk melakukan pengecekan status peminjaman</p>
      <table class="table table-borderless table-light">
        <thead class="disabled">
          <tr>
            <td>No. Tiket</td>
            <td>{{ $booking->BookingCode }}</td>
          </tr>
          <tr>
            <td>Pemohon</td>
            <td>{{ $booking->employee->EmployeeName }}</td>
          </tr>
          <tr>
            <td>No. Telepon</td>
            <td>{{ $booking->employee->EmployeePhone }}</td>
          </tr>
          <tr>
            <td>Bidang</td>
            <td>{{ $booking->employee->position->unit->MasterUnitName }}</td>
          </tr>
          <tr>
            <td>Mulai</td>
            <td>{{ $booking->BookingStart }}</td>
          </tr>
          <tr>
            <td>Selesai</td>
            <td>{{ $booking->BookingEnd }}</td>
          </tr>
          <tr>
            <td>Perihal</td>
            <td>{{ $booking->BookingRemark }}</td>
          </tr>
          <tr>
            <td>Status Peminjaman</td>
            <td>{{ $booking->BookingStatus }}</td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <a class="btn btn-danger" href="/public" role="button">Kembali</a>
  <a class="btn btn-success" href="/tracking/{{ $booking->BookingCode }}" role="button" target="_blank" value="{{$booking->BookingCode}}">Ke Tracking</a>

</div>
@endsection
