<?php
error_reporting(0);
include 'config/database.php';
if(isset($_POST['databrEOQ'])){
$idbr=$_POST['databrEOQ'];
	$sql =mysql_query("select * from barang where id_barang ='$idbr'");
$d = mysql_fetch_array($sql);
$namab= $d['nama_barang'];
$hargabeli= $d['harga_beli'];
$biayap= $d['biaya_pesan'];
$biayas= $d['biaya_simpan'];
$leadt= $d['lead_time'];
$temp=mysql_query("select * from temp_penjualan where id_barang='$idbr'");
$tampiltemp=mysql_fetch_array($temp);
$jumlah=$tampiltemp['jumlah'];
	 if($namab !=''){
	 echo "<div class='fitem'>
				<label>Nama Barang</label>
			  	<input name='nama_barang' size='30' readonly='' value='$namab'>
			</div>
			<div class='fitem'>
				<label>Harga Beli</label>
			  	<input name='harga_beli' size='30' readonly='' value='$hargabeli'>
			</div>
            <div class='fitem'>
				<label>Biaya Pesan</label>
		  	  	<input name='biaya_pesan'  required='true' readonly='' value='$biayap'>
			</div>
			<div class='fitem'>
				<label>Biaya Simpan</label>
		  	  	<input name='biaya_simpan'  required='true' readonly='' value='$biayas'>
			</div>
			<div class='fitem'>
				<label>Lead Time</label>
		  	  	<input name='lead_time' required='true' readonly='' value='$leadt'>
			</div>
			<br/>
			<div class='fitem'>
				<label>Permintaan</label>
		  	  	<input name='permintaanbrg' class='easyui-validatebox' required='true' value='$jumlah'>
			</div>";
	?>
		<script>
			document.getElementById('fokus_eoq').focus();
		</script>
	<?php
	 }else{
	 echo "<div class='fitem'>
				<label>Nama Barang</label>
			  	<input name='nama_barang' size='30' readonly='' value='Tidak Ditemukan'>
			</div>
			<div class='fitem'>
				<label>Harga Beli</label>
			  	<input name='harga_beli' size='30' readonly='' value='0'>
			</div>
            <div class='fitem'>
				<label>Biaya Pesan</label>
		  	  	<input name='biaya_pesan' required='true' readonly='' value='0'>
			</div>
			<div class='fitem'>
				<label>Biaya Simpan</label>
		  	  	<input name='biaya_simpan'  required='true' readonly='' value='0'>
			</div>
			</div>
			<div class='fitem'>
				<label>Lead Time</label>
		  	  	<input name='lead_time' required='true' readonly='' value='0'>
			</div>
			<br/>
			<div class='fitem'>
				<label>Permintaan</label>
		  	  	<input name='permintaanbrg' class='easyui-validatebox' required='true' value='0'>
			</div>";
	 }		
	 
}
?> 
