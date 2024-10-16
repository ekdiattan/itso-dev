@extends('home.partials.main')
@section('container')
<div class="row">
    <div class="col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambahkan Modul</h4>
          <form action="/module/create" method="post" >
            @csrf
            <br>
            <div class="form-group">
              <label for="exampleInputUsername1">Nama Modul</label>
              <input type="text" class="form-control" name="MasterModuleName" maxlength="255" required>
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
                          <th>Nama Modul</th>
                          <th>Kode Modul</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($module as $post )  
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $post->MasterModuleName }}</td>
                          <td>{{ $post->MasterModuleCode }}</td>
                          <td>
                            <form action="/module/edit" method="POST" style="display:inline;">
                              @csrf
                              <input type="hidden" name="id" value="{{ $post->MasterModuleId }}">
                              <button type="submit" class="badge bg-warning" style="border: none">
                                  <span class="menu-icon"><i class="far fa-edit"></i></span>
                              </button>
                            </form>                            
                            <form action="/module/delete" method="POST" style="display:inline;">
                              @csrf
                              <input type="hidden" name="id" value="{{ $post->MasterModuleId }}">
                              <button type="submit" class="badge bg-danger" style="border: none">
                                  <span class="menu-icon"><i class="far fa-trash-alt"></i></span>
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