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

$sql = mysql_query("SELECT * FROM eoq WHERE tanggal_eoq BETWEEN '$tgl_indo_awal' AND '$tgl_indo_akhir'");
$num_rows=mysql_num_rows($sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan EOQ</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
</head>
<body>
    <div id="logo">
        <img src="../../assets/images/logo_laporan.png" width="700" height="120">
    </div>
    <div id="title"><br>
        LAPORAN PERHITUNGAN EOQ
    </div>
    <div id="isi">
        <div id="title-tanggal">
            Tanggal <?php echo "$tgl_awal s/d $tgl_akhir"; ?>
        </div>
        <table width="100%" border="1" cellpadding="0" cellspacing="0">
            <tr class="tr-title">
              	<td width="15" height="20" align="center" valign="middle">NO</td>
                <td width="45" height="20" align="center" valign="middle">ID EOQ</td>
                <td width="50" height="20" align="center" valign="middle">Tanggal</td>
                <td width="40" height="20" align="center" valign="middle">Bulan</td>
                <td width="80" height="20" align="center" valign="middle">Nama Barang</td>
                <td width="40" height="20" align="center" valign="middle">Biaya Pesan</td>
                <td width="40" height="20" align="center" valign="middle">Biaya Simpan</td>
                <td width="60" height="20" align="center" valign="middle">Permintaan</td>
                <td width="25" height="20" align="center" valign="middle">EOQ</td>
                <td width="40" height="20" align="center" valign="middle">Lead Time</td>
                <td width="50" height="20" align="center" valign="middle">Periode</td>
                <td width="25" height="20" align="center" valign="middle">ROP</td>
                <td width="80" height="20" align="center" valign="middle">Total Biaya</td>
            </tr>
            <?php
            	$total_seluruh=0;
            	for($i=1; $i<=$num_rows; $i++){
            	$rows=mysql_fetch_array($sql);
            	$id_eoq=$rows['id_eoq'];
            	$tanggal_eoq=$rows['tanggal_eoq'];
            	$bulan=$rows['bulan'];
            	$nama_barang=$rows['nama_barang'];
            	$biaya_pesan=$rows['biaya_pesan'];
            	$biaya_simpan=$rows['biaya_simpan'];
            	$permintaan=$rows['permintaan'];
            	$eoq=$rows['eoq'];
            	$lead_time=$rows['lead_time'];
            	$periode=$rows['periode'];
            	$rop=$rows['rop'];
            	$total_biaya=$rows['total_biaya'];
            	$total_seluruh=$total_biaya+$total_seluruh;

                $tgl3=explode('-',$tanggal_eoq);
                $tgl_indo_eoq=$tgl3[2]."-".$tgl3[1]."-".$tgl3[0];
            ?>	
            <tr>
                <td height="10" align="center" valign="middle"><?=$i?></td>
                <td height="10" align="center" valign="middle"><?=$id_eoq?></td>
                <td height="10" align="center" valign="middle"><?=$tgl_indo_eoq?></td>
                <td height="10" valign="middle"><?=$bulan?></td>
                <td height="10" valign="middle"><?=$nama_barang?></td>
                <td height="10" align="right" valign="middle"><?=$biaya_pesan?></td>
                <td height="10" align="right" valign="middle"><?=$biaya_simpan?></td>
                <td height="10" align="center" valign="middle"><?=$permintaan?></td>
                <td height="10" align="center" valign="middle"><?=$eoq?></td>
                <td height="10" align="center" valign="middle"><?=$lead_time?></td>
                <td height="10" align="center" valign="middle"><?=$periode?></td>
                <td height="10" align="center" valign="middle"><?=$rop?></td>
                <td height="10" align="right" valign="middle"><?=$total_biaya?></td>
            </tr>
            <?php } ?>
            <tr>
                <td height="13" colspan='12' align='center' valign="middle">Total</td>
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
$filename="Laporan EOQ.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
	$content = '<page style="font-family: freeserif">'.($content).'</page>';
	require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(9, 10, 10, 10));
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>