<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Diskominfo Jabar | Login</title>

    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link rel="shortcut icon" href="{{ asset('assets/images/jabar.png') }}">

  </head>
  <body>
    <video autoplay muted loop id="myVideo" >
      <source src="/assets/videos/diskominfo.mp4" type="video/mp4">
    </video>
    <a href="https://diskominfo.jabarprov.go.id">
      <img src="https://diskominfo.jabarprov.go.id/dev2021/img/logo_diskom.svg"class="mx-auto d-block" alt="Image"height="100" width="260">
    </a>
    <div class="container-scroller">
            <div class="card col-lg-4 mx-auto" id="logins">
              <div class="card-body px-5 py-5">
                <marquee>Selamat Datang di Website IT Solution Dinas Komunikasi & Informatika Provinsi Jawa Barat, Alamat : Jl. Tamansari No.55, Lb. Siliwangi, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132, Telp : 0222502898, Website : diskominfo.jabarprov.go.id</marquee>
                <h3 class="card-title text-left mb-3">Login</h3>
                <main class="form-signin" id="main">
                  <form action="\login" method="post">
                      @csrf   
                    <div class="form-group">
                      <label>Username *</label>
                      <input type="text" class="form-control p_input" id="name" name="name" autofocus required>
                    </div>
                    <div class="form-group">
                      <label>Password *</label>
                      <input type="password" class="form-control p_input" id="password" name="password" required>
                    </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block enter-btn" id="submit-btn">Login</button>
                      <p class="text-center mt-3">© Dinas Komunikasi & Informatika Provinsi Jawa Barat {{ date('Y') }}</p>
                    </div>
                  </form>
                </main>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @include('home.general.alert')
  </body>
</html>