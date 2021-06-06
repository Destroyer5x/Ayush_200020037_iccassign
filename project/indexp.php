<?php include('connectionp.php'); 


$comments=$fullname='';
$errors=array('fullname'=>'','comments'=>'');  

if(isset($_POST["submit"]))
{
		if(empty($_POST['fullname']))
	{
		$errors['fullname']="Full Name is reqd <br />";

	}else{
		$fullname=$_POST['fullname'];
	if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['fullname']))
	{
		$errors['fullname']= 'Enter valid full name';
	}}
	
	if(empty($_POST['comments']))
	{
		$errors['comments']="Comments are reqd <br />";

	
	}else{
		$comments=$_POST['comments'];
		

	}
	if(	array_filter($errors))
{}
else{
	$fullname=mysqli_real_escape_string($connec,$_POST['fullname']);
	$comments=mysqli_real_escape_string($connec,$_POST['comments']);

	$query="INSERT INTO `comments`(`fullname`,`comments`) VALUES('$fullname','$comments')";

	if(mysqli_query($connec,$query))
	{
		$que="SELECT MAX(`id`) FROM  `comments`";
		$sql=mysqli_query($connec,$que);
		$arrres=mysqli_fetch_all($sql);

 header('Location: approvep.php?id='.$arrres[0][0]);}
 else{
 	echo "Query Error: ".mysqli_error($connec);
 }
}
	



} ?>

<?php 
 if(isset($_POST['no']))
{
	$find_id=mysqli_real_escape_string($connec,$_POST['find_id']);
	$query="DELETE FROM comments WHERE id=$find_id";

	if(mysqli_query($connec,$query))
	{
		//success
		header('Location:indexp.php');
	}
	else
	{
		echo "query error: ".mysqli_error($connec);

	}
} ?>

<?php 
 $query= 'SELECT fullname, comments, id FROM comments ORDER BY created';
 
 $res=mysqli_query($connec, $query);

 
 $resarrs=mysqli_fetch_all($res,MYSQLI_ASSOC);

 mysqli_free_result($res);
 ?>


 










<html>
<?php 	include('headerp.php'); ?>
<section class="container">
	<h5 class="center">FORM</h5>
	<div>
		<style>
		form{
				padding: 10px;	
				max-width: 100px;	
				margin:10px}
			</style>
		<form class="container black-text" action="indexp.php" method="POST">
			
			<label class="black-text"><h6>Full Name</h6></label>
			<input type="text" name="fullname" value="<?php echo htmlspecialchars($fullname);?>">
			<div class="red-text"><?php echo $errors['fullname']; ?></div>
			<div class="purple-text">
				
				<ul><?php foreach($resarrs as $resarr){ ?>

					<li>
						<?php echo htmlspecialchars($resarr['fullname']).' - '.htmlspecialchars($resarr['comments']); 
					}?></li>
				</ul>
			</div>
			<label class="black-text"><h6>Add Comments</h6></label>
			<input type="text" name="comments" value="<?php echo htmlspecialchars($comments	);?>">
			<div class="red-text"><?php echo $errors['comments']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn">
			</div>
		</form>
		
	</div>
</section>
<?php 	include('footerp.php'); ?>



</html>