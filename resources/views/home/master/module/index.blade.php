@extends('home.partials.main')
@section('container')
<div class="row">
      <div class="col-md-12 grid-margin stretch-card">
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