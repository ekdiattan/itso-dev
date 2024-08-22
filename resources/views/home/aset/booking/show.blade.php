<link rel="icon" href="{{ asset('assets/images/jabar.png') }}">
@extends('home.partials.main')
@section('container')
<ol class="breadcrumb">
    <li class="breadcrumb-item active" style="color:black;"><h2>Detail Data Peminjaman<h2></li>
  </ol>
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <form action="/permohonan-store" method="post" enctype="multipart/form-data">
        @csrf
        <p class="card-description">Permohonan Peminjaman Aset</p>
        <div class="row">
          <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tiket</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="tiket" name="tiket" value="{{ $booking->BookingCode }}" readonly/>
                </div>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Pemohon</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="namaPemohon" name="namaPemohon" value="{{ $booking->employee->EmployeeName }}" readonly/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Telepon</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="noTelp" name="noTelp" value="{{ $booking->employee->EmployeePhone }}" readonly/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Bidang</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="bidang" name="bidang" value="{{ $booking->employee->position->MasterPositionName }}" readonly/>
              </div>
            </div>
          </div>
        </div><br>
        <p class="card-description">Aset yang diajukan</p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Aset</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="namaAset" name="namaAset" value="{{ $booking->aset->MasterAsetName }}" readonly/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Mulai Pinjam</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="mulai" name="mulai" value="{{ $booking->BookingStart }}"readonly/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Selesai Pinjam</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="selesai" name="selesai" value="{{ $booking->BookingEnd }}" readonly/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggal Permohonan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="tanggalPermohonan" name="tanggalPermohonan" value="{{ $booking->BookingCreatedAt }}" readonly/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status Peminjaman</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="status" name="status" value="{{ $booking->BookingStatus }}" readonly/>
            </div>
          </div>
        </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Perihal</label>
              <div class="col-sm-9">
              <textarea class="form-control" id="perihal" name="perihal" rows="4" value="{{ $booking->BookingRemark }}" readonly>{{ $booking->BookingRemark }}</textarea>
              </div>
            </div>
          </div>
        </div>
      </form>
      <a class="btn btn-danger" href="/booking" role="button">Kembali</a>
    </div>
  </div>
</div>
@endsection
