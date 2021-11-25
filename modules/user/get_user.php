<?php
include('../../config/database.php');

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_user';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';

$offset = ($page-1) * $rows;

$where = " WHERE id_user LIKE '%$cari%' OR nama_user LIKE '%$cari%' OR email_user LIKE '%$cari%' OR telp_user LIKE '%$cari%' OR level LIKE '%$cari%'";

$text = "SELECT * FROM user
	$where 
	ORDER BY $sort $order
	LIMIT $rows OFFSET $offset";

$result = array();
$result['total'] = mysql_num_rows(mysql_query("SELECT * FROM user $where"));
$row = array();	

$criteria = mysql_query($text);
while($data=mysql_fetch_array($criteria))
{	
	$row[] = array(
		'id_user'=>$data['id_user'],
		'nama_user'=>$data['nama_user'],
		'email_user'=>$data['email_user'],
		'telp_user'=>$data['telp_user'],
		'password'=>$data['password'],
		'level'=>$data['level']
	);
}
$result=array_merge($result,array('rows'=>$row));
echo json_encode($result);
?>