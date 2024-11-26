@extends('home.partials.main')
<link rel="icon" href="{{ asset('assets/images/jabar.png') }}">
@section('container')
<form action="/booking/update/{{ $edit->BookingId }}" method="post" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body"> 
            <br>
            <div class="form-group">
                <label for="exampleInputUsername1">No Tiket</label>
                <input type="text" class="form-control" id="tiket" name="tiket"  maxlength="255" value="{{$edit->BookingCode}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Nama Pemohon</label>
                <input type="text" class="form-control" id="namaPemohon" name="namaPemohon"  maxlength="255" value="{{$edit->employee->EmployeeName}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">No Telepon</label>
                <input type="text" class="form-control" id="noTelp"  name="noTelp" maxlength="255" value="{{$edit->employee->EmployeePhone}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Bidang</label>
                <input type="text" class="form-control" id="bidang" name="bidang"  maxlength="255" value="{{$edit->employee->position->MasterPositionName}} - ({{$edit->employee->position->MasterPositionCode}})" readonly>
            </div>
        </div>
    </div>
    <div class="card">
        <input type="submit" class="btn btn-primary" id="button1" onclick="hideButton()">
        <button class="btn btn-primary" type="button" id="button2" style="display:none;">
              <span class="spinner-grow spinner-grow-sm text-danger" role="status" aria-hidden="true"></span>
              <span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span>
              <span class="spinner-grow spinner-grow-sm text-success" role="status" aria-hidden="true"></span>
        </button>
    </div>
</div>
<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputUsername1">Mulai</label>
                <input type="text" class="form-control" id="mulai" name="BookingStart" value="{{$edit->BookingStart}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Selesai</label>
                <input type="text" class="form-control" id="selesai" name="BookingEnd" value="{{$edit->BookingEnd}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="BookingRemark" value="{{$edit->BookingRemark}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Tanggal Permohonan</label>
                <input type="text" class="form-control" id="tanggalPermohonan" name="BookingCreatedAt" value="{{$edit->BookingCreatedAt}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Status</label>
                <select class="form-control" id="status" name="BookingStatus" required>
                    @if (!empty($status))
                        @foreach ($status as $key => $statuss)
                            <option value="{{ $key }}">{{ $statuss }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            
            <div class="form-group" id="reason-container" style="display: none;">
                <label for="reason">Alasan Penolakan</label>
                <textarea class="form-control" id="reason" name="BookingReasonReject" rows="3" required></textarea>
            </div>
        </div>
      </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const statusDropdown = document.getElementById('status');
        const reasonContainer = document.getElementById('reason-container');
        const reasonField = document.getElementById('reason');

        statusDropdown.addEventListener('change', function () {
            if (this.value === '2') {
                reasonContainer.style.display = 'block';
                reasonField.setAttribute('required', 'required');
            } else {
                reasonContainer.style.display = 'none';
                reasonField.removeAttribute('required');
                reasonField.value = '';
            }
        });
    });
</script>


@endsection