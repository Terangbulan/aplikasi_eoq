<?php
include 'config/database.php';
if(isset($_POST['databr'])){
$idbr=$_POST['databr'];
	$sql =mysql_query("select * from barang where id_barang ='$idbr'");
$d = mysql_fetch_array($sql);
$namab= $d['nama_barang'];
$hargab= $d['harga_jual'];
$stokb= $d['stok'];
	if($namab !=''){
	 	echo 	"<div class='fitem'>
					<label>Nama Barang</label>
					<input name='nama_barang' id='nama_barang' class='easyui-validatebox' required='true' size='30' readonly='' value='$namab'/>
				</div>
	            <div class='fitem'>
					<label>Harga</label>
			  	  	<input name='harga_beli' required='true' readonly='' value='$hargab'/>
				</div>
				<div class='fitem'>
					<label>Stok</label>
			  	  	<input name='stok' class='easyui-numberbox' required='true' readonly='' value='$stokb'/>
				</div>";
	?>
		<script>
			document.getElementById('fokus_jumlah').focus();
		</script>
	<?php
	} else {
	 	echo 	"<div class='fitem'>
					<label>Nama Barang</label>
					<input name='nama_barang' id='nama_barang' class='easyui-validatebox' required='true' size='30' readonly='' value='Tidak Ditemukan'/>
				</div>
	            <div class='fitem'>
					<label>Harga</label>
			  	  	<input name='harga_beli' required='true' readonly='' value='0'/>
				</div>
				<div class='fitem'>
					<label>Stok</label>
			  	  	<input name='stok' class='easyui-numberbox' required='true' readonly='' value='0'/>
				</div>";
	 }		
	 
}
?> 
