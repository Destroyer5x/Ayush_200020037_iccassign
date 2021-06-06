
 <?php include('connectionp.php'); ?>
<?php include('headerp.php'); 	 ?>
<div class="center">
	<h5>Do you want to approve the comment?</h5>
</div>
<div class="row container">
	<form class=" row container" method="POST" action="indexp.php">
		<input type="hidden" name="find_id" value="<?php echo $_GET['id'] ?>">
		<input type="submit" name="yes" value="yes" class= "btn cyan left">
		<input type="submit" name="no" value="no" class="btn cyan right"></input>
	</form>
</div>

