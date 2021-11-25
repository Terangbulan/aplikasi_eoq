<?php
session_start();
?>
<?php if ($_SESSION[level]=='pembelian'){ ?>
	<div class="navigasi">
		<div style="width:200px;height:auto;padding:5px;float:left; margin-right:10px;background:#F2F2F2;">
			<div class="easyui-panel" title="DATA MASTER" collapsible="true" style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-box-fill" plain="true" onClick="addTab('Data Barang','barang.php')">Data Barang</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-supplier" plain="true" onClick="addTab('Data Supplier','supplier.php')">Data Supplier</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="TRANSAKSI" collapsible="true" style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-trolly" plain="true" onClick="addTab('Pembelian','pembelian.php')">Pembelian</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="LAPORAN" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-report1" plain="true" onClick="addTab('Laporan Stok Barang','laporan/stok/laporan_stok.php')">Stok Barang</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report1" plain="true" onClick="addTab('Laporan Pembelian','laporan/pembelian/laporan_pembelian.php')">Pembelian</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report4" plain="true" onClick="addTab('Laporan EOQ','laporan/eoq/laporan_eoq.php')">EOQ</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="SYSTEM" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="logout.php" class="easyui-linkbutton" iconCls="icon-user" plain="true">Logout</a><br />
			</div>
		</div>
	</div>
<?php } 
if ($_SESSION[level]=='penjualan'){ ?>
	<div class="navigasi">
		<div style="width:200px;height:auto;padding:5px;float:left; margin-right:10px;background:#F2F2F2;">
			<div class="easyui-panel" title="DATA MASTER" collapsible="true" style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-customer" plain="true" onClick="addTab('Data Pelanggan','pelanggan.php')">Data Pelanggan</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="TRANSAKSI" collapsible="true" style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-truck" plain="true" onClick="addTab('Penjualan','penjualan.php')">Penjualan</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="LAPORAN" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-report1" plain="true" onClick="addTab('Laporan Stok Barang','laporan/stok/laporan_stok.php')">Stok Barang</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report3" plain="true" onClick="addTab('Laporan Penjualan','laporan/penjualan/laporan_penjualan.php')">Penjualan</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="SYSTEM" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="logout.php" class="easyui-linkbutton" iconCls="icon-user" plain="true">Logout</a><br />
			</div>
		</div>
	</div>
<?php } 
if ($_SESSION[level]=='gudang'){ ?>
	<div class="navigasi">
		<div style="width:200px;height:auto;padding:5px;float:left; margin-right:10px;background:#F2F2F2;">
			<div class="easyui-panel" title="PERHITUNGAN" collapsible="true" style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-report2" plain="true" onClick="addTab('Perhitungan EOQ','perhitungan_eoq.php')">Perhitungan EOQ</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="LAPORAN" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-report1" plain="true" onClick="addTab('Laporan Stok Barang','laporan/stok/laporan_stok.php')">Stok Barang</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report4" plain="true" onClick="addTab('Laporan EOQ','laporan/eoq/laporan_eoq.php')">EOQ</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="SYSTEM" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="logout.php" class="easyui-linkbutton" iconCls="icon-user" plain="true">Logout</a><br />
			</div>
		</div>
	</div>
<?php }
if ($_SESSION[level]=='admin'){ ?>
	<div class="navigasi">
		<div style="width:200px;height:auto;padding:5px;float:left; margin-right:10px;background:#F2F2F2;">
			<div class="easyui-panel" title="DATA MASTER" collapsible="true" style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-box-fill" plain="true" onClick="addTab('Data Barang','barang.php')">Data Barang</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-customer" plain="true" onClick="addTab('Data Pelanggan','pelanggan.php')">Data Pelanggan</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-supplier" plain="true" onClick="addTab('Data Supplier','supplier.php')">Data Supplier</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="TRANSAKSI" collapsible="true" style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-trolly" plain="true" onClick="addTab('Pembelian','pembelian.php')">Pembelian</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-truck" plain="true" onClick="addTab('Penjualan','penjualan.php')">Penjualan</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="PERHITUNGAN" collapsible="true" style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-report2" plain="true" onClick="addTab('Perhitungan EOQ','perhitungan_eoq.php')">Perhitungan EOQ</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="LAPORAN" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-report1" plain="true" onClick="addTab('Laporan Stok Barang','laporan/stok/laporan_stok.php')">Stok Barang</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report1" plain="true" onClick="addTab('Laporan Pembelian','laporan/pembelian/laporan_pembelian.php')">Pembelian</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report3" plain="true" onClick="addTab('Laporan Penjualan','laporan/penjualan/laporan_penjualan.php')">Penjualan</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report4" plain="true" onClick="addTab('Laporan EOQ','laporan/eoq/laporan_eoq.php')">EOQ</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="MANAJEMEN USER" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-user" plain="true" onClick="addTab('Data User','user.php')">Data User</a><br />
				<a href="logout.php" class="easyui-linkbutton" iconCls="icon-user" plain="true">Logout</a><br />
			</div>
		</div>
	</div>
<?php }
if ($_SESSION[level]=='pimpinan'){ ?>
	<div class="navigasi">
		<div style="width:200px;height:auto;padding:5px;float:left; margin-right:10px;background:#F2F2F2;">
			<div class="easyui-panel" title="LAPORAN" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="#" class="easyui-linkbutton" iconCls="icon-report1" plain="true" onClick="addTab('Laporan Stok Barang','laporan/stok/laporan_stok.php')">Stok Barang</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report1" plain="true" onClick="addTab('Laporan Pembelian','laporan/pembelian/laporan_pembelian.php')">Pembelian</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report3" plain="true" onClick="addTab('Laporan Penjualan','laporan/penjualan/laporan_penjualan.php')">Penjualan</a><br />
				<a href="#" class="easyui-linkbutton" iconCls="icon-report4" plain="true" onClick="addTab('Laporan EOQ','laporan/eoq/laporan_eoq.php')">EOQ</a><br />
			</div>
			<br/>
			<div class="easyui-panel" title="SYSTEM" collapsible="true"  style="width:200px;height:auto;padding:10px;">
				<a href="logout.php" class="easyui-linkbutton" iconCls="icon-user" plain="true">Logout</a><br />
			</div>
		</div>
	</div>
<?php
}
?>