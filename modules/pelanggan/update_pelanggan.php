<?php 
$id_pelanggan = $_REQUEST['id_pelanggan'];
$nama_pelanggan = $_REQUEST['nama_pelanggan'];
$alamat_pelanggan = $_REQUEST['alamat_pelanggan'];
$kota_pelanggan = $_REQUEST['kota_pelanggan'];
$telp_pelanggan = $_REQUEST['telp_pelanggan'];

include('../../config/database.php');

$sql = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan',alamat_pelanggan='$alamat_pelanggan',kota_pelanggan='$kota_pelanggan',telp_pelanggan='$telp_pelanggan' WHERE id_pelanggan='$id_pelanggan'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>