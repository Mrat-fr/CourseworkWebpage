<?php require("../Navbars/NavBar.php"); 
require_once("adminloginSQL.php");

$nameErr = $pwderr = $invalidMesg = "";

if (isset($_POST['submit'])) {
    
    if ($_POST["Uname"]==null) {
        $nameErr = "Username is required";
      } 
      
      if ($_POST["Password"]==null) {
        $pwderr = "Password is required";
      }

    if($_POST['Uname'] != null && $_POST["Password"] !=null) 
    {
        $array_user = verifyUsers();
        if ($array_user != null) {  
            session_start();
            $_SESSION['user'] = "admin";
            header("Location: AdminPage.php"); 
            exit();
        }
        else{
            $invalidMesg = "Invalid username and password!";
        }
    }

}

?>


  <div class="container bgColor">
        <main role="main" class="pb-3">
        <h2>Admin Login</h2>
     
            <div class="row">
                <div class="col-md-4">
                    <form method="post">
                        <div class="text-danger"></div>

                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input  class="form-control" type="text" name="Uname"/>
                            <span class="text-danger"><?php echo $nameErr;?></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name ="Password"/>
                            <span class="text-danger"><?php echo $pwderr;?></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" value="Login" name="submit" class="btn btn-primary">Login</button>
                            
                        </div>
                        <div>
                            <label style="color: red"><?php echo $invalidMesg; ?></label>
                        </div>

                    </form>
                </div>
            </div>
        </main>
    </div>

<?php include("../Footer.php"); ?>