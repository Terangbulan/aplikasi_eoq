<?php 
$id_user = $_REQUEST['id_user'];
$nama_user = $_REQUEST['nama_user'];
$email_user = $_REQUEST['email_user'];
$telp_user = $_REQUEST['telp_user'];
$pass = $_REQUEST['password'];
$level = $_REQUEST['level'];

include('../../config/database.php');

$sql = "UPDATE user SET nama_user='$nama_user',email_user='$email_user',telp_user='$telp_user',password='$pass',level='$level' WHERE id_user='$id_user'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>