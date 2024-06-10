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
              <label for="exampleInputUsername1">Jenis Aset</label>
              <select class="form-control" id="jenis" name="jenis" onClick="showPeriodForm()">
                <option value="">---PILIH---</option>
                <option value="Kendaraan">Kendaraan</option>
                <option value="Ruangan">Ruangan</option>
                <option value="Barang">Barang Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" maxlength="255"  required>
            </div>
            <div class="form-group" id="sembunyi" style="display:none;">
              <label for="exampleInputUsername1">Merk</label>
              <input type="text" class="form-control" id="merk" name="merk" maxlength="255" >
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Jumlah</label>
              <input type="text" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            <div class="form-group" id="sembunyi2" style="display:none;">
                <label for="exampleInputUsername1">Kapasitas</label>
                <input type="text" class="form-control" id="kapasitas" name="kapasitas" maxlength="255">
              </div>
            <div id="period" style="display:none;">
              <div class="form-group"  style="display:none;">
                <label for="exampleInputUsername1">Kode Unit</label>
                <input type="text" class="form-control" id="kodeUnit" name="kodeUnit" maxlength="255">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun" maxlength="255">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Nomer Rangka</label>
                <input type="text" class="form-control" id="rangka" name="rangka" maxlength="255">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Nomer Mesin</label>
                <input type="text" class="form-control" id="mesin" name="mesin" maxlength="255">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Kebersihan</label>
                <select class="form-control" aria-label="Default select example" id="kebersihan" name="kebersihan">
                  <option value="">--PILIH--</option>
                  <option value="bersih">Bersih</option>
                  <option value="kotor">Kotor</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1" >Bahan Bakar</label>
                <select class="form-control" aria-label="Default select example" id="bahanBakar" name="bahanBakar">
                  <option value="">--PILIH--</option>
                  <option value="25%">25%</option>
                  <option value="50%">50%</option>
                  <option value="75%">75%</option>
                  <option value="100%">100%</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Status</label>
              <select class="form-control" aria-label="Default select example" id="status" name="status">
                <option value="tersedia">Tersedia</option>
                <option value="reserverd">Reserverd</option>
                <option value="service">Service</option>
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