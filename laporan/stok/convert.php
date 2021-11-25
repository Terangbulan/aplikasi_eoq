<?php
session_start();
ob_start();
include('../../config/database.php');
include('../../config/config.php');

$hari_ini=date("d-m-Y");

$sql = mysql_query("SELECT * FROM barang ORDER BY id_barang ASC");
$num_rows=mysql_num_rows($sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Laporan Stok Barang</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
</head>
<body>
	<div id="logo">
		<img src="../../assets/images/logo_laporan.png" width="630" height="120">
	</div>
	<div id="title">
		<br>
		LAPORAN STOK BARANG
	</div>
	<div id="isi">
		<table width="100%" border="1" cellpadding="0" cellspacing="0">
			<tr class="tr-title">
			  	<td width="60" height="20" align="center" valign="middle">No.</td>
			    <td width="170" height="20" align="center" valign="middle">ID Barang</td>
			    <td width="250" height="20" align="center" valign="middle">Nama Barang</td>
			    <td width="120" height="20" align="center" valign="middle">Stok</td>
			</tr>
			<?php
				$total_stok=0;
				for($i=1; $i<=$num_rows; $i++){
				$rows=mysql_fetch_array($sql);
				$id_barang=$rows['id_barang'];
				$nama_barang=$rows['nama_barang'];
				$stok=$rows['stok'];
				$total_stok=$stok+$total_stok;
		  ?><tr>
                <td height="10" align="center" valign="middle"><?=$i?></td>
                <td height="10" align="center" valign="middle"><?=$id_barang?></td>
                <td height="10" valign="middle"><?=$nama_barang?></td>
                <td height="10" align="center" valign="middle"><?=$stok?></td>
            </tr>
				<?php } ?>
			<tr>
                <td height="13" colspan='3' align='center' valign="middle">Total</td>
                <td height="13" align="center" valign="middle"><?=$total_stok?></td>
            </tr>			
		</table>
		<div id="footer-tanggal">
             <?php echo kota_perusahaan; ?>, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
        </div>
        <div id="footer-nama">
             <?php echo nama_pimpinan; ?>
        </div>
        <div id="footer-jabatan">
             <?php echo jabatan; ?>
        </div>
	</div>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="Laporan Stok Barang.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
	$content = '<page style="font-family: freeserif">'.($content).'</page>';
	require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(20, 10, 10, 10));
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>