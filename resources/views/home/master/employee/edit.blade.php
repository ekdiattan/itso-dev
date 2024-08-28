@extends('home.partials.main')
@section('container')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <form action="/employee/update/{{ $employee->EmployeeId }}" method="post">
        @csrf
        <p class="card-description">Edit Data Pegawai </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Pegawai</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="kodeBarang" name="EmployeeName" value="{{$employee->EmployeeName}}" maxlength="255" required/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat Pegawai</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="jenisAset" name="EmployeeAddress" value="{{$employee->EmployeeAddress}}" maxlength="255" required/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jabatan</label>
              <div class="col-sm-9">
                <select class="form-control" aria-label="Default select example" id="position_id" name="EmployeePositionId" required>
                  @foreach ($position as $positions)    
                    <option value="{{$positions->MasterPositionId}}">{{$positions->MasterPositionName}}</option>
                  @endforeach
                </select>       
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nomor Pegawai</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="umurEkonomis" name="EmployeeNumber" value="{{$employee->EmployeeNumber}}" maxlength="255" required/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="umurEkonomis" name="EmployeeEmail" value="{{$employee->EmployeeEmail}}" maxlength="255" required/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nomor HP</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="umurEkonomis" name="EmployeePhone" value="{{$employee->EmployeePhone}}" maxlength="255" required/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <select class="form-control" aria-label="Default select example" id="position_id" name="EmployeeGender" required>
                  <option value="1">Laki - Laki</option>
                  <option value="2">Perempuan</option>
                </select>              
              </div>
            </div>
          </div>
        </div>
          <div class="box">
            <div class="box-header with-border">
              <button type="submit" class="btn btn-primary mr-2 btn-flat">Submit</button>
                <a href="/employee" class="btn btn-danger mr-2 btn-flat"><i class="fa fa-file-excel-o"></i> Kembali</a>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection