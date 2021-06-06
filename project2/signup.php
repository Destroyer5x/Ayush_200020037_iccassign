
<?php include('headerpp.php');?>
<?php include('connectionpp.php');?>

<?php
$name=$email=$password='';
$errors=array('email'=>'','name'=>'','password'=>''); 


if(isset($_POST["signup"])){


	if(empty($_POST['email']))
	{
		$errors['email']="Email is required ";

	}
else
{
	$email=$_POST['email'];
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$errors['email']= "Please enter Valid Email-Id";
	}
	$que1="SELECT `id` FROM `internship` WHERE `email`={$_POST['email']}";
	if($res=mysqli_query($connection,$que1))
	{
		$resarr=mysqli_fetch_all($res);
		if(count($resarr)>0)
		{
			$errors['email']="The user has aldready an account";
		}
	}
	else
	{
		echo "Query error: ".mysqli_error($connection);
	}
}




if(empty($_POST['name']))
	{
		$errors['name']="Full name is required  ";

	}
	else{
		$name=$_POST['name'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['name']))
	{
		$errors['name']= 'Enter proper Full name';
	}}




if(empty($_POST['password']))
	{
		$errors['password']="Password is required ";

	}
	else{
		$password=$_POST['password'];
		}
	
	if(array_filter($errors)){}
	else
	{
		$name=mysqli_real_escape_string($connection,$_POST['name']);
		$email=mysqli_real_escape_string($connection,$_POST['email']);
		$password=mysqli_real_escape_string($connection,$_POST['password']);
		$que2="INSERT INTO `internship`(`name`,`email`,`password`) VALUES('$name','$email','$password')";

	if(mysqli_query($connection,$que2))
		{
			$que4="SELECT MAX(`id`) FROM `internship`";
			$res=mysqli_query($connection,$que4);
			$resq=mysqli_fetch_all($res);
			session_start();
 	$_SESSION['id']=$resarr1[0][0];
		
			header('Location: loginform	.php'); }
	else{
		echo 'query error'.mysqli_error($connection);
	}
	}	}






  ?>



<div>
	<div class="center section">	
		<a href="loginform.php" class="btn purple">Login</a>
	</div>
	<h5 class="center" >SIGN-UP</h5>
	<form class=" white container blue-text" action="#" method="POST">
		<style>
			form{
					border:10px;
					margin:100px auto;
					padding:70px;
				}
		</style>
		<label>Full name</label>
		<input type="text" name="name" >
		<div class="red-text"><?php echo htmlspecialchars($errors['name']); ?></div>
		<label>Email-Id</label>
		<input type="text" name="email" >
		<div class="red-text"><?php echo htmlspecialchars($errors['email']); ?></div>
		<label>Password</label>
		<input type="text" name="password" >
		<div class="red-text"><?php echo htmlspecialchars($errors['password']); ?></div>

		<div class=" col center">
		<input type="submit" name="signup" value="signup" class="btn purple">
	</div>
	</form>
	<?php include('footerpp.php');?>
		