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
 //-------------The code above it for sessions

  //get a file that has info on changes users have mode to there accont
  $fileName = "C:/xampp/data/UserChanges.txt";

  $readFile = fopen($fileName, "r") or die ("Unable to open a file");
  $text = [];
  
  while(!feof($readFile)){
	  $text [] = fgets($readFile);
  }

 ?>


	<div class="container bgColor">
        	<main role="main" class="pb-3">
			<h2 class="text-center">Audit Trail</h2>	
            <div class="card bg-dark text-white">
                <div class="card-body">
                <?php
                    for($i=0; $i<count($text); $i++){

                        echo $text[$i]."<br>";
                    }
                ?>
                </div>
            </div>

			
		</main>
	</div>
<?php include("../Footer.php"); ?>