<?php
include 'config/database.php';
if(isset($_POST['datawp'])){
$idp=$_POST['datawp'];
	$sql =mysql_query("select * from pelanggan where id_pelanggan ='$idp'");
$d = mysql_fetch_array($sql);
$namax= $d['nama_pelanggan'];
	if($namax !='') {
	 	echo "<input name='nama_pelanggan' id='nama_pelanggan' class='easyui-validatebox' required='true' size='30' readonly='' value='$namax'/>";
	?>
		<script>
			document.getElementById('fokus_barang').focus();
		</script>
	<?php
	} else {
	 	echo "<input name='nama_pelanggan' id='nama_pelanggan' class='easyui-validatebox' required='true' size='30' readonly='' value='Tidak Ditemukan'/>";
	}		
}
?> 
