@extends('home.partials.main')
@section('container')
@if(session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-md-3 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambahkan Aset</h4>
          <form action="/aset/create" method="post" >
            @csrf
            <br>
            <div class="form-group">
              <label for="exampleInputUsername1">Nama Aset</label>
              <input type="text" class="form-control" id="nama" name="MasterAsetName" maxlength="255">
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Tanggal Beli</label>
              <input type="date" class="form-control" id="jumlah" name="MasterAsetBoughtDate">
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Tipe Aset</label>
              <select class="form-control" aria-label="Default select example" id="status" name="MasterAsetType">
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
                          <th>Nama Aset</th>
                          <th>Kode Aset</th>
                          <th>Tipe Aset</th>
                          <th>Tanggal Aset</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($asets as $post )  
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $post->MasterAsetName }}</td>
                          <td>{{ $post->MasterAsetCode }}</td>
                          <td>{{ $post->MasterAsetType }}</td>
                          <td>{{ $post->MasterAsetBoughtDate }}</td>
                          <td>
                            <a href="/aset/{{ $post->id }}" class="badge bg-warning"><span class="menu-icon"><i class="far fa-edit"></i></span></a>
                            <form action="/aset/delete/{{$post->id}}" method="get" class="d-inline">
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