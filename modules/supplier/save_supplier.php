<?php 
$id_supplier = $_REQUEST['id_supplier'];
$nama_supplier = $_REQUEST['nama_supplier'];
$alamat_supplier = $_REQUEST['alamat_supplier'];
$kota_supplier = $_REQUEST['kota_supplier'];
$provinsi_supplier = $_REQUEST['provinsi_supplier'];
$telp_supplier = $_REQUEST['telp_supplier'];

include('../../config/database.php');

$sql = "INSERT INTO supplier(id_supplier,nama_supplier,alamat_supplier,kota_supplier,provinsi_supplier,telp_supplier) VALUES('$id_supplier','$nama_supplier','$alamat_supplier','$kota_supplier','$provinsi_supplier','$telp_supplier')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}