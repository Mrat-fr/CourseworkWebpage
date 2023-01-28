<?php require("../Navbars/NavBar.php"); 
require_once("UserLoginSQL.php");

$nameErr = $pwderr = $invalidMesg = "";

if (isset($_POST['submit'])) {
    
    if ($_POST["ID"]==null) {
        $nameErr = "ID is required";
      } 
      
      if ($_POST["Password"]==null) {
        $pwderr = "Password is required";
      }

    if($_POST['ID'] != null && $_POST["Password"] !=null) 
    {
        $array_user = verifyUsers();

        if ($array_user != null) { 
            session_start();
            $_SESSION['user'] = "user";
            $user = $array_user[0]['ApplicationID'];
            header("Location: UserPage.php?uid=$user"); 
            exit();
        }
        else{
            $invalidMesg = "Invalid username or password!";
        }
    }

}

?>


  <div class="container bgColor">
        <main role="main" class="pb-3">
        <h2>User Login</h2>
     
            <div class="row">
                <div class="col-md-4">
                    <form method="post">
                        <div class="text-danger"></div>

                        <div class="form-group">
                            <label class="control-label">User ID</label>
                            <input  class="form-control" type="text" name="ID"/>
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