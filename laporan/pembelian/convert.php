<?php
session_start();
ob_start();
include('../../config/database.php');
include('../../config/config.php');

$hari_ini=date("d-m-Y");

$tgl_awal=$_GET['tgl_awal'];
$tgl_akhir=$_GET['tgl_akhir'];

$tgl1=explode('-',$tgl_awal);
$tgl_indo_awal=$tgl1[2]."-".$tgl1[1]."-".$tgl1[0];

$tgl2=explode('-',$tgl_akhir);
$tgl_indo_akhir=$tgl2[2]."-".$tgl2[1]."-".$tgl2[0];

$sql = mysql_query("SELECT * FROM pembelian WHERE tanggal_beli BETWEEN '$tgl_indo_awal' AND '$tgl_indo_akhir'");
$num_rows=mysql_num_rows($sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan Pembelian</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
</head>
<body>
    <div id="logo">
        <img src="../../assets/images/logo_laporan.png" width="630" height="120">
    </div>
    <div id="title"><br>
        LAPORAN PEMBELIAN BARANG
    </div>
    <div id="isi">
        <div id="title-tanggal">
            Tanggal <?php echo "$tgl_awal s/d $tgl_akhir"; ?>
        </div>
        <table width="100%" border="1" cellpadding="0" cellspacing="0">
            <tr class="tr-title">
              	<td width="20" height="20" align="center" valign="middle">NO</td>
                <td width="80" height="20" align="center" valign="middle">ID Transaksi</td>
                <td width="70" height="20" align="center" valign="middle">Tanggal</td>
                <td width="90" height="20" align="center" valign="middle">Supplier</td>
                <td width="90" height="20" align="center" valign="middle">Nama Barang</td>
                <td width="90" height="20" align="center" valign="middle">Harga Barang</td>
                <td width="50" height="20" align="center" valign="middle">jumlah</td>
                <td width="80" height="20" align="center" valign="middle">Total Harga</td>
            </tr>
            <?php
            	$total_seluruh=0;
            	for($i=1; $i<=$num_rows; $i++){
            	$rows=mysql_fetch_array($sql);
            	$id_pembelian=$rows['id_pembelian'];
            	$tanggal_beli=$rows['tanggal_beli'];
            	$nama_supplier=$rows['nama_supplier'];
            	$nama_barang=$rows['nama_barang'];
            	$harga_beli=$rows['harga_beli'];
            	$jumlah_beli=$rows['jumlah_beli'];
            	$total_harga=$rows['total_harga'];
            	$total_seluruh=$total_harga+$total_seluruh;

                $tgl3=explode('-',$tanggal_beli);
                $tgl_indo_beli=$tgl3[2]."-".$tgl3[1]."-".$tgl3[0];
            ?>	
            <tr>
                <td height="10" align="center" valign="middle"><?=$i?></td>
                <td height="10" align="center" valign="middle"><?=$id_pembelian?></td>
                <td height="10" align="center" valign="middle"><?=$tgl_indo_beli?></td>
                <td height="10" valign="middle"><?=$nama_supplier?></td>
                <td height="10" valign="middle"><?=$nama_barang?></td>
                <td height="10" align="right" valign="middle"><?=$harga_beli?></td>
                <td height="10" align="center" valign="middle"><?=$jumlah_beli?></td>
                <td height="10" align="right"valign="middle"><?=$total_harga?></td>
            </tr>
            <?php } ?>
            <tr>
                <td height="13" colspan='7' align='center' valign="middle">TOTAL</td>
                <td height="13" align="right" valign="middle"><?=$total_seluruh?></td>
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
$filename="Laporan Pembelian.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
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