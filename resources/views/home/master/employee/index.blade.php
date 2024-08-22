@extends('home.partials.main')
@section('container')
@if(session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-md-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambahkan Pegawai</h4>
          <form action="/employee/create" method="post" >
            @csrf
            <br>
            <div class="form-group">
              <label for="exampleInputUsername1">Nama Pegawai</label>
              <input type="text" class="form-control" id="EmployeeAddress" name="EmployeeName" maxlength="255" required>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Alamat Pegawai</label>
              <input type="text" class="form-control" id="EmployeeAddress" name="EmployeeAddress" maxlength="255" required>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Nomor Telepon Pegawai</label>
              <input type="number" class="form-control" id="EmployeePhone" name="EmployeePhone" maxlength="255" required>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Jenis Kelamin</label>
              <select class="form-control" aria-label="Default select example" id="position_id" name="EmployeeGender" required>
                <option value="1">Laki - Laki</option>
                <option value="2">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Jabatan</label>
              <select class="form-control" aria-label="Default select example" id="position_id" name="EmployeePositionId" required>
                @foreach ($position as $position)
                  <option value="{{ $position->MasterPositionId }}">{{ $position->MasterPositionName }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Bidang</label>
              <select class="form-control" aria-label="Default select example" id="position_id" name="EmployeePositionId" required>
                @foreach ($unit as $unit)
                  <option value="{{ $unit->MasterUnitId }}">{{ $unit->MasterUnitName }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
      <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title mb-1"><b>Daftar Pegawai</b></h4>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="preview-list">
                <div id="dataTable_wrapper" class="table-responsive">
                    <table id="dataTable" class="table table-hover table-bordered table-striped">
                      <thead  class="bg-gray disabled color-palette">
                        <tr>
                          <th>No</th>
                          <th>Nama Pegawai</th>
                          <th>Nomor Pegawai</th>
                          <th>Nomor Hp Pegawai</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($employee as $key )  
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $key->EmployeeName }}</td>
                            <td>{{ $key->EmployeeNumber }}</td>
                            <td>{{ $key->EmployeePhone }}</td>
                            <td>
                              <form action="/employee/edit" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $key->EmployeeId }}">
                                <button type="submit" class="badge bg-warning" style="border: none">
                                    <span class="menu-icon"><i class="far fa-edit"></i></span>
                                </button>
                              </form>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection