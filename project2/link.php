<?php 	session_start() ?>
<?php 	include 'connectionpp.php'; ?>
<?php 	
$sql5="INSERT INTO `link`(`int_id`,`user_id`) VALUES ({$_GET['id']},{$_SESSION['id']})";
if(mysqli_query($connection,$sql5))
{
    header('Location: list.php');
}
else
{
	echo 'Query error: '.mysqli_error($connection);
}
?>