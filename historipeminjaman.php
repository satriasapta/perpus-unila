<?php
  include 'ceklogin.php';
  include 'function.php';

  $tanggalsekarang = Date("Y-m-d");
  
  if ( isset($_GET["kembalikan"]) ) {

      if ( kembalikanbuku($_GET) > 0 ) {
      echo "
        <script>
          alert('Tunggu pengelola perpus konfirmasi!');
          window.location = 'listpeminjaman.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Gagal!');
        </script>
      ";
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'head.php'; ?>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php include 'navbar.php'; ?>
    <div class="page">
      <?php include 'header.php'; ?>
      <!-- Breadcrumbs -->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Histori Peminjaman</li>
          </ul>
        </div>
      </div>
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Histori Peminjaman Buku</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-stripped tabble-sm">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>Judul</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $namausernow = $datauser['nama'];
                          $kueri = query("SELECT * FROM tblpinjam WHERE nama = '$namausernow' AND status = 'Diterima'");
                        ?>
                        <?php foreach ( $kueri as $data ) : ?>
                          <?php
                            $kode = $data["kode"];
                            $judul = $data["judul"];
                            $tanggal = $data["tanggal"];
                            $status = $data["status"];
                          ?>
                          <tr>
                          <td><?= $kode; ?></td>
                          <td><?= $judul; ?></td>
                          <td><?= $tanggal; ?></td>
                          <td><?= $status; ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </section>

      <div class="container-fluid">
          <div class="row">
            <!-- BOTTOM -->
          </div>
        </div>
      <footer class="main-footer">
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>
