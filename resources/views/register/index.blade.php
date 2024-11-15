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
              <select class="form-control" aria-label="Default select example" id="status" name="MasterAsetType" required>
                @foreach ($users as $item)
                  <option value="{{$users->UserId}}">{{$users->employee->EmployeeName}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Nama Pengguna</label>
              <input type="date" class="form-control" id="jumlah" name="MasterAsetBoughtDate" required>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Status Aset</label>
              <select class="form-control" aria-label="Default select example" id="status" name="MasterAsetStatus" required>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
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
                        @foreach ($users as $post )  
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $post->name }}</td>
                          <td>{{ $post->employee->EmployeeName }}</td>
                          <td>
                            <form action="/aset" method="POST" style="display:inline;">
                              @csrf
                              <input type="hidden" name="id" value="{{ $post->UserId }}">
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