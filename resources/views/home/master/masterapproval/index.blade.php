<title>Diskominfo Jabar | Pengaturan</title>
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
          <h4 class="card-title">Tambahkan Merk</h4>
          <form action="/merk/create" method="post" >
            @csrf
            <br>
            <div class="form-group">
              <label for="exampleInputUsername1">Merk</label>
              <input type="text" class="form-control" id="merk" name="merk" required>
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
            <h4 class="card-title mb-1">Daftar Merk</h4>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="preview-list">
                <div id="dataTable_wrapper" class="table-responsive">
                    <table id="dataTable" class="table table-hover table-bordered table-striped">
                      <thead  class="bg-gray disabled color-palette">
                        <tr>
                          <th>No</th>
                          <th>Moudule</th>
                          <th>Posisi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($masterApproval as $post ) 
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $post->merk }}</td>
                          <td>
                            <a href="/merk/{{ $masterApproval->MasterApprovalId }}" class="badge bg-warning"><span
                                class="menu-icon"><i class="far fa-edit"></i></span></a>
                            <form action="/merk/delete/{{ $masterApproval->MasterApprovalId }}" method="get" class="d-inline">
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