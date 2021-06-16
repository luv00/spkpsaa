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
            <li><a href="rangking.php"><i class="fa fa-bar-chart-o"></i> Ranking</a></li>
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
              <li class="active"><i class="fa fa-bar-chart-o"></i> Ranking</li>
            </ol>
            <!-- /.Content -->
          <div class="row">
          <div class="col-lg-12">
            <h2>Ranking</h2>
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th scope="col">Rank</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Bobot keadaan Ekonomi</th>
                    <th scope="col">Bobot Keadaan Keluarga</th>
                    <th scope="col">Bobot Makanan Pokok</th>
                    <th scope="col">Bobot Usia</th>
                    <th scope="col">NCF (60%)</th>
                    <th scope="col">NSF (40%)</th>
                    <th scope="col">Hasil</th>
                  </tr>
                </tbody>
                    <?php 
                    $query = mysqli_query($koneksi,"SELECT * FROM hasilanak ORDER BY hasil DESC");
                    if(mysqli_num_rows($query)>0){ 
                ?>
                <?php
                    $a = 1;
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <th scope="row"><?php echo $a; ?></th>
                    <td><?php echo $data["nama"];?></td>
                    <td><?php echo $data["bobotekonomi"];?></td>
                    <td><?php echo $data["bobotkeluarga"];?></td>
                    <td><?php echo $data["bobotpokok"];?></td>
                    <td><?php echo $data["bobotusia"];?></td>
                    <td><?php echo $data["ncf"];?></td>
                    <td><?php echo $data["nsf"];?></td>
                    <td><?php echo $data["hasil"];?></td>
                </tr>
                <?php $a++; } ?>
                <?php } ?>
            </tbody>
              </table>
            </div>
          </div>
          
 <!-- /Tabel Ranking --><br>

 <?php 
        $query = mysqli_query($koneksi,"SELECT * FROM hasilanak ORDER BY hasil DESC LIMIT 1");
        if(mysqli_num_rows($query)>0){ 
    ?>
    <?php
        $a = 1;
        while($data = mysqli_fetch_array($query)){
    ?>
    
    <?php $a++; } ?>
    <?php } ?>

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
