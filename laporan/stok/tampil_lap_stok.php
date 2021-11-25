<?php
include('../../config/database.php');
$rs = mysql_query("SELECT COUNT(*) FROM barang");
$row = mysql_fetch_row($rs);
$rs = mysql_query("SELECT * FROM barang ORDER BY id_barang ASC");

$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result = array();
$result["rows"] = $items;
echo json_encode($result);
?>