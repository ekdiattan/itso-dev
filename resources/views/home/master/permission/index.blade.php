<title>Diskominfo Jabar | Pengaturan</title>
@extends('home.partials.main')
@section('container')
<div class="row">
    <div class="col-md-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambahkan Hak Akses</h4>
          <form action="/merk/create" method="post" >
            @csrf
            <br>
            <div class="form-group">
              <label for="exampleInputUsername1">Modul</label>
              <select class="form-control" aria-label="Default select example" id="status" name="PermissionModuleId">
                <option value="1">Kendaraan</option>
                <option value="2">Aset</option>
                <option value="3">Ruangan</option>
              </select>            
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Posisi</label>
              <select class="form-control" aria-label="Default select example" id="status" name="PermissionRoleId">
                <option value="1">Kendaraan</option>
                <option value="2">Aset</option>
                <option value="3">Ruangan</option>
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
            <h4 class="card-title mb-1">Daftar Hak Akses</h4>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="preview-list">
                <div id="dataTable_wrapper" class="table-responsive">
                    <table id="dataTable" class="table table-hover table-bordered table-striped">
                      <thead  class="bg-gray disabled color-palette">
                        <tr>
                          <th>No</th>
                          <th>Module</th>
                          <th>Posisi</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($permission as $post ) 
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $post->module->MasterModuleName}}</td>
                          <td>{{ $post->role->MasterRoleCode}}</td>
                          <td>
                            <form action="/permission/delete" method="POST" style="display:inline;">
                              @csrf
                              <input type="hidden" name="id" value="{{ $post->PermissionId }}">
                              <button type="submit" class="badge bg-danger" style="border: none">
                                  <span class="menu-icon"><i class="far fa-trash-alt"></i></span>
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