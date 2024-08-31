@extends('home.partials.main')
@section('container')

  <div class="profile-desc mt-2">
    <div class="profile-pic">
      <div class="count-indicator">
        <img class="rounded-circle mx-auto d-block" src="{{ $image }}" alt="image" style="height: 100px; width: 100px;">
        <input type="file" id="image-input" name="image" style="display:none;">
      </div>
    </div>
    <div class="profile-name text-center">
      <h5 class="mt-4 font-weight-normal">{{ $user->employee->EmployeeName }}</h5>
      <span>{{ auth()->user()->hak_akses }}</span>
    </div>
      <div class="mb-3 p-3">
        <h4>Username</h4>
        <h5>{{ $user->name }}</h5>
      </div>
      <br>
      <div class="mb-3 p-3">
        <h4>Nama</h4>
        <h5>{{ $user->employee->EmployeeName }}</h5>
      </div>
      <br>
      <div class="mb-3 p-3">
        <h4>Hak Akses</h4>
        <h5>{{ $user->role->MasterRoleCode }}</h5>
      </div>
      <br>
      <div class="mb-3 p-3">
        <h4>No HP</h4>
        <h5>{{ $user->employee->EmployeePhone }}</h5>
      </div>
    <form action="/user/update/{{ $user->UserId }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="password">Ganti Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan kata sandi baru">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="EmployeeImage" placeholder="Masukan kata sandi baru">
      </div>
      <div id="password-strength"></div>
      <br>
      <div class="input-group-append">
        <button type="submit" class="btn btn-primary mr-2 btn-flat float-right" id="submit-btn">Change</button>
        <span class="input-group-text">
          <i class="far fa-eye" id="show-password" type="button"></i>
        </span>
      </div>
    </form>

    <script src="/assets/js/mata.js"></script>
    <script src="/assets/js/alertpassword.js"></script>

@endsection