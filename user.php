<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Data User</title>
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/app/easyui.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/style.css">
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="assets/js/user.js"></script>
</head>

<body>
	<h2>Olah Data User</h2>
	<div class="info"  style="margin-bottom:10px">
		<div class="tip icon-tip">&nbsp;</div>
		<div>Klik tombol pada datagrid toolbar untuk melakukan perubahan data.</div>
	</div>
		
	<table id="dg" title="Data User" class="easyui-datagrid" style="width:auto; height: auto;"
			url="modules/user/get_user.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
	<thead>
		<tr>
			<th field="id_user" width="40" sortable="true">Username</th>
			<th field="nama_user" width="60" sortable="true">Nama Lengkap</th>
			<th field="email_user" width="50" sortable="true">Email</th>
			<th field="telp_user" width="30" sortable="true">Telepon</th>
			<th field="level" width="30" sortable="true">Level</th>
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
		<div class="ftitle">Informasi User</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>Username</label>
				<input name="id_user" id="id_user" autocomplete="off"  class="easyui-validatebox" required="true" size="30">
			</div>
			<div class="fitem">
				<label>Password</label>
				<input name="password" type="password"  class="easyui-validatebox" required="true" size="30">
			</div>
			<div class="fitem">
				<label>Nama Lengkap</label>
			    <input type="text" name="nama_user" autocomplete="off" class="easyui-validatebox" required="true" size="30">
			</div>
			<div class="fitem">
				<label>Email</label>
			  	<input name="email_user" class="easyui-validatebox" required="true" size="30">
			</div>
			<div class="fitem">
				<label>Telepon</label>
		  	  	<input name="telp_user" autocomplete="off" class="easyui-validatebox" required="true" maxlength="12">
			</div>
	        <div class="fitem">
	           	<label>Hak Akses</label>
	            <select name="level" style="width:135px;" required="true">
					<option value="admin">admin</option>
					<option value="pembelian">gudang</option>
					<option value="pembelian">pembelian</option>
		           	<option value="penjualan">penjualan</option>
		           	<option value="pimpinan">pimpinan</option>
	        	</select>
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