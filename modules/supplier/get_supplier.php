<?php
include('../../config/database.php');

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_supplier';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';

$offset = ($page-1) * $rows;

$where = " WHERE id_supplier LIKE '%$cari%' OR nama_supplier LIKE '%$cari%' OR alamat_supplier LIKE '%$cari%' OR telp_supplier LIKE '%$cari%' OR kota_supplier LIKE '%$cari%' OR provinsi_supplier LIKE '%$cari%'";

$text = "SELECT * FROM supplier
	$where 
	ORDER BY $sort $order
	LIMIT $rows OFFSET $offset";

$result = array();
$result['total'] = mysql_num_rows(mysql_query("SELECT * FROM supplier $where"));
$row = array();	

$criteria = mysql_query($text);
while($data=mysql_fetch_array($criteria))
{	
	$row[] = array(
		'id_supplier'=>$data['id_supplier'],
		'nama_supplier'=>$data['nama_supplier'],
		'alamat_supplier'=>$data['alamat_supplier'],
		'telp_supplier'=>$data['telp_supplier'],
		'kota_supplier'=>$data['kota_supplier'],
		'provinsi_supplier'=>$data['provinsi_supplier']
	);
}
$result=array_merge($result,array('rows'=>$row));
echo json_encode($result);
?>