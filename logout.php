<?php 
    session_start();
	//include "classes/functions.php";
    //$Obj = new Employee();
       if(isset($_SESSION['authentic'])){
		 unset($_SESSION['uid']);
		 unset($_SESSION['user_name']);
		 unset($_SESSION['user_roll']);			  
		 header('location:index.php');
	  }
	?>
