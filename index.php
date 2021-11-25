<?php 
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
session_start();
include('config/database.php'); 
include('config/config.php');

if (!empty($_POST[submit])){


$perintah_query=mysql_query(" SELECT * 
FROM user
WHERE id_user = '$_POST[username]'
AND password = '$_POST[password]' "); 
	if($hasil_cek=mysql_num_rows($perintah_query))
	{
	//sukess
	$datauser=mysql_fetch_array($perintah_query);
	$_SESSION[user] = $_POST[username];
	$_SESSION[nama] = $datauser[nama_user];
	$_SESSION[level] = $datauser[level];
	echo $_SESSION[level];

    header("Location: index.php");
	} else 
	{   
// gagal login
    header("Location: index.php?err=yes");

	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sistem Pengendalian Persediaan</title>
	<link rel="shortcut icon" href="assets/images/logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/app.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css" />
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/app/easyui.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery_easyui/themes/panel.css" />
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery_easyui/jquery.easyui.min.js"></script>
	<script>
	function addTab(title, url){
			if ($('#tt').tabs('exists', title)){
				$('#tt').tabs('select', title);
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
			}
		}
	</script>
</head>

<body>
	<div class="header">
		<div class="site-header">
			<a class="header-title" href="#"><img src="assets/images/logo.png">Sistem Pengendalian Persediaan Barang Metode EOQ</a>
		</div>
	</div>

	
<?php
if (empty($_SESSION[user])) { ?>
	<div class="lg-container">
		<h1>
			<img src="assets/images/login.png">
		</h1>
		<form action="index.php" id="lg-form" name="lg-form" method="post">	
			<div>
				<input type="text" name="username" size="20" placeholder="username" autocomplete="off" required="true" />
			</div>
				
			<div>
				<input type="password" name="password" size="20" placeholder="password" required="true" />
			</div>
				
			<div>				
				<button type="submit" name="submit" value="Login">Login</button>
			</div>
		</form>
	</div>
<?php
} else { 
	include('menu.php');
	include('content.php');
} 
if (!empty($_GET[err])){ ?>
	<p align="center"><font color="red"><b>Gagal Login .. !!<br/>Cek Username dan Password</b></font></p>
<?php } ?>
</body>
</html>