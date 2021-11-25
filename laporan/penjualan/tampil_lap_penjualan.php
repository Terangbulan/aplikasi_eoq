<?php
include('../../config/database.php');

$tgl_awal = $_REQUEST['tgl_awal'];
$tgl_akhir = $_REQUEST['tgl_akhir'];

$tgl1=explode('-',$tgl_awal);
$tgl_indo_awal=$tgl1[2]."-".$tgl1[1]."-".$tgl1[0];

$tgl2=explode('-',$tgl_akhir);
$tgl_indo_akhir=$tgl2[2]."-".$tgl2[1]."-".$tgl2[0];

$rs = mysql_query("SELECT COUNT(*) FROM penjualan");
$row = mysql_fetch_row($rs);
$result = array();
$result["total"] = $row[0];
$rs = mysql_query("SELECT * FROM penjualan WHERE tanggal_jual BETWEEN '$tgl_indo_awal' AND '$tgl_indo_akhir'");
$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;
echo json_encode($result);
?>