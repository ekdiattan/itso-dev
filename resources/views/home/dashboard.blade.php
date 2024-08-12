@extends('home.partials.main')
@section('container')
<section class="content connectedSortable">
      <div class="container-fluid">
        <div class="row">
              <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3 id="count1">{{$bookingWaiting}}</h3>
                    <p>Peminjaman Menunggu</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-ios-book"></i>
                  </div>
                </div>
              </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="count2">{{$bookingBooked}}</h3>
                <p>Peminjaman Berlangsung</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="count3">{{$bookingReject}}</h3>
                <p>Peminjaman Ditolak</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="count3">{{$bookingDone}}</h3>
                <p>Peminjaman Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection