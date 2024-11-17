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
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($module as $post )  
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $post->MasterModuleName }}</td>
                          <td>{{ $post->MasterModuleCode }}</td>
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