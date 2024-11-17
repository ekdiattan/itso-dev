@extends('home.partials.main')
@section('container')
<div class="row">
    <div class="col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambahkan Pengguna</h4>
          <form action="/user/create" method="post" >
            @csrf
            <br>
            <div class="form-group">
              <label for="exampleInputUsername1">Pegawai</label>
              <select class="form-control" aria-label="Default select example" name="UserEmployeeId" required>
                @foreach ($employee as $item)
                  <option value="{{ $item->EmployeeId }}">{{ $item->EmployeeName }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Nama Pengguna</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Hak Akses</label>
              <select class="form-control" aria-label="Default select example" name="UserRoleId" required>
                @foreach ($role as $item)
                  <option value="{{ $item->MasterRoleId }}">{{ $item->MasterRoleCode }}</option>
                @endforeach
              </select>            
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
      <div class="col-md-9 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title mb-1"><b>Daftar Aset</b></h4>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="preview-list">
                <div id="dataTable_wrapper" class="table-responsive">
                    <table id="dataTable" class="table table-hover table-bordered table-striped">
                      <thead  class="bg-gray disabled color-palette">
                        <tr>
                          <th>No</th>
                          <th>Nama Pengguna</th>
                          <th>Nama Pegawai</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user )  
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->employee->EmployeeName }}</td>
                          <td>
                            <form action="/user/edit" method="post" style="display:inline;">
                              @csrf
                              <input type="hidden" name="id" value="{{ $user->UserId }}">
                              <button type="submit" class="badge bg-warning" style="border: none">
                                  <span class="menu-icon"><i class="far fa-edit"></i></span>
                              </button>
                            </form>     
                          </td>                       
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