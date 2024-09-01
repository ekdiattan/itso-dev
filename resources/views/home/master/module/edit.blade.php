@extends('home.partials.main')
@section('container')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <form action="/aset/{{$aset->MasterAsetId}}" method="post">
        @csrf
        <p class="card-description">Edit Aset</p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Aset</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="MasterAsetName" name="MasterAsetName" maxlength="255"  value="{{ $aset->MasterAsetName }}" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kode Aset</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="MasterAsetCode" name="MasterAsetCode" maxlength="255" value="{{ $aset->MasterAsetCode}}" readonly />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tipe Aset</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="MasterAsetType" name="MasterAsetType" maxlength="255"  value="{{ $aset->MasterAsetType }}"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggal</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="MasterAsetBoughtDate" name="MasterAsetBoughtDate" maxlength="255"  value="{{ $aset->MasterAsetBoughtDate }}" />
              </div>
            </div>
          </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
              <button type="submit" class="btn btn-primary mr-2 btn-flat">Submit</button>
                <a href="/aset" class="btn btn-danger mr-2 btn-flat"><i class="fa fa-file-excel-o"></i> Kembali</a>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection