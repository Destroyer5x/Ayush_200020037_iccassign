<?php 	session_start() ?>
<?php 	include 'connectionpp.php'; ?>
<?php 
$sql7="DELETE FROM `link` WHERE `id`={$_GET['id']} "; 
if(mysqli_query($connection,$sql7))
{
	header('Location: list.php');
}
else
{
	echo "Query error: ".mysqli_error($connection);
}
?>
