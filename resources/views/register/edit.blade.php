@extends('home.partials.main')
@section('container')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <form action="/user/update/{{ $user->UserId }}" method="post">
        @csrf
        <p class="card-description">Edit Data Pengguna </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nip</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nip" value="{{ $user->employee->EmployeeNumber }}" readonly />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="username" name="name" value="{{ $user->name }}" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" value="{{ $user->employee->EmployeeName }}" readonly/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row" style="display:none;" id="emaill">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9 input-group-append">
              <input type="text" class="form-control p_input" id="email" value="{{$user->employee->EmployeeEmail}}" readonly>
            </div>
            </div>
        </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jabatan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="jabatan" value="{{ $user->employee->position->MasterPositionName }}" readonly/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Bidang</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nama_bidang" value="{{ $user->employee->position->unit->MasterUnitName }}" readonly/>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Hp</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="no_hp" value="{{ $user->employee->EmployeePhone }}" readonly/>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Hak Akses</label>
              <div class="col-sm-9">
                <select class="form-control" id="hak_akses" name="UserRoleId">
                  @foreach ($role as $roles)
                    <option value={{$roles->MasterRoleId}}>{{$roles->MasterRoleCode}} - {{$roles->MasterRoleName}}</option>
                  @endforeach
                </select>
            </div>
          </div>
      </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9 input-group-append">
              <input  type="password" class="form-control p_input" id="password" name="password" placeholder ="Isi dengan sandi baru jika ingin merubahnya">
              <span class="input-group-text" >
                    <i class="far fa-eye" id="show-password" type="button" ></i>
              </span>
            </div>
            </div>
        </div>
          <div class="box">
            <div class="box-header with-border">
                <a href="{{url('/user') }}" class="btn btn-danger mr-2 btn-flat"><i class="fa fa-file-excel-o"></i> Kembali</a>
                <button type="submit" class="btn btn-primary mr-2 btn-flat" id="submit-btn">Submit</button>
            </div>
        </div>
      </form>
      <div id="password-strength"></div>

    </div>
  </div>
</div>

<script src="../../assets/js/mata.js"></script>
<script src="../../assets/js/alertpasswordregister.js"></script>

@endsection