@extends('home.partials.main')
<link rel="icon" href="{{ asset('assets/images/jabar.png') }}">
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Peminjaman Aset</h2>
</div>

<!-- double navbar -->
<div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
    <!-- Container wrapper -->
    <div class="container justify-content-center justify-content-md-between">
      <!-- Left links -->
      <ul class="navbar-nav flex-row">
        <li class="nav-item me-auto">
          <a class="nav-link" href="/booking" style="color:rgb(250, 162, 0);font-size:20px;" role="button" data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1"
            class="btn shadow-0 p-0 me-auto" aria-controls="#sidenav-1" aria-haspopup="true">
            Menunggu
          </a>
        </li>
        <li class="nav-item me-auto">
          <a class="nav-link" href="/booking-acc" style="color:green;font-size:20px;" role="button" data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1"
            class="btn shadow-0 p-0 me-auto" aria-controls="#sidenav-1" aria-haspopup="true">
            Sedang Dipinjam
          </a>
        </li>
        <li class="nav-item me-auto">
          <a class="nav-link" href="/booking-reject" style="color:rgb(255, 0, 0);font-size:20px;" role="button" data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1"
            class="btn shadow-0 p-0 me-auto" aria-controls="#sidenav-1" aria-haspopup="true">
            Ditolak
          </a>
        </li>
        <li class="nav-item me-auto">
          <a class="nav-link" href="/booking-done" style="color:rgb(22, 20, 134);font-size:20px;" role="button" data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1"
            class="btn shadow-0 p-0 me-auto" aria-controls="#sidenav-1" aria-haspopup="true">
            Selesai
          </a>
        </li>
      </ul>
    </div>
</div>
<br>
<div class="col-lg-12 grid-margin stretch-card">
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><b>Selesai</b></h4>
                <div class="table-responsive">
                 <nav class="navbar bg-body-tertiary">
                 </nav>
                 <table id="dataTable" class="table table-hover table-bordered table-striped">
                    <thead class="bg-gray disabled color-palette">
                        <tr>
                            <th>No</th>
                            <th>Tiket</th>
                            <th>Nama Aset</th>
                            <th>Nama Pemohon</th>
                            <th>Tanggal Pinjam</th>
                            <th>Selesai Pinjam</th>
                            <th>Catatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($done != null)
                        @foreach ($done as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->BookingCode}}</td>
                                <td>{{ $post->aset->MasterAsetName}}</td>
                                <td>{{ $post->user->employee->EmployeeName}}</td>
                                <td>{{ $post->BookingStart}}</td>
                                <td>{{ $post->BookingEnd}}</td>
                                <td>{{ $post->BookingRemark }}</td>
                                <td>{{ $post->BookingStatus }}</td>
                                <td>
                                    <a href="/booking/{{$post->BookingId}}" class="badge bg-info"><span class="menu-icon"><i class="far fa-eye"></i></span></a>
                                    <a href="/booking-edit/{{$post->BookingId}}" class="badge bg-warning"><span class="menu-icon"><i class="far fa-edit"></i></span></a>
                                    <form action="/booking/delete/{{$post->BookingId}}" method="get" class="d-inline">
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Are you sure?')"><span class="menu-icon"><i
                                                    class="fas fa-trash"></i></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
