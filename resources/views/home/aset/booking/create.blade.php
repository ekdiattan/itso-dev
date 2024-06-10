@extends('home.partials.main')
<link rel="icon" href="{{ asset('assets/images/jabar.png') }}">
@section('container')
@if(session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="row">
  <div class="col-lg-6">
    <div class="card mb-4">
      <div class="card-body">
      <form id="formBooking" action="/booking-store" method="post" enctype="multipart/form-data">
        @csrf
        <h5>Data Pemohon</h5>
        <label class="col-sm-3 col-form-label">Nama Pemohon</label>
        <select class="form-control selectpicker" id="namaPemohon" name="namaPemohon" data-live-search="true" onchange="setBidang();" required autofocus>
          {{-- @foreach($pegawais as $pegawai)
            <option data-tokens="{{ $pegawai->nama }}" value="{{ $pegawai->nama }}" @if($before != null){{ $before['namaPemohon']== $pegawai->nama ? 'selected' : '' }}@endif>{{ $pegawai->nama }}</option>
          @endforeach --}}
        </select>
        <label class="col-sm-3 col-form-label">Nip</label>
        <input type="text" class="form-control" name="nip" id="nip" maxlength="255" autocomplete="off" value="" size="30" readonly>
        <label class="col-sm-3 col-form-label">Nomor Telepon</label>
        <input type="text" class="form-control" name="noTelp" id="noTelp" maxlength="255" autocomplete="off" value="" size="30">
        <label class="col-sm-3 col-form-label">Nama Bidang</label>
        <select class="form-control" id="bidang" name="bidang">
          <option value="">--PILIH--</option>
          {{-- @foreach ($bidang as $bidang)
          <option value="{{ $bidang->namabidang }}" value="@if($before != null) {{ $before['bidang'] == $bidang->namaBidang ? 'selected' : '' }}  selected @endif">{{ $bidang->namabidang }}</option>
          @endforeach --}}
        </select> 
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card mb-4">
      <div class="card-body">
      <h5>Data Peminjaman</h5>
      <label class="col-sm-3 col-form-label" for="jenisAset">Jenis Aset</label>
      <div class="col-sm-9">
        {{-- <input type="radio" name="jenisAset" id="ruangan" value="Ruangan" onClick="check(); showPeriodForm();" required>
        Ruangan
        <input type="radio" name="jenisAset" id="kendaraan" value="Kendaraan" onClick="check(); showPeriodForm();">
        Kendaraan
        <input type="radio" name="jenisAset" id="barang" value="Barang" onClick="check(); showPeriodForm();">
        Barang lainnya --}}
      </div>
      <div id="period" hidden>
        <label class="col-sm-3 col-form-label">Mulai</label>
        <input type="datetime-local" class="form-control" name="mulai" id="mulai"  maxlength="255" autocomplete="off"  size="30" onChange="check()" value="" required>
        <label class="col-sm-3 col-form-label">Selesai</label>
        <input type="datetime-local" class="form-control" name="selesai" id="selesai"  maxlength="255" autocomplete="off"  size="30" onChange="check()" value="" required>
      </div>
      <div id="otherForm">
        <label class="col-sm-3 col-form-label" for="keperluan">Keperluan</label>
        <div class="col-sm-9">
          <input type="radio" name="keperluan" id="dinas" value="Dinas" checked>
          Dinas
          <input type="radio" name="keperluan" id="pribadi" value="Pribadi">
          Pribadi
        </div>
        <label class="col-sm-3 col-form-label">Nama Aset</label>
        <select class="form-control" id="aset" name="aset" required>
            <option value="">--PILIH--</option>
            {{-- @foreach ($aset as $aset)
            <option value="{{ $aset->id }}" @if($before != null){{ $before['aset'] == $aset->id ? 'selected' : '' }} selected @endif>{{ $aset->merk }} {{ $aset->nama }} ({{ $aset->kodeUnit }})</option>
            @endforeach --}}
        </select>
        <label class="col-sm-3 col-form-label">Perihal</label>
        <textarea id="textbox" class="form-control" maxlength="255" name="perihal" rows="5"></textarea>
        <span id="char_count"></span>
        <div class="card-body">
          <a class="btn btn-danger" href="/booking" role="button">Kembali</a>
          <button type="submit" class="btn btn-primary mr-2" style="margin-left:10px;" id="submitkejs">Submit</button>
        </div>
      </div>
      <!--  -->
    </div>
  </div>
</div>

@endsection
