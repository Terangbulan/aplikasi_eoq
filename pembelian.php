<?php
$hari_ini=date("d-m-Y");
include "format.php";
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
	<script type="text/javascript" src="assets/js/pembelian.js"></script>
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
	<div class="easyui-panel" title="Transaksi Pembelian Barang" style="width:auto;padding:20px 40px;">
		<form method="POST" name="pjl" novalidate>
		    <div class="fitem">
				<label>Tanggal Pembelian</label>
			  	<input class="easyui-datebox" name="tanggal_beli" id="tanggal_beli" value="<?php echo $hari_ini; ?>" class="easyui-validatebox" required="true" data-options="formatter:myformatter,parser:myparser">
			</div>
			<br/>
			<div class="fitem">
				<label>ID Supplier</label>
				<input name="id_supplier" style="text-transform:uppercase" autocomplete="off" id="id_supplier" class="easyui-validatebox" required="true" onkeyup="cek_supplier(this)">
				<span id='loaddiv'></span>
			</div>
			
			<div class="fitem">
				<label>Nama Supplier</label>
			  	<span class='boldred' id='namasp'><input name="nama_supplier" id="nama_supplier" required="true" size="30" readonly=""></span>
			</div>
			<br/>
		    <div class="fitem">
				<label>ID Barang</label>
				<input name="id_barang" id="fokus_barang" style="text-transform:uppercase" autocomplete="off" class="easyui-validatebox" required="true" onkeyup="cek_barangjual(this)">
				<span id='loaddiv2'></span>
			</div>
			<span class='boldred' id='namabrj'>
		    <div class="fitem">
				<label>Nama Barang</label>
			<input name="nama_barang" id="nama_barang" size="30" readonly="">
			</div>
            <div class="fitem">
				<label>Harga Beli</label>
		  	  	<input name="harga_jual" required="true" readonly="">
			</div>
			<div class="fitem">
				<label>Stok</label>
		  	  	<input name="stok" required="true" readonly="">
			</div></span>
			<br/>
			<div class="fitem">
				<label>Jumlah Beli</label>
		  	  	<input name="jumlah_beli" id="fokus_jumlah" autocomplete="off" required="true" onkeyup="hitung()&cek_isi(this)&totalstok()">
			</div>
			<div class="fitem">
				<label>Total Harga</label>
				<input type="text" name="total_harga" required="true" readonly="">
			</div>
			<div class="fitem">
				<label>Total Stok</label>
				<input type="text" name="total_stok" required="true" readonly="">
			</div>
			<br/>
			<hr>
			<input type="submit" value="Proses Transaksi" name="savedata" style="margin-top:10px;height:30px;cursor:pointer;" />
		</form>
	</div>
<?php
//simpan data		
if(!empty($_POST['savedata'])) {
	$idpjl= $idtransaksibeli;
	$tglbli=$_POST['tanggal_beli'];
	$tgl1=explode('-',$tglbli);
	$tanggalbli=$tgl1[2]."-".$tgl1[1]."-".$tgl1[0];	
	$idsp=$_POST['id_supplier'];
	$namasp=$_POST['nama_supplier'];
	$idbrg=$_POST['id_barang'];
	$namabrg=$_POST['nama_barang'];
	$hargabeli=$_POST['harga_jual'];
	$stok=$_POST['stok'];
	$jmhbeli=$_POST['jumlah_beli'];
	$totalhgr=$_POST['total_harga'];
	$totalstok=$_POST['total_stok'];

	if($idsp==''){
	echo "<script type='text/javascript'>alert('ID Supplier Harus Diisi ..!')</script>";
	}else if($namasp=='Tidak Ditemukan'){
	echo "<script type='text/javascript'>alert('Isi ID Supplier Dengan Benar ..!')</script>";
	}else if($idbrg==''){
	echo "<script type='text/javascript'>alert('ID Barang Harus Diisi ..!')</script>";
	}else if($namabrg=='Tidak Ditemukan'){
	echo "<script type='text/javascript'>alert('Isi ID Barang Dengan Benar ..!')</script>";
	}else if($jmhbeli==''){
	echo "<script type='text/javascript'>alert('Jumlah Beli Harus Diisi ..!')</script>";
	}else if($totalhgr=='Infinity' or $totalhgr=='NaN'){
	echo "<script type='text/javascript'>alert('Isi Jumlah Beli Dengan Benar ..!')</script>";
	}else{
	//input database		
 	$sql = "INSERT INTO pembelian(no,id_pembelian,tanggal_beli,id_supplier,nama_supplier,id_barang,nama_barang,harga_beli,jumlah_beli,total_harga)
			VALUES('$kodepembelian','$idpjl','$tanggalbli','$idsp','$namasp','$idbrg','$namabrg','$hargabeli','$jmhbeli','$totalhgr')";
	$hasil = mysql_query($sql);	   
	if ($hasil) {
		$que = "UPDATE `barang` SET `stok`='$totalstok' WHERE id_barang = '$idbrg'";
		$has = mysql_query($que);
		echo "<script type='text/javascript'>alert('Data Transaksi ".$idpjl." BERHASIL Disimpan')</script>";
	}else {
		echo "<script type='text/javascript'>alert('Data Transaksi ".$idpjl." GAGAL Disimpan')</script>";
	}
}	
} 
?>
</body>
</html>
