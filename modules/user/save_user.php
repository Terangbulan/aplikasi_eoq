<?php 
$id_user = $_REQUEST['id_user'];
$nama_user = $_REQUEST['nama_user'];
$email_user = $_REQUEST['email_user'];
$telp_user = $_REQUEST['telp_user'];
$pass = $_REQUEST['password'];
$level = $_REQUEST['level'];

include('../../config/database.php');

$sql = "INSERT INTO user(id_user,nama_user,email_user,telp_user,password,level) VALUES('$id_user','$nama_user','$email_user','$telp_user','$pass','$level')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>