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
          <form action="/employee/create" method="key" >
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
                          <th>Alamat Pegawai</th>
                          <th>Nomor Pegawai</th>
                          <th>Email Pegawai</th>
                          <th>Nomor Hp Pegawai</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($employee as $key )  
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $key->EmployeeName }}</td>
                          <td>{{ $key->EmployeeAddress }}</td>
                          <td>{{ $key->EmployeePhone }}</td>
                          <td>{{ $key->EmployeeEmail }}</td>
                          <td>{{ $key->EmployeePhone }}</td>
                          <td>
                            <a href="/kodeAset/" class="badge bg-warning"><span class="menu-icon"><i class="far fa-edit"></i></span></a>
                            <form action="/kodeAset/delete/{{$key->id}}" method="get" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"onclick="return confirm('Are you sure?')"><span class="menu-icon"><i class="fas fa-trash"></i></span></button>
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