<?php include('headerpp.php');?>
<?php include('connectionpp.php');?>
<?php 
$email=$password='';
$error=array('email'=>'','password'=>''); 
if(isset($_POST["login"]))
{
 $que3="SELECT `id`,`email`,`password` FROM `internship` WHERE `email`='{$_POST['email']}'";
 if($res1=mysqli_query($connection,$que3))
 {
 $resarr1=mysqli_fetch_all($res1,MYSQLI_ASSOC);
 if(count($resarr1)>0)
 {
 if($resarr1[0]['password']===	$_POST['password'])
 {
 	session_start();
 	$_SESSION['id']=$resarr1[0]['id'];
 	header('Location: list.php');
 }
 else{
 	$error['password']="Password does not match";

 }}
 else
 {
 	$error['email']="This account does not exists";
 }}
 else
 {
 	echo 'query error: '.mysqli_error($connection);
 }


} ?>



<div>
	<div class="center section">	
		<a href="signup.php" class="btn purple">Sign-Up</a>
	</div>
	<h5 class="center" >LOGIN</h5>
	
	
	<form class=" white container blue-text" action="#" method="POST">
		<style>
			form{
					border:10px;
					margin:100px auto;
					padding:70px;
				}
		</style>
		
		<label>Email-Id</label>
		<input type="text" name="email" >
		<div class="red-text"><?php echo htmlspecialchars($error['email']) ;?></div>
		<label>Password</label>
		<input type="text" name="password" >
		<div class="red-text"><?php echo htmlspecialchars($error['password']) ;?></div>
		<div class=" col center">
		<input type="submit" name="login" value="login" class="btn purple">
	</div>
	</form>
</div>
	<?php include('footerpp.php');?>
		