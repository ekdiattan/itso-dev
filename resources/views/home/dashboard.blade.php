@extends('home.partials.main')
@section('container')
<section class="content connectedSortable">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="IT") --}}
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3 id="count1"></h3>
                    <p>Data Catatan IT</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-ios-book"></i>
                  </div>
                  <a href="/laporan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
        
          {{-- @endif --}}
        {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="Aset") --}}
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="count2"></h3>
                <p>Peminjaman Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="/booking" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        {{-- @endif --}}
          <!-- ./col -->
        {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="Kepegawaian") --}}
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="count3"></h3>
                <p>Peminjaman Berlangsung</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/master-pegawai" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        {{-- @endif --}}
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- <canvas id="myChart" style="width:100%;max-width:600px"></canvas> -->

{{-- <script>
  // Mendapatkan elemen target
  var countElement1 = document.getElementById('count1');
  var countElement2 = document.getElementById('count2');
  var countElement3 = document.getElementById('count3');
  var startCount = 0;

  var endCount1 = {{$employee}}; 
  var endCount2 = {{$bookingOverdue}}; 
  var endCount3 = {{$bookingNow}}; 

  var duration = 2000;

  // JANGAN DI EDIT
  function countingEffect(countElement, endCount) 
  {
    var countDiff = endCount - startCount;
    var interval = Math.ceil(duration / countDiff);
    var currentCount = startCount;
  
    var timer = setInterval(function () {
      currentCount++;
      countElement.innerText = currentCount;
      if (currentCount === endCount) {
        clearInterval(timer);
      }
    }, interval);
  }
  // END AKHIR EDIT
  
  
  // Memulai efek hitungan untuk setiap elemen
  if({{ $employee }} != '0'){
  countingEffect(countElement1, endCount1);
  }
  if({{ $employee }} != '0'){
  countingEffect(countElement2, endCount2);
  }
  if({{ $employee }} != '0'){
  countingEffect(countElement3, endCount3);
  }

</script> --}}


<!-- <script>
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [10, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
</script> -->
@endsection