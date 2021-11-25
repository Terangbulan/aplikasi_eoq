<?php 
$id_supplier = $_REQUEST['id_supplier'];
$nama_supplier = $_REQUEST['nama_supplier'];
$alamat_supplier = $_REQUEST['alamat_supplier'];
$kota_supplier = $_REQUEST['kota_supplier'];
$provinsi_supplier = $_REQUEST['provinsi_supplier'];
$telp_supplier = $_REQUEST['telp_supplier'];

include('../../config/database.php');

$sql = "UPDATE supplier SET nama_supplier='$nama_supplier', alamat_supplier='$alamat_supplier', kota_supplier='$kota_supplier', provinsi_supplier='$provinsi_supplier', telp_supplier='$telp_supplier' WHERE id_supplier='$id_supplier'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>