<?php
	$idpjl=$_POST['id_penjualan'];
	$tglpjl=$_POST['tanggal_jual'];
			$tgl1=explode('-',$tglpjl);
			$tanggalpjl=$tgl1[2]."-".$tgl1[1]."-".$tgl1[0];	
	$idpgn=$_POST['id_pelanggan'];
	//$namapgn=$_POST['nama_pelanggan'];
	$idbrg=$_POST['id_barang'];
	//$namabrg=$_POST['nama_barang'];
	$hargabeli=$_POST['harga_beli'];
	$stok=$_POST['stok'];
	$jmhbeli=$_POST['jumlah_beli'];
	$totalhgr=$_POST['total_harga'];
//input database		
 			$sql = "INSERT INTO penjualan(no,id_penjualan,tanggal_jual,id_pelanggan,id_barang,jumlah_jual,total_harga)
			VALUES('$kode','$idpjl','$tanggalpjl','$idpgn','$idbrg','$jmhbeli','$totalhgr')";
		  
		  		echo $sql;
			$hasil = mysql_query($sql);
		   
			if ($hasil) {
			echo "Input Data Nomor : ".$idpjl." BERHASIL";
			            }
			else {
			echo  "Input Data Nomor : ".$idpjl." GAGAL". mysql_error();
		         } 
?>