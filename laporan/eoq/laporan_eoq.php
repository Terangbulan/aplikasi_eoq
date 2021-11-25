<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan EOQ</title>

    <link rel="stylesheet" type="text/css" href="../../assets/js/jquery_easyui/themes/app/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../assets/js/jquery_easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../assets/js/jquery_easyui/themes/style.css" />
    <script type="text/javascript" src="../../assets/js/jquery_easyui/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery_easyui/jquery.easyui.min.js"></script>

    <script type="text/javascript">
        function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return (d<10?('0'+d):d)+'-'+(m<10?('0'+m):m)+'-'+y;
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var d = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var y = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
    </script>
</head>
<body>
    <h2>Laporan EOQ</h2>
    <div class="info"  style="margin-bottom:10px">
        <div class="tip icon-tip">&nbsp;</div>
        <div>Pilih periode tanggal laporan melalui datebox, lalu klik tombol pada datagrid toolbar untuk mencetak laporan.</div>
    </div>
    <div style="margin:10px 0;">
        <form action="laporan_eoq.php" id="fmFilter" method="post" novalidate>
            Tanggal Awal: 
            <input name="tgl_awal" class="easyui-datebox" id="tgl_awal" data-options="formatter:myformatter,parser:myparser" />
            Tanggal Akhir: 
            <input name="tgl_akhir" class="easyui-datebox" id="tgl_akhir" data-options="formatter:myformatter,parser:myparser" />
            <input type="submit"  name="button" id="button" value="OK" />
        </form>
    </div>
    <div id="tampil_lap_eoq">
        <table id="dg" title="Data EOQ" class="easyui-datagrid" style="height:auto;"
                url="tampil_lap_eoq.php?tgl_awal=<?php echo $_REQUEST['tgl_awal'] ?>&tgl_akhir=<?php echo $_REQUEST['tgl_akhir']; ?>";
                toolbar="#toolbar" rownumbers="true" fitColumns="true" singleSelect="true">
        		<thead>
        			<tr>
                        <th field="id_eoq" width="50">ID EOQ</th>
                        <th field="tanggal_eoq" width="50">Tanggal</th>
                        <th field="bulan" width="40">Bulan</th>
                        <th field="nama_barang" width="60">Nama Barang</th>
                        <th field="biaya_pesan" width="50">Biaya Pesan</th>
                        <th field="biaya_simpan" width="50">Biaya Simpan</th>
                        <th field="permintaan" width="40">Permintaan</th>
                        <th field="eoq" width="30">EOQ</th>
                        <th field="lead_time" width="35">Lead Time</th>
                        <th field="periode" width="30">Periode</th>
                        <th field="rop" width="30">ROP</th>
                        <th field="total_biaya" width="50">Total Biaya</th>
        			</tr>
        		</thead>
        </table>
        <div id="toolbar" style="padding:2px;height:30px;">
            <div style="float:left;">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true"
                    onclick="window.open('convert.php?tgl_awal=<?php echo $_POST['tgl_awal']; ?>&tgl_akhir=<?php echo $_POST['tgl_akhir']; ?>
                    ','Laporan EOQ','size=800,height=800,scrollbars=yes,resizeable=no')">Cetak</a>
            </div>
        </div>
    </div>
</body>
</html>
