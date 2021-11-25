<?php 
$id_pelanggan = $_REQUEST['id_pelanggan'];
$nama_pelanggan = $_REQUEST['nama_pelanggan'];
$alamat_pelanggan = $_REQUEST['alamat_pelanggan'];
$kota_pelanggan = $_REQUEST['kota_pelanggan'];
$telp_pelanggan = $_REQUEST['telp_pelanggan'];

include('../../config/database.php');

$sql = "INSERT INTO pelanggan(id_pelanggan,nama_pelanggan,alamat_pelanggan,kota_pelanggan,telp_pelanggan) VALUES('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan','$kota_pelanggan','$telp_pelanggan')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>