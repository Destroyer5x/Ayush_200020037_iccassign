<?php 	
 $connection= mysqli_connect('localhost','iitbombay','iitbombay1234','internship');
 //check connection
 if(!$connection)
 {
 	echo 'Connection error'.mysqli_connect_error();
 }
  ?>