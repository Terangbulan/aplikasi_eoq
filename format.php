<?php
error_reporting(0);
include 'config/database.php';
$konvhari=explode('-',$hari_ini);
$konvhari=$konvhari[1]."".date("y");
$sql1 =	"SELECT MAX(no) as kode FROM penjualan";
						$kod = mysql_query($sql1);
						$row = mysql_fetch_array($kod);
						$kode = $row['kode'];
						//echo $kode;
						$kode++;
						//echo $kode;
$que =	"SELECT MAX(no) as kodepbl FROM pembelian";
						$kod = mysql_query($que);
						$row = mysql_fetch_array($kod);
						$kodepembelian = $row['kodepbl'];
						//echo $kode;
						$kodepembelian++;
						//echo $kode;
$sql =	"SELECT MAX(no) as kodeeoq FROM eoq";
						$kod = mysql_query($sql);
						$row = mysql_fetch_array($kod);
						$kodeeoq = $row['kodeeoq'];
						//echo $kode;
						$kodeeoq++;
						//echo $kode;
function formatid($obj) {
$xx=strlen($obj);
if($xx == 1){
$obk = '000'.$obj;
return $obk;
}
else if ($xx == 2){
$obk ='00'.$obj;
return $obk;
}
else if ($xx == 3){
$obk ='0'.$obj;
return $obk;
}
else{
$obk =''.$obj;
return $obk;
	}
}
$idtransaksi="PJ".$konvhari."".formatid($kode);
$idtransaksibeli="PB".$konvhari."".formatid($kodepembelian);
$idtransaksieoq="EQ".formatid($kodeeoq);
?>