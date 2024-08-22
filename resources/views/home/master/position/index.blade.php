@extends('home.partials.main')
@section('container')
<div class="row">
    <div class="col-md-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambahkan Posisi</h4>
          <form action="/bidang/create" method="post" >
            @csrf
            <br>
            <div class="form-group">
              <label for="exampleInputUsername1">Nama Posisi</label>
              <input type="text" class="form-control" id="namabidang" name="namabidang" maxlength="255" required>
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
            <h4 class="card-title mb-1">Daftar Posisi</h4>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="preview-list">
                <div id="dataTable_wrapper" class="table-responsive">
                    <table id="dataTable" class="table table-hover table-bordered table-striped">
                      <thead  class="bg-gray disabled color-palette">
                        <tr>
                          <th>No</th>
                          <th>Nama Jabatan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($position as $position)  
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $position->MasterPositionName}}</td>
                          <td>
                            <form action="/position/edit" method="POST" style="display:inline;">
                              @csrf
                              <input type="hidden" name="id" value="{{ $position->MasterPositionId }}">
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