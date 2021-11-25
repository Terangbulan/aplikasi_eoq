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
	<div class="easyui-panel" title="Perhitungan EOQ" style="width:auto;padding: 20px 40px;">
		<form method="POST" name="pjl" novalidate>
		    <div class="fitem">
				<label>Tanggal</label>
			  	<input class="easyui-datebox" name="tanggal" id="tanggal_jual" class="easyui-validatebox" required="true" value="<?php echo $hari_ini; ?>" data-options="formatter:myformatter,parser:myparser">
			</div>
			<div class="fitem">
				<label>Bulan</label>
	            <select name="bulan" style="width:135px;" required="true">
	            	<option value="null">-- Pilih Bulan --</option>
					<option value="Januari">Januari</option>
		           	<option value="Februari">Februari</option>
		           	<option value="Maret">Maret</option>
		           	<option value="April">April</option>
		           	<option value="Mei">Mei</option>
		           	<option value="Juni">Juni</option>
		           	<option value="Juli">Juli</option>
		           	<option value="Agustus">Agustus</option>
		           	<option value="September">September</option>
		           	<option value="Oktober">Oktober</option>
		           	<option value="November">November</option>
		           	<option value="Desember">Desember</option>
	        	</select>
			</div>
			<br/>
		    <div class="fitem">
				<label>ID Barang</label>
				<input name="id_barang" id="id_barang" autocomplete="off" class="easyui-validatebox" style="text-transform:uppercase" required="true" onkeyup="cek_barangEOQ(this)">
			<span id='loaddiv'></span></div>
			<span class='boldred' id='namabrEOQ'>
		    <div class="fitem">
				<label>Nama Barang</label>
			  	<input name="nama_barang" size="30" readonly="">
			</div>
			<div class='fitem'>
				<label>Harga Beli</label>
			  	<input name="harga_beli" size="30" readonly="">
			</div>
            <div class="fitem">
				<label>Biaya Pesan</label>
		  	  	<input name="biaya_pesan" required="true" readonly="">
			</div>
			<div class="fitem">
				<label>Biaya Simpan</label>
		  	  	<input name="biaya_simpan" required="true" readonly="">
			</div>
			<div class="fitem">
				<label>Lead Time</label>
		  	  	<input name="lead_time" readonly="">
			</div>
			<br/>
			<div class="fitem">
				<label>Permintaan</label>
		  	  	<input name="permintaanbrg" class="easyui-validatebox" required="true" >
			</div></span>
			<div class="fitem">
				<label>EOQ</label>
		  	  	<input type="text" name="totaleoq" id="fokus_eoq" required="true" readonly="" onfocus="hitungeoq()">
			</div>
			<div class="fitem">
				<label>ROP</label>
		  	  	<input type="text" name="totalrop" required="true" readonly="">
			</div>
			<div class="fitem">
				<label>Total Biaya</label>
		  	  <input type="text" name="eoqtotal" required="true" readonly="">
			</div>
			<br/>
			<hr>
			<input type="submit" value="Simpan" name="savedata" style="margin-top:10px;height:30px;cursor:pointer;padding:0px 30px 0px 30px"; />
		</form>
	</div>
<?php
//simpan data		
if(!empty($_POST['savedata'])) {
	$tgl=$_POST['tanggal'];
	$tgl1=explode('-',$tgl);
	$tgl=$tgl1[2]."-".$tgl1[1]."-".$tgl1[0];	
	$bln=$_POST['bulan'];
	$idb=$_POST['id_barang'];
	$namab=$_POST['nama_barang'];
	$biayap=$_POST['biaya_pesan'];
	$biayas=$_POST['biaya_simpan'];
	$leadt=$_POST['lead_time'];
	$permint=$_POST['permintaanbrg'];
	$eoq=$_POST['totaleoq'];
	$rop=$_POST['totalrop'];
	$toteoq=$_POST['eoqtotal'];
	
	if($bln=='null'){
	echo "<script type='text/javascript'>alert('Pilih Bulan Terlebih Dahulu ..!')</script>";
	}else if($idb==''){
	echo "<script type='text/javascript'>alert('ID Barang Harus Diisi ..!')</script>";
	}else if($namab=='Tidak Ditemukan'){
	echo "<script type='text/javascript'>alert('Isi ID Barang Dengan Benar ..!')</script>";
	}else if($permint==''){
	echo "<script type='text/javascript'>alert('Permintaan Harus Diisi ..!')</script>";
	}else if($eoq=='Infinity' or $eoq=='NaN'){
	echo "<script type='text/javascript'>alert('isi Jumlah Permintaan Dengan Benar ..!')</script>";
	}else{
	//input database		
 	$sql = "INSERT INTO eoq(no,id_eoq,tanggal_eoq,bulan,id_barang,nama_barang,biaya_pesan,biaya_simpan,lead_time,permintaan,eoq,rop,total_biaya)
					 VALUES('$kodeeoq','$idtransaksieoq','$tgl','$bln','$idb','$namab','$biayap','$biayas','$leadt','$permint','$eoq','$rop','$toteoq')";
	$hasil = mysql_query($sql);

	if ($hasil){
		$sql_update_stok_min = "UPDATE `barang` SET `min_stok`='$rop' WHERE id_barang='$idb'";
		$hasil_stok = mysql_query($sql_update_stok_min);

		$sql_update_temp = "UPDATE `temp_penjualan` SET `jumlah`='0' WHERE id_barang='$idb'";
		$tampil_update_temp = mysql_query($sql_update_temp);
		
		echo "<script type='text/javascript'>alert('Data ".$idtransaksieoq." BERHASIL Disimpan')</script>";
	}else{
		echo "<script type='text/javascript'>alert('Data ".$idtransaksieoq." GAGAL Disimpan')</script>";
		//echo  "Input Data Nomor : ".$nomor." GAGAL". mysql_error();
	}
} 
} 

?>
</body>
</html>
