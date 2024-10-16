@extends('home.partials.main')
@section('container')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <form action="/module/update/{{$module->MasterModuleId}}" method="post">
        @csrf
        <p class="card-description">Edit Module</p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Module</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="MasterModuleName" name="MasterModuleName" maxlength="255"  value="{{ $module->MasterModuleName}}" />
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