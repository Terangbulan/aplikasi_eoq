<?php
$id_pelanggan = $_REQUEST['id_pelanggan'];

include('../../config/database.php');

$sql = "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>