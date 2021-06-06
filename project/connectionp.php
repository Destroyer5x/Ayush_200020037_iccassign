
<?php 	
 $connec= mysqli_connect('localhost','iitbombay','iitbombay1234','comments');
 //check connection
 if(!$connec)
 {
 	echo 'Connection error'.mysqli_connect_error();
 }
  ?>