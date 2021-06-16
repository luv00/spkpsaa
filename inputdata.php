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
              <li class="active"><i class="fa fa-edit"></i> Input Data</li>
            </ol>
            <!-- /.Content -->

	<!-- Form awal -->
	<form  role="form" method="post" class="form-inline" class="animated infinite zoomIn delay-2s">
  		<div class="form-group mb-2">
    		<label class="sr-only"></label>
    		<input type="text" readonly class="label label-success" value="Jumlah Anak">
  		</div>

  		<div class="form-group mx-sm-3 mb-2">
    		<select name="jmlanak" class="form-control" id="exampleFormControlSelect1">
      			<option value="1">1</option>
      			<option value="2">2</option>
    		</select>
  		</div>
  		<button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
	</form>
	<!-- /Form -->

	<!-- Form -->
	<?php
	 if(isset($_POST['submit'])) {
	?>
	 <form  role="form" method="post" action="record.php"><br>
	 <?php
	  session_start();
		$jumlah = $_POST['jmlanak'];
		$_SESSION['jumlahanak'] = $jumlah;
			for($a=1;$a<=$jumlah;$a++) {
	 ?>

    <div class="form-group">
    	    <label for="exampleFormControlInput1">Nama</label>
    	    <input class="form-control" placeholder="Nama Anak" name="namaanak<?php echo $a; ?>" autocomplete="off">
 	  </div>

    <div class="form-group">
          <label for="exampleFormControlSelect1">Keadaan Ekonomi</label>
            <select name="ekonomi<?php echo $a; ?>" class="form-control" id="exampleFormControlSelect1">
              <option>---Pilih---</option>
              <option value="1">Kaya</option>
              <option value="2">Mampu</option>
              <option value="3">Sederhana</option>
              <option value="4">Miskin</option>
              <option value="5">Sangat Miskin</option>
            </select>
    </div>

          <div class="form-group">
          <label for="exampleFormControlSelect2">Keadaan Keluarga</label>
    	      <select name="keluarga<?php echo $a; ?>" class="form-control" id="exampleFormControlSelect2">
                  <option>---Pilih---</option>
                  <option value="1">Baik</option>
                  <option value="2">KDRT</option>
                  <option value="3">Terlantar</option>
                  <option value="4">Yatim</option>
                  <option value="5">Yatim Piatu</option>
                </select>
              </div>

          <div class="form-group">
          <label for="exampleFormControlSelect2">Makanan Pokok</label>
    	<select name="pokok<?php echo $a; ?>" class="form-control" id="exampleFormControlSelect2">
                  <option>---Pilih---</option>
                  <option value="1">> 3x sehari</option>
                  <option value="2">3x sehari</option>
                  <option value="3">2x sehari</option>
                  <option value="4">1x sehari</option>
                  <option value="5">< 1x sehari</option>
                </select>
              </div>

          <div class="form-group">
          <label for="exampleFormControlSelect2">Usia</label>
    	<select name="usia<?php echo $a; ?>" class="form-control" id="exampleFormControlSelect2">
                  <option>---Pilih---</option>
                  <option value="1">16-18</option>
                  <option value="2">13-15</option>
                  <option value="3">10-12</option>
                  <option value="4">8-9</option>
                  <option value="5">5-7</option>
                </select>
              </div>
              <br>
              <?php } ?>
                  <button type="submit" name="submitform" class="btn btn-primary">Simpan</button><br>
                  </form>
              <?php } ?>
         
	<!-- /Form -->
      
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