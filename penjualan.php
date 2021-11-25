<?php
$hari_ini=date("d-m-Y");
include "format.php";
//error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Data Pembelian</title>
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/app/easyui.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/style.css">
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="viewpelanggan.js"></script>
	<script type="text/javascript">
        function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return (d<10?('0'+d):d)+'-'+(m<10?('0'+m):m)+'-'+y;
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var d = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var y = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
    </script>
</head>

<body>
	<div class="easyui-panel" title="Transaksi Penjualan Barang" style="width:auto;padding: 20px 40px;">
		<form method="POST" name="pjl" novalidate>
		    <div class="fitem">
				<label>Tanggal Penjualan</label>
			  	<input class="easyui-datebox" name="tanggal_jual" id="tanggal_jual" class="easyui-validatebox" required="true" value="<?php echo $hari_ini; ?>" data-options="formatter:myformatter,parser:myparser">
			</div>
			<br/>
			<div class="fitem">
				<label>ID Pelanggan</label>
				<input name="id_pelanggan" style="text-transform:uppercase" autocomplete="off" class="easyui-validatebox" required="true" onkeyup="cek_pelanggan(this)">
				<span id='loaddiv'></span>
			</div>
		    <div class="fitem">
				<label>Nama Pelanggan</label>
			  	<span class='boldred' id='namawp'><input name="nama_pelanggan" id="nama_pelanggan" size="30" readonly=""></span>
			</div>
			<br/>
		    <div class="fitem">
				<label>ID Barang</label>
				<input name="id_barang" id="fokus_barang" style="text-transform:uppercase" autocomplete="off" class="easyui-validatebox" required="true" onkeyup="cek_barang(this)">
				<span id='loaddiv2'></span>
			</div>
			<span class='boldred' id='namabr'>
		    <div class="fitem">
				<label>Nama Barang</label>
			<input name="nama_barang" id="nama_barang" size="30" readonly="">
			</div>
            <div class="fitem">
				<label>Harga Jual</label>
		  	  	<input name="harga_beli" required="true" readonly="">
			</div>
			<div class="fitem">
				<label>Stok</label>
		  	  	<input name="stok" required="true" readonly="">
			</div></span>
			<br/>
			<div class="fitem">
				<label>Jumlah</label>
		  	  	<input type="text" name="jumlah_beli" id="fokus_jumlah" autocomplete="off" class="easyui-validatebox" required="true" onkeyup="hitungpenjualan()&cek_stok(this)&cek_isipenjualan(this)">
			</div>
			<div class="fitem">
				<label>Total Harga</label>
		  	  <input type="text" name="total_harga" required="true" readonly="">
			</div>
			<br/>
			<hr>
			<input type="submit" value="Proses Transaksi" name="savedata" style="margin-top:10px;height:30px;cursor:pointer;" />
		</form>
	</div>
<?php
//simpan data		
if(!empty($_POST['savedata'])) {
	$idpjl= $idtransaksi;
	$tglpjl=$_POST['tanggal_jual'];
	$tgl1=explode('-',$tglpjl);
	$tanggalpjl=$tgl1[2]."-".$tgl1[1]."-".$tgl1[0];	
	$idpgn=$_POST['id_pelanggan'];
	$namapgn=$_POST['nama_pelanggan'];
	$idbrg=$_POST['id_barang'];
	$namabrg=$_POST['nama_barang'];
	$hargajual=$_POST['harga_beli'];
	$stok=$_POST['stok'];
	$jmhbeli=$_POST['jumlah_beli'];
	$updatestok = $stok - $jmhbeli;
	$totalhgr=$_POST['total_harga'];
	
	if($idpgn==''){
	echo "<script type='text/javascript'>alert('ID Pelanggan Harus Diisi ..!')</script>";
	}else if($namapgn=='Tidak Ditemukan'){
	echo "<script type='text/javascript'>alert('Isi ID Pelanggan Dengan Benar ..!')</script>";
	}else if($idbrg==''){
	echo "<script type='text/javascript'>alert('ID Barang Harus Diisi ..!')</script>";
	}else if($namabrg=='Tidak Ditemukan'){
	echo "<script type='text/javascript'>alert('Isi ID Barang Dengan Benar ..!')</script>";
	}else if($jmhbeli==''){
	echo "<script type='text/javascript'>alert('Jumlah Penjualan Harus Diisi ..!')</script>";
	}else if($totalhgr=='Infinity' or $totalhgr=='NaN'){
	echo "<script type='text/javascript'>alert('Isi Jumlah Penjualan Dengan Benar ..!')</script>";
	}else{	
	//input database		
 	$sql = "INSERT INTO penjualan(no,id_penjualan,tanggal_jual,id_pelanggan,nama_pelanggan,id_barang,nama_barang,harga_jual,jumlah_jual,total_harga)
			VALUES('$kode','$idpjl','$tanggalpjl','$idpgn','$namapgn','$idbrg','$namabrg','$hargajual','$jmhbeli','$totalhgr')";
	$hasil = mysql_query($sql);
		   
	if ($hasil) {
		$que = "UPDATE `barang` SET `stok`='$updatestok' WHERE id_barang = '$idbrg'";
		$has = mysql_query($que);

		$querycek = "SELECT `jumlah` FROM `temp_penjualan` WHERE id_barang = '$idbrg'";
		$result = mysql_query($querycek);
		$metu = mysql_fetch_assoc($result);
		$jml = $metu['jumlah'];
		//echo $jml;

		$tambah = $jmhbeli + $jml;

		if (mysql_num_rows($result)==1) {
			$updatetemp = "UPDATE `temp_penjualan` SET `jumlah`='$tambah' WHERE id_barang = '$idbrg'";
			$tampiltemp = mysql_query($updatetemp);
		} else {
			$temp = "INSERT INTO temp_penjualan(id_barang,jumlah) VALUES('$idbrg','$tambah')";
			$tampil = mysql_query($temp);
		}

		//echo $has;
		echo "<script type='text/javascript'>alert('Data Transaksi ".$idpjl." BERHASIL Disimpan')</script>";
	}else {
		echo "<script type='text/javascript'>alert('Data Transaksi ".$idpjl." GAGAL Disimpan')</script>";
	}
}	
}
?>
</body>
</html>
