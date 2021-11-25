<?php
include('../../config/database.php');

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_barang';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';

$offset = ($page-1) * $rows;

$where = " WHERE id_barang LIKE '%$cari%' OR nama_barang LIKE '%$cari%'";

$text = "SELECT * FROM barang
	$where 
	ORDER BY $sort $order
	LIMIT $rows OFFSET $offset";

$result = array();
$result['total'] = mysql_num_rows(mysql_query("SELECT * FROM barang $where"));
$row = array();	

$criteria = mysql_query($text);
while($data=mysql_fetch_array($criteria))
{	
	$row[] = array(
		'id_barang'=>$data['id_barang'],
		'nama_barang'=>$data['nama_barang'],
		'harga_beli'=>$data['harga_beli'],
		'harga_jual'=>$data['harga_jual'],
		'biaya_pesan'=>$data['biaya_pesan'],
		'biaya_simpan'=>$data['biaya_simpan'],
		'lead_time'=>$data['lead_time'],
		'min_stok'=>$data['min_stok'],
		'stok'=>$data['stok']
	);
}
$result=array_merge($result,array('rows'=>$row));
echo json_encode($result);
?>