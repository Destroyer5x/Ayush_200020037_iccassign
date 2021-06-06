<?php 	 session_start();?>

<?php 	if(!isset($_SESSION['id']))
{
		header('Location: main.php');
} ?>
 
<?php 	include('connectionpp.php'); ?>

<?php 	
if($sql3="SELECT `int_id`,`int_name`,`int_detail` FROM `internshiplist` ")
{
$res3=mysqli_query($connection,$sql3);
$interns=mysqli_fetch_all($res3,MYSQLI_ASSOC);
}
else
{
	echo "query error: ".mysqli_error($connection);
}
?>




<html>
<?php include 'headerpp.php'; ?>
<div class="row container">
<h4 class="center">LIST OF INTERNSHIPS</h4>
<a class="btn right purple lighten-3" href="logout.php">Logout</a>
</div>

<div class="container">
	<div class="row">
		<?php foreach($interns as $intern){?>
		<div class="col s6 ">
			<div class="card ">
				<div class="card-content center">
					<h5><?php echo htmlspecialchars($intern['int_name']); ?></h5>
					<div><ul>
						<?php 	echo htmlspecialchars($intern['int_detail']); ?>
					</ul></div>
					<div class="card-action right-align">
<?php 	$sql6="SELECT `id`,`int_id`,`user_id` FROM `link` WHERE `int_id`={$intern['int_id']} AND `user_id`={$_SESSION['id']} "; ?>
<?php 
$res6=mysqli_query($connection,$sql6);
$resarr6=mysqli_fetch_all($res6,MYSQLI_ASSOC);
if(count($resarr6)>0)
	{ ?>
		<a class='btn black-text pink lighten-3' 
						    href="remlink.php?id=<?php 	echo htmlspecialchars($resarr6[0]['id']); ?>">Withdraw</a>
				<?php }
				else 
				{ ?>
				<a class='btn black-text pink lighten-1 ' 
						    href="link.php?id=<?php 	echo htmlspecialchars($intern['int_id']); ?>">Apply</a>
			<?php } ?>		    

						

					</div>

				</div>
			</div>
		</div><?php 	} ?>
	</div>
</div>
<?php include'footerpp.php' ?>






</html>
