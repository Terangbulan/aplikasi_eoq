
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Data Barang</title>
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/app/easyui.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/style.css">
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="assets/js/barang.js"></script>
	<script type="text/javascript" src="viewpelanggan.js"></script>
</head>

<body>
	<h2>Olah Data Barang</h2>
	<div class="info"  style="margin-bottom:10px">
		<div class="tip icon-tip">&nbsp;</div>
		<div>Klik tombol pada datagrid toolbar untuk melakukan perubahan data.</div>
	</div>
	<table id="dg" title="Data Barang" class="easyui-datagrid" style="width:auto; height: auto;"
			url="modules/barang/get_barang.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="id_barang" width="50" sortable="true">ID Barang</th>
				<th field="nama_barang" width="90" sortable="true">Nama Barang</th>
				<th field="harga_beli" width="50" align="right" sortable="true">Harga Beli</th>
                <th field="harga_jual" width="50" align="right" sortable="true">Harga Jual</th>
                <th field="biaya_pesan" width="50" align="right" sortable="true">Biaya Pesan</th>
                <th field="biaya_simpan" width="50" align="right" sortable="true">Biaya Simpan</th>
                <th field="lead_time" width="30" align="center" sortable="true">Lead Time</th>
                <th field="stok" width="30" align="center" sortable="true">Stok</th>
			</tr>
		</thead>
	</table>
	<div id="toolbar" style="padding:2px;height:30px;">
		<div style="float:left;">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newData()">Data Baru</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editData()">Edit Data</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeData()">Hapus Data</a>
		</div>
		<div style="float:right;margin:3px;">
       		<input id="cari" class="easyui-searchbox" data-options="prompt:'Cari Data Barang..',searcher:doSearch" style="width:200px"></input> 
		</div>
	</div>

	<!-- Dialog Form -->
	<div id="dlg" class="easyui-dialog" style="width:480px;height:auto;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Informasi Barang</div>
		<form id="fm" method="POST" name="barang" novalidate>
			<div class="fitem">
				<label>ID Barang</label>
			  	<input name="id_barang" id="id_barang" autocomplete="off" class="easyui-validatebox" required="true">
			</div>
		    <div class="fitem">
				<label>Nama Barang</label>
			  	<input name="nama_barang" id="nama_barang" autocomplete="off" class="easyui-validatebox" required="true" size="30">
			</div>
            <div class="fitem">
				<label>Harga Beli</label>
		  	  	<input name="harga_beli" autocomplete="off" required="true" onkeyup="hitungbiayasimpan()">
			</div>
            <div class="fitem">
				<label>Harga Jual</label>
		  	  	<input name="harga_jual" autocomplete="off" class="easyui-numberbox" required="true">
			</div>
			<div class="fitem">
				<label>Jumlah</label>
		  	  	<input name="stok" autocomplete="off" class="easyui-numberbox" required="true">
			</div>
			<div class="fitem">
				<label>Biaya Pesan</label>
		  	  	<input name="biaya_pesan" autocomplete="off" class="easyui-numberbox" required="true">
			</div>
			<div class="fitem">
				<label>Biaya Simpan</label>
		  	  	<input type="text" autocomplete="off" name="biaya_simpan" required="true" readonly="">
			</div>
			<div class="fitem">
				<label>Lead Time</label>
		  	  	<input name="lead_time" autocomplete="off" class="easyui-numberbox" required="true">
			</div>
		</form>
	</div>

	<!-- Dialog Button -->
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" onclick="saveData()">Simpan</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Batal</a>
	</div>
</body>
</html>