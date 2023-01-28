<?php require("../Navbars/UserNavBar.php");
 include("sessionB.php");
 
 $path = "UserLogin.php"; //this path is to pass to checkSession function from session.php 
     
 session_start(); //must start a session in order to use session in this page.
 if (!isset($_SESSION['user'])){
     session_unset();
     session_destroy();
     header("Location:".$path);//return to the login page
 }
 $user = $_SESSION['user']; //this value is obtained from the login page when the user is verified
 checkSession ($path); //calling the function from session.php
 //-------------
include_once("ViewUserSQL.php");
$user = Userinfo();  
 ?>

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View User</h2><br>
        <div class="row">
            <div class="col-10">
                <h>User ID</p>
                <p class="font-weight-bold"><?php echo $user[0][0]?></P>
                
                <h>First Name</h>
                <p class="font-weight-bold"><?php echo $user[0][1]?></P>

                <h>Last Name</h>
                <p class="font-weight-bold"><?php echo $user[0][2]?></P>

                <h>Date of Birth</h>
                <p class="font-weight-bold"><?php echo $user[0][4]?></P>

                <h>Post code</h>
                <p class="font-weight-bold"><?php echo $user[0][6]?></P>

                <h>Contact Number</h>
                <p class="font-weight-bold"><?php echo $user[0][7]?></P>

                <h>Product</h>
                <p class="font-weight-bold"><?php echo $user[0][8]?></P>

                <?php
                    if($user[0][9] == "New"):?>
                        <a class="btn btn-primary" href="UserUpdate.php?uid=<?php echo $user[0][0]; ?>">Update</a>
                 <?php endif; ?>   

            </div>
        </div>
   </main>
</div>


<?php require("../Footer.php");?>
