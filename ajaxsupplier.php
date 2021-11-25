<?php
include 'config/database.php';

if(isset($_POST['datasp'])) {
$ids=$_POST['datasp'];
	$sql =mysql_query("select * from supplier where id_supplier ='$ids'");
$d = mysql_fetch_array($sql);
$namas= $d['nama_supplier'];
	if($namas !='') {
		echo "<input name='nama_supplier' id='nama_supplier' required='true' size='30' readonly=''value='$namas' />";
	?>
		<script>
			document.getElementById('fokus_barang').focus();
		</script>
	<?php
	} else {
	 	echo "<input name='nama_supplier' id='nama_supplier' required='true' size='30' readonly=''value='Tidak Ditemukan'/>";
	}		
	 
}
?> 