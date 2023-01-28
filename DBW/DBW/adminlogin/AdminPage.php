<?php require("../Navbars/AdminNavBar.php");
 include("sessionA.php");
 
 $path = "adminlogin.php"; //this path is to pass to checkSession function from session.php 
     
 session_start(); //must start a session in order to use session in this page.
 if (!isset($_SESSION['user'])){
     session_unset();
     session_destroy();
     header("Location:".$path);//return to the login page
 }
 $user = $_SESSION['user']; //this value is obtained from the login page when the user is verified
 checkSession ($path); //calling the function from session.php
 //-------------
 ?>
	<div class="container bgColor">
        	<main role="main" class="pb-3">
			<h2 class="text-center">Admin Page</h2>	
			
			
			
		</main>
	</div>
<?php include("../Footer.php"); ?>