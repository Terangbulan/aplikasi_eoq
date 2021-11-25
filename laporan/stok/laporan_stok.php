<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Stok Barang</title>

    <link rel="stylesheet" type="text/css" href="../../assets/js/jquery_easyui/themes/app/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../assets/js/jquery_easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../../assets/js/jquery_easyui/themes/style.css" />
    <script type="text/javascript" src="../../assets/js/jquery_easyui/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery_easyui/jquery.easyui.min.js"></script>
</head>
<body>
    <h2>Laporan Stok Barang</h2>
    <div class="info"  style="margin-bottom:10px">
        <div class="tip icon-tip">&nbsp;</div>
        <div>Klik tombol pada datagrid toolbar untuk mencetak laporan.</div>
    </div>
    <div id="tampil_lap_stok">
        <table id="dg" title="Data Stok Barang" class="easyui-datagrid" style="height:auto;"
                url="tampil_lap_stok.php" toolbar="#toolbar"
                rownumbers="true" fitColumns="true" singleSelect="true">
        		<thead>
        			<tr>
        		      <th field="id_barang" width="50">ID Barang</th>
        		      <th field="nama_barang" width="70">Nama Barang</th>
                      <th field="stok" width="20">Stok</th>
        			</tr>
        		</thead>
        </table>
        <div id="toolbar" style="padding:2px;height:30px;">
            <div style="float:left;">
                <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="window.open('convert.php','Laporan Stok Barang','size=800,height=800,scrollbars=yes,resizeable=no')">Cetak</a>
            </div>
        </div>
    </div>
</body>
</html>
