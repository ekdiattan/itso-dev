<link rel="icon" href="{{ asset('assets/images/jabar.png') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
@extends('home.partials.public')
<nav class="navbar bg-info">
  <div class="container-fluid">
  <marquee><img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 50px; width: 150px; margin-left: 35px;">Selamat datang di website IT Solution Dinas Komunikasi & Informatika Provinsi Jawa Barat <img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 50px; width: 150px; margin-left: 0px;"></marquee>
  </div>
</nav>
<br>
<br>
@section('container')
<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <form id="formPermohonan" action="/permohonan-store" method="post" enctype="multipart/form-data">
          @csrf
          <h4 class="card-description">Permohonan Peminjaman Aset</h4><br>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Pemohon</label>
                <div class="col-sm-9">
                  <select class="form-control selectpicker" id="namaPemohon" name="BookingEmployeeId" data-live-search="true" onchange="setBidang();">
                    @foreach($employee as $employee)
                      <option value="{{ $employee->EmployeeId }}">{{$employee->EmployeeName}} - {{$employee->position->unit->MasterUnitName}} - {{ $employee->position->MasterPositionName}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="jenisAset">Jenis Aset</label>
                <div class="col-sm-9">
                  <select class="form-control selectpicker" id="namaPemohon" name="BookingAsetId">
                    @foreach($asset as $asset)
                      <option value="{{ $asset->MasterAsetId}}">{{$asset->MasterAsetName}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div id="period">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Mulai Pinjam</label>
                  <div class="col-sm-9">
                    <input type="datetime-local" placeholder="dd-mm-yyyy" class="form-control" id="mulai" name="BookingStart" onChange="check()" value="" required/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Selesai Pinjam</label>
                  <div class="col-sm-9">
                    <input type="datetime-local" class="form-control" id="selesai" name="BookingEnd" onChange="check()" value="" required/>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="keperluan">Keperluan</label>
                  <div class="col-sm-9">
                    <input type="radio" name="BookingUsed" id="dinas" value="1" checked>
                    Dinas
                    <input type="radio" name="BookingUsed" id="pribadi" value="2">
                    Pribadi
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Perihal</label>
                  <div class="col-sm-9">
                    <textarea id="textbox" class="form-control" maxlength="255" name="BookingRemark" rows="5" required></textarea>
                    <span id="char_count"></span>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn btn-danger" href="/bookings" role="button">Kembali</a>
            <button type="submit" class="btn btn-primary mr-2" id="btnSubmit" onclick="hideButton()">Submit</button> 
            <button class="btn btn-primary" type="button" id="btn2" style="display:none;">
              <span class="spinner-grow spinner-grow-sm text-danger" role="status" aria-hidden="true"></span>
              <span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span>
              <span class="spinner-grow spinner-grow-sm text-success" role="status" aria-hidden="true"></span>
            </button>
          </div>
        </form>
        </div>
      </div>
    </div>
@include('home.general.alert')
@endsection
    
