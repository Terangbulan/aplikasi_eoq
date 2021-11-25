<?php 
$id_barang = $_REQUEST['id_barang'];
$nama_barang = $_REQUEST['nama_barang'];
$harga_beli = $_REQUEST['harga_beli'];
$harga_jual = $_REQUEST['harga_jual'];
$biaya_pesan = $_REQUEST['biaya_pesan'];
$biaya_simpan = $_REQUEST['biaya_simpan'];
$lead_time = $_REQUEST['lead_time'];
$stok = $_REQUEST['stok'];

include('../../config/database.php');

$sql = "UPDATE barang SET nama_barang='$nama_barang', harga_beli='$harga_beli', harga_jual='$harga_jual', biaya_pesan='$biaya_pesan', biaya_simpan='$biaya_simpan', lead_time='$lead_time', stok='$stok' WHERE id_barang='$id_barang'";
$result = @mysql_query($sql);
if ($result){
echo json_encode(array('success'=>true));
} else {
echo json_encode(array('msg'=>'Some errors occured.'));
}
?>