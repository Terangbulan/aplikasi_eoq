<?php
include('../../config/database.php');

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_pelanggan';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';

$offset = ($page-1) * $rows;

$where = " WHERE id_pelanggan LIKE '%$cari%' OR nama_pelanggan LIKE '%$cari%' OR alamat_pelanggan LIKE '%$cari%' OR kota_pelanggan LIKE '%$cari%' OR telp_pelanggan LIKE '%$cari%'";

$text = "SELECT * FROM pelanggan
	$where 
	ORDER BY $sort $order
	LIMIT $rows OFFSET $offset";

$result = array();
$result['total'] = mysql_num_rows(mysql_query("SELECT * FROM pelanggan $where"));
$row = array();	

$criteria = mysql_query($text);
while($data=mysql_fetch_array($criteria))
{	
	$row[] = array(
		'id_pelanggan'=>$data['id_pelanggan'],
		'nama_pelanggan'=>$data['nama_pelanggan'],
		'alamat_pelanggan'=>$data['alamat_pelanggan'],
		'kota_pelanggan'=>$data['kota_pelanggan'],
		'telp_pelanggan'=>$data['telp_pelanggan']
	);
}
$result=array_merge($result,array('rows'=>$row));
echo json_encode($result);
?>