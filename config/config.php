<?php
define( 'VALIDASI', 1 );
define("nama_aplikasi","Sistem Manajemen Distribusi & Pengendalian Persediaan Barang");
define("nama_perusahaan","KRANESIA GROUP");
define("alamat_perusahaan","Jl.Kradenan No.7 Maguwoharjo, Depok, Sleman, Yogyakarta");
define("kota_perusahaan", "Yogyakarta");
define("nama_pimpinan","Hario Wahyumurti");
define("jabatan", "Direktur");

// Konvesi yyyy-mm-dd -> dd-mm-yyyy dan memberi nama bulan
function tgl_eng_to_ind($tgl) {
	$tgl1=explode('-',$tgl);
	$kdbl=$tgl1[1];
	if($kdbl=='01')
	{
	$nbln='Januari';
	}
	else if ($kdbl=='02')
	{
	$nbln='Februari';
	}
	else if ($kdbl=='03')
	{
	$nbln='Maret';
	}
	else if ($kdbl=='04')
	{
	$nbln='April';
	}
	else if ($kdbl=='05')
	{
	$nbln='Mei';
	}	
	else if ($kdbl=='06')
	{
	$nbln='Juni';
	}
	else if ($kdbl=='07')
	{
	$nbln='Juli';
	}
	else if ($kdbl=='08')
	{
	$nbln='Agustus';
	}
	else if ($kdbl=='09')
	{
	$nbln='September';
	}
	else if ($kdbl=='10')
	{
	$nbln='Oktober';
	}
	else if ($kdbl=='11')
	{
	$nbln='November';
	}
	else if ($kdbl=='12')
	{
	$nbln='Desember';
	}
	else{
	$nbln='';
	}
	
	$tgl_ind=$tgl1[1]." ".$nbln." ".$tgl1[2];
	return $tgl_ind;
}
?>
