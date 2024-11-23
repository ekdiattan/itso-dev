@extends('home.partials.main')
<link rel="icon" href="{{ asset('assets/images/jabar.png') }}">
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Peminjaman Aset</h2>
</div>
@include('home.aset.booking.sidebarbooking')
<div class="col-lg-12 grid-margin stretch-card">
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><b>Ditolak</b></h4>
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
                            </tr>
                        </thead>
                        <tbody>
                            @if($ditolak != null)
                            @foreach ($ditolak as $post)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $post->BookingCode}}</td>
                                  <td>{{ $post->aset->MasterAsetName}}</td>
                                  <td>{{ $post->employee->EmployeeName}}</td>
                                  <td>{{ $post->BookingStart}}</td>
                                  <td>{{ $post->BookingEnd}}</td>
                                  <td>{{ $post->BookingRemark }}</td>
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
