<title>Diskominfo Jabar | Pengguna</title>
@extends('home.partials.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Data Pengguna</h2>
            </div>
                <div class="card">
                  <div class="card-body">  
                    <a class="btn btn-success" href="/user">+ Pengguna</a>
                    <div id="dataTable_wrapper" class="table-responsive">
                      <table id="dataTable" class="table table-hover">
                        <br>
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Nama Pegawai</th>
                            <th>Nama Bidang</th>
                            <th>Hak Akses</th>
                            <th>Nomor HP</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $key => $post )  
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $post->name}}</td>
                              <td>{{ $post->employee->EmployeeName}}</td>
                              <td>{{ $post->employee->position->MasterPositionName}}</td>
                              <td>{{ $post->role->MasterRoleCode}}</td>
                              <td>{{ $post->employee->EmployeePhone}}</td>
                              <td>
                                <form action="/user/edit" method="POST" style="display:inline;">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $post->UserId }}">
                                  <button type="submit" class="badge bg-warning" style="border: none">
                                      <span class="menu-icon"><i class="far fa-edit"></i></span>
                                  </button>
                                </form>
                                <form action="/user/delete/{{ $post->UserId }}" method="get" class="d-inline">
                                  @csrf
                                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span class="menu-icon"><i class="fas fa-trash"></i></span></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection