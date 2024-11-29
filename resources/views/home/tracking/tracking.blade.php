<link rel="shortcut icon" href="{{ asset('assets/images/jabar.png') }}">
@extends('home.partials.public')
<nav class="navbar bg-info">
  <div class="container-fluid">
    <marquee>
      <img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 50px; width: 150px; margin-left: 35px;">Selamat datang di website IT Solution Dinas Komunikasi & Informatika Provinsi Jawa Barat <img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 50px; width: 150px; margin-left: 0px;">
    </marquee>
  </div>
</nav>
@section('container')
<br>
<div class="row">
<div class="card mx-auto my-auto">
  <div class="card-body p-4">
      <h5 style="text-align:center; font-family:fantasy;">Masukan Tiket Anda Disini</h3>
      <div class="row height d-flex justify-content-center align-items-center">
        <form action="/tracking" method="POST">
          @csrf
          <div class="col-md-15">
              <div class="input-group">
                  <input type="search" class="form-control rounded m-1" placeholder="Input Ticket" aria-label="Search" name="BookingCode" value="{{old('BookingCode')}}"/>
                  <button type="submit" class="btn btn-outline-primary m-1">SEARCH</button>
                  <a href="/tracking" type="button" class="btn btn-outline-danger m-1">RESET</a>
              </div>   
          </div>
        </form>
      </div>
  </div>
  </div>
  </div>
  <br>
  <br>
@if($booking != null)
<div class="card mb-4">
    <div class="card-body">
    <div class="{{$alertColor}}" role="alert">
      <b>Status : {{$booking->BookingStatus}}</b>
    </div>
    <h5 class="card-description">Data Peminjam</h5>
      <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nomor Tiket</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="disabledTextinput" name="tiket" value="{{$booking->BookingCode}}" readonly/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Peminjam</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  id="namaPeminjam" name="namaPeminjam" value="{{$booking->employee->EmployeeName}}" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="bidang" name="bidang" value="{{$booking->employee->position->MasterPositionName}}"  readonly/>
                </div>
              </div>
            </div>
            <br>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">No Telepon</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="noTelp" name="noTelp" value="{{$booking->employee->EmployeePhone}}" readonly/>
                </div>
              </div>
            </div>
          </div>
          <h5 class="card-description">Aset yang dipinjam</h5>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Aset</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="aset" name="aset" value="{{$booking->aset->MasterAsetName}}" readonly/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kode Unit</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="kodeUnit" name="kodeUnit" value="{{$booking->employee->position->MasterPositionCode}}" readonly />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Mulai</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="mulai" name="mulai" value="{{$booking->BookingStart}}" readonly/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Selesai</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="selesai" name="selesai" value="{{$booking->BookingEnd}}" readonly/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Digunakan Untuk</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{$booking->BookingUsed}}" readonly/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Catatan</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="perihal" name="perihal" rows="4"readonly>{{$booking->BookingRemark}}</textarea>
                </div>
              </div>
            </div> 
            @if($booking->BookingStatus == 'Ditolak')
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alasan Ditolak</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="perihal" name="perihal" rows="4"readonly>{{$booking->BookingReasonReject}}</textarea>
                </div>
              </div>
            </div> 
            @endif
          </div>  
      </div>
  </div>
@endif
@endsection