
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Data Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/app/easyui.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/style.css">
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="assets/js/pelanggan.js"></script>
</head>

<body>
	<h2>Olah Data Pelanggan</h2>
	<div class="info"  style="margin-bottom:10px">
		<div class="tip icon-tip">&nbsp;</div>
		<div>Klik tombol pada datagrid toolbar untuk melakukan perubahan data.</div>
	</div>
		
	<table id="dg" title="Data Pelanggan" class="easyui-datagrid" style="width:auto; height: auto;"
			url="modules/pelanggan/get_pelanggan.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
	<thead>
		<tr>
			<th field="id_pelanggan" width="30" sortable="true">ID Pelanggan</th>
			<th field="nama_pelanggan" width="50" sortable="true">Nama Pelanggan</th>
			<th field="alamat_pelanggan" width="90" sortable="true">Alamat</th>
			<th field="telp_pelanggan" width="30" sortable="true">Telepon</th>
			<th field="kota_pelanggan" width="40" sortable="true">Kota</th>
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
       		<input id="cari" class="easyui-searchbox" data-options="prompt:'Cari Data User..',searcher:doSearch" style="width:200px"></input> 
		</div>
	</div>

	<!-- Dialog Form -->
	<div id="dlg" class="easyui-dialog" style="width:480px;height:auto;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Informasi Pelanggan</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>ID Pelanggan</label>
				<input name="id_pelanggan" id="id_pelanggan" autocomplete="off" class="easyui-validatebox" required="true">
			</div>
		    <div class="fitem">
				<label>Nama Pelanggan</label>
			  	<input name="nama_pelanggan" id="nama_pelanggan" autocomplete="off" class="easyui-validatebox" required="true" size="30">
			</div>
            <div class="fitem">
		  	  <label>Alamat Pelanggan</label>
                <textarea name="alamat_pelanggan" id="alamat_pelanggan" cols="15" rows="3" style="width:180px;" class="easyui-validatebox" required="true"></textarea>
		  	</div>
			<div class="fitem">
				<label>Telepon</label>
		  	  	<input name="telp_pelanggan" class="easyui-numberbox" autocomplete="off" class="easyui-validatebox" required="true" maxlength="12">
			</div>
		  	<div class="fitem">
				<label>Kota</label>
			  	<input name="kota_pelanggan" id="kota_pelanggan" autocomplete="off" class="easyui-validatebox" required="true" size="30">
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