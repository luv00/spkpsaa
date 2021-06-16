<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UPT PSAA TRENGGALEK</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Spk Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="inputdata.php"><i class="fa fa-edit"></i> Input data</a></li>
            <li><a href="record.php"><i class="fa fa-table"></i> Record</a></li>
            <li><a href="rangking.php"><i class="fa fa-bar-chart-o"></i> Rangking</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
           
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
          <h1>UPT PSAA Trenggalek <small>Asrama Kediri</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Home</li>
              <li class="active"><i class="fa fa-table"></i> Record</li>
            </ol>
            <!-- /.Content -->
            <div class="container"><br><br>

    <!-- Hapus Record -->
    <form  role="form" method="post" action="inputdata.php" class="form-inline">
        <div class="form-group mb-2">
            <label class="sr-only"></label>
        </div>
        <button type="submit" name="submitdelete" class="btn btn-success">Tambah</button>
    </form>
    <!-- /Hapus Record -->
          <?php
        session_start();
        if (isset($_POST['submitform'])) {

            if(isset($_SESSION['jumlahanak'])){

                $jumlah = $_SESSION['jumlahanak'];
                $nama = array();

                $nilaiekonomi = array();
                $textekonomi = array();
                $gapekonomi = array();
                $bobotekonomi = array();

                $nilaikeluarga = array();
                $textkeluarga = array();
                $gapkeluarga = array();
                $bobotkeluarga = array();

                $nilaipokok = array();
                $textpokok = array();
                $gappokok = array();
                $bobotpokok = array();

                $nilaiusia = array();
                $textusia = array();
                $gapusia = array();
                $bobotusia = array();

                $ncfanak = array();
                $nsfanak = array();
                $hasilanak = array();

                for($a=1;$a<=$jumlah;$a++) {

        	       $nama[$a] = $_POST['namaanak'.$a];
                   $nilaiekonomi[$a] = $_POST['ekonomi'.$a];
                   $nilaikeluarga[$a] = $_POST['keluarga'.$a];
                   $nilaipokok[$a] = $_POST['pokok'.$a];
                   $nilaiu[$a] = $_POST['usia'.$a];

                   $sql = mysqli_query($koneksi,"INSERT INTO anak (nama, ekonomi, keluarga, pokok, usia) VALUES('$nama[$a]','$nilaiekonomi[$a]','$nilaikeluarga[$a]','$nilaipokok[$a]','$nilaiusia[$a]')") or die (mysqli_error($koneksi));

                }

                for($a=1;$a<=$jumlah;$a++) {

                    if ($nilaiekonomi[$a] == "1"){
                        $textekonomi[$a] = "Kaya";
                    } elseif ($nilaiekonomi[$a] == "2") {
                        $textekonomi[$a] = "Mampu";
                    } elseif ($nilaiekonomi[$a] == "3") {
                        $textekonomi[$a] = "Sederhana";
                    } elseif ($nilaiekonomi[$a] == "4") {
                        $textekonomi[$a] = "Miskin";
                    }else {
                        $textekonomi[$a] = "Sangat Miskin";
                    }

                    if ($nilaikeluarga[$a] == "5"){
                        $textkeluarga[$a] = "Yatim Piatu";
                    } elseif ($nilaikeluarga[$a] == "4") {
                        $textkeluarga[$a] = "Yatim";
                    } elseif ($nilaikeluarga[$a] == "3") {
                        $textkeluarga[$a] = "Terlantar";
                    } elseif ($nilaikeluarga[$a] == "2") {
                        $textkeluarga[$a] = "KDRT";
                    } else {
                        $textkeluarga[$a] = "Baik";
                    }

                    if ($nilaipokok[$a] == "1"){
                        $textpokok[$a] = "> 3x sehari";
                    } elseif ($nilaipokok[$a] == "2") {
                        $textpokok[$a] = "3x sehari";
                    } elseif ($nilaipokok[$a] == "3") {
                        $textpokok[$a] = "2x sehari";
                    } elseif ($nilaipokok[$a] == "4") {
                        $textpokok[$a] = "1x sehari";
                    } else {
                        $textpokok[$a] = "Tidak Makan";
                    }

                    if ($nilaiusia[$a] == "1"){
                        $textusia[$a] = "16-18";
                    } elseif ($nilaiusia[$a] == "2") {
                        $textusia[$a] = "13-15";
                    } elseif ($nilaiusia[$a] == "3") {
                        $textusia[$a] = "10-12";
                    } elseif ($nilaiusia[$a] == "4") {
                        $textusia[$a] = "8-9";
                    } else {
                        $textusia[$a] = "5-7";
                    }

                    $sql = mysqli_query($koneksi,"INSERT INTO keterangananak (nama, ket_ekonomi, ket_keluarga, ket_pokok, ket_usia) VALUES('$nama[$a]','$textekonomi[$a]','$textkeluarga[$a]','$textpokok[$a]','$textusia[$a]')") or die (mysqli_error($koneksi));

                }

                for($a=1;$a<=$jumlah;$a++) {
                    
                    $nama[$a] = $_POST['namaanak'.$a];
                    $gapekonomi[$a] = $nilaiekonomi[$a] - 3;
                    $gapkeluarga[$a] = $nilaikeluarga[$a] - 3;
                    $gappokok[$a] = $nilaipokok[$a] - 3;
                    $gapusia[$a] = $nilaiusia[$a] - 2;

                    $sql = mysqli_query($koneksi,"INSERT INTO gapanak (nama, gapekonomi, gapkeluarga, gappokok, gapusia) VALUES('$nama[$a]','$gapekonomi[$a]','$gapkeluarga[$a]','$gappokok[$a]','$gapusia[$a]')") or die (mysqli_error($koneksi));

                }

                for($a=1;$a<=$jumlah;$a++) {

                    if ($gapekonomi[$a] == "0"){
                        $bobotekonomi[$a] = "5";
                    } elseif ($gapekonomi[$a] == "1") {
                        $bobotekonomi[$a] = "4.5";
                    } elseif ($gapekonomi[$a] == "-1") {
                        $bobotekonomi[$a] = "4";
                    } elseif ($gapekonomi[$a] == "2") {
                        $bobotekonomi[$a] = "3.5";
                    } elseif ($gapekonomi[$a] == "-2") {
                        $bobotekonomi[$a] = "3";
                    } elseif ($gapekonomi[$a] == "3") {
                        $bobotekonomi[$a] = "2.5";
                    } elseif ($gapekonomi[$a] == "-3") {
                        $bobotekonomi[$a] = "2";
                    } elseif ($gapekonomi[$a] == "4") {
                        $bobotekonomi[$a] = "1.5";
                    } else {
                        $bobotekonomi[$a] = "1";
                    }

                    if ($gapkeluarga[$a] == "0"){
                        $bobotkeluarga[$a] = "5";
                    } elseif ($gapkeluarga[$a] == "1") {
                        $bobotkeluarga[$a] = "4.5";
                    } elseif ($gapkeluarga[$a] == "-1") {
                        $bobotkeluarga[$a] = "4";
                    } elseif ($gapkeluarga[$a] == "2") {
                        $bobotkeluarga[$a] = "3.5";
                    } elseif ($gapkeluarga[$a] == "-2") {
                        $bobotkeluarga[$a] = "3";
                    } elseif ($gapkeluarga[$a] == "3") {
                        $bobotkeluarga[$a] = "2.5";
                    } elseif ($gapkeluarga[$a] == "-3") {
                        $bobotkeluarga[$a] = "2";
                    } elseif ($gapkeluarga[$a] == "4") {
                        $bobotkeluarga[$a] = "1.5";
                    } else {
                        $bobotkeluarga[$a] = "1";
                    }

                    if ($gappokok[$a] == "0"){
                        $bobotpokok[$a] = "5";
                    } elseif ($gappokok[$a] == "1") {
                        $bobotpokok[$a] = "4.5";
                    } elseif ($gappokok[$a] == "-1") {
                        $bobotpokok[$a] = "4";
                    } elseif ($gappokok[$a] == "2") {
                        $bobotpokok[$a] = "3.5";
                    } elseif ($gappokok[$a] == "-2") {
                        $bobotpokok[$a] = "3";
                    } elseif ($gappokok[$a] == "3") {
                        $bobotpokok[$a] = "2.5";
                    } elseif ($gappokok[$a] == "-3") {
                        $bobotpokok[$a] = "2";
                    } elseif ($gappokokk[$a] == "4") {
                        $bobotpokok[$a] = "1.5";
                    } else {
                        $bobotpokok[$a] = "1";
                    }

                    if ($gapusia[$a] == "0"){
                        $bobotusia[$a] = "5";
                    } elseif ($gapusia[$a] == "1") {
                        $bobotusia[$a] = "4.5";
                    } elseif ($gapusia[$a] == "-1") {
                        $bobotusia[$a] = "4";
                    } elseif ($gapusia[$a] == "2") {
                        $bobotusia[$a] = "3.5";
                    } elseif ($gapusia[$a] == "-2") {
                        $bobotusia[$a] = "3";
                    } elseif ($gapusia[$a] == "3") {
                        $bobotekonomi[$a] = "2.5";
                    } elseif ($gapusia[$a] == "-3") {
                        $bobotusia[$a] = "2";
                    } elseif ($gapusia[$a] == "4") {
                        $bobotusia[$a] = "1.5";
                    } else {
                        $bobotusia[$a] = "1";
                    }

                    $ncfanak[$a] = (($bobotekonomi[$a]) + ($bobotkeluarga[$a]))/2;
                    $nsfanak[$a] = (($bobotpokok[$a]) + ($bobotusia[$a]))/2;
                    $hasilanak[$a] = (0.6 * $ncfanak[$a]) + (0.4 * $nsfanak[$a]);

                    $sql = mysqli_query($koneksi,"INSERT INTO hasilanak (nama, bobotekonomi, bobotkeluarga, bobotpokok, bobotusia, ncf, nsf, hasil) VALUES('$nama[$a]','$bobotekonomi[$a]','$bobotkeluarga[$a]','$bobotpokok[$a]','$bobotusia[$a]','$ncfanak[$a]','$nsfanak[$a]','$hasilanak[$a]')") or die (mysqli_error($koneksi));

                }

    ?>

    
    <!-- TUTUP -->
    <?php
            }
        }
    ?>
    <!-- /TUTUP -->
    <br><br>
    <!-- Table -->
        <div class="row">
          <div class="col-lg-10">
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Keadaan Ekonomi</th>
                    <th scope="col">Keadaan Keluarga</th>
                    <th scope="col">Makanan Pokok</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
        <tbody>
            <?php 
                $query1 = mysqli_query($koneksi,"SELECT * FROM keterangananak");
                if(mysqli_num_rows($query1)>0){ 
            ?>
            <?php
                $a = 1;
                while($data = mysqli_fetch_array($query1)){
            ?>
            <tr>
                <th scope="row"><?php echo $a; ?></th>
                <td><?php echo $data["nama"];?></td>
                <td><?php echo $data["ket_ekonomi"];?></td>
                <td><?php echo $data["ket_keluarga"];?></td>
                <td><?php echo $data["ket_pokok"];?></td>
                <td><?php echo $data["ket_usia"];?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning" onclick="window.location.href='delete.php?id=<?php echo $data['nama']; ?>'">Hapus</button>
                    </div>
                </td>
            </tr>
            <?php $a++; } ?>
            <?php } ?>
            </tbody>
    </table>
    <!-- /Tabel -->


    <br><br>


    <!-- Table -->
    <form  role="form" method="post" action="hasil.php" class="form-inline">
        <div class="table-responsive">
            <table class="table table-bordered table-hover tablesorter">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Keadaan Ekonomi</th>
                  <th scope="col">Keadaan Keluarga</th>
                  <th scope="col">Makanan Pokok</th>
                  <th scope="col">Usia</th>
                </tr>
            </thead>
                </div>
            <tbody>
                <?php 
                    $query = mysqli_query($koneksi,"SELECT * FROM anak");
                    if(mysqli_num_rows($query)>0){ 
                ?>
                <?php
                    $a = 1;
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <th scope="row"><?php echo $a; ?></th>
                  <td><?php echo $data["nama"];?></td>
                  <td><?php echo $data["ekonomi"];?></td>
                  <td><?php echo $data["keluarga"];?></td>
                  <td><?php echo $data["pokok"];?></td>
                  <td><?php echo $data["usia"];?></td>
                </tr>
                <?php $a++; } ?>
                <?php } ?>
            </tbody>
            <thead class="thead-dark">
                <tr>
                  <th scope="col">GAP</th>
                  <th scope="col"></th>
                  <th scope="col">3</th>
                  <th scope="col">3</th>
                  <th scope="col">3</th>
                  <th scope="col">2</th>
                </tr>
            </thead>
        </table>
        <button type="submit" name="hitunggap" class="btn btn-primary mb-2">Hitung</button>
    </form>
    <!-- /Tabel -->

    </div>

          </div>
          </div>
          </div>
        <!-- /.row -->

        

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>