<?php
    include "koneksi.php";

    $id = $_GET['id'];

    echo $id;

    $sql=mysqli_query($koneksi,"DELETE FROM anak WHERE nama = '$id'") or die($conn);
    $sql1=mysqli_query($koneksi,"DELETE FROM keterangananak WHERE nama = '$id'") or die($conn);
    $sql2=mysqli_query($koneksi,"DELETE FROM gapanak WHERE nama = '$id'") or die($conn);
    $sql3=mysqli_query($koneksi,"DELETE FROM hasilanak WHERE nama = '$id'") or die($conn);
    if ($sql && $sql1) {
	echo "<script>alert('Berhasil di Hapus!');window.location='record.php'</script>";
    }
?>
