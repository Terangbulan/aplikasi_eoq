<?php
session_start();
?>
<?php if ($_SESSION[level]=='pembelian'||$_SESSION[level]=='penjualan'||$_SESSION[level]=='admin'||$_SESSION[level]=='gudang'){ ?>
	<div class="isi">
		<div id="tt" class="easyui-tabs" style="height:600px;">
			<div title="Home" style="padding-top:20px; margin-left:20px; background-image:url(assets/images/bg1.jpg); background-repeat:no-repeat;background-color:#fff;">
				<h2>Selamat Datang <?php echo $_SESSION[nama];?> </h2>
				<br/>
				<br/>
				<h2 style="font: 17px sans-serif;"><?php echo nama_aplikasi;?></h2>
				<h2 style="font: 18px sans-serif;"><?php echo nama_perusahaan;?></h2>
				<h2 style="font: 15px sans-serif;"><?php echo alamat_perusahaan;?></h2>
				<br/>
				<br/>
				<p>Data Persediaan Barang telah mencapai batas minimum</p>
				<br/>

				<table id="dg" title="Data Barang" class="easyui-datagrid" style="width:500px; height: auto;"
						url="modules/barang/get_stok_min.php"
						rownumbers="true" fitColumns="true"
						pagination="true" singleSelect="true">
					<thead>
						<tr>
							<th field="id_barang" width="30" sortable="true">ID Barang</th>
							<th field="nama_barang" width="60" sortable="true">Nama Barang</th>
							<th field="min_stok" width="30" align="center" sortable="true">Stok Minimal</th>
			                <th field="stok" width="30" align="center" sortable="true">Stok</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
<?php }
if ($_SESSION[level]=='pimpinan'){ ?>
	<div class="isi">
		<div id="tt" class="easyui-tabs" style="height:600px;">
			<div title="Home" style="padding-top:20px; margin-left:20px; background-image:url(assets/images/bg1.jpg); background-repeat:no-repeat;background-color:#fff;">
				<h2>Selamat Datang <?php echo $_SESSION[nama];?> </h2>
				<br/>
				<br/>
				<h2 style="font: 17px sans-serif;"><?php echo nama_aplikasi;?></h2>
				<h2 style="font: 18px sans-serif;"><?php echo nama_perusahaan;?></h2>
				<h2 style="font: 15px sans-serif;"><?php echo alamat_perusahaan;?></h2>
			</div>
		</div>
	</div>
<?php } ?>