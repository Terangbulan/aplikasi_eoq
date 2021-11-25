<?php
$server_db="localhost";
$user_db="root";
$pass_db="";
$nama_db="berbayar_eoq";
$koneksi=mysql_connect($server_db,$user_db,$pass_db) or die("Gagal konek ke server MySQL" .mysql_error());
$pilih_db=mysql_select_db($nama_db) or die ("Gagal membuka database $database" .mysql_error());;
?>