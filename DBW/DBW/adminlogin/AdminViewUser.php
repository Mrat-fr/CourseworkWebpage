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
include_once("viewUserSQL.php");
$Status = array("All","New","In-process","Complete","On-hold","Withdrawn");//they are string!
$user = getUsers();   

if(isset($_GET['update'])): ?>
    <div class="container alert alert-success alert-dismissible fade show col-10" role="alert" style="font-weight: bold;">
        The user has been updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
<?php endif;

 if(isset($_GET['deleted'])): ?>
    <div class="container alert alert-danger alert-dismissible fade show col-10" role="alert" style="font-weight: bold;">
        The user has been deleted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
<?php endif; ?>

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View User</h2><br>
        <div class="row">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label class="control-label" style="font-weight: bold;">Filter by Status: </label>
                    <select type="text" style="width:150px;" name="filterLevel" class="form-control">
                        <?php for ($i=0; $i<count($Status); $i++): ?>
                        <option <?php if (isset($_POST['filterLevel']) && ($Status[$i]==$_POST['filterLevel'])) echo "selected"; ?> ><?php echo $Status[$i];?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" value="filter" class="btn btn-primary">Filter</button>      
                </div>
            </form>
        </div>
      </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>User ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Password</td>
                        <td>Date of Birth</td>
                        <td>Postcode</td>
                        <td>Contact Number</td>
                        <td>Product</td>
                        <td>Status</td>
                        <td>Action</td> 
                    </thead>

                    <?php
                        for ($i=0; $i<count($user); $i++):
                    ?>
                    <tr>
                        <td><?php echo $user[$i]['ApplicationID']?></td>
                        <td><?php echo $user[$i]['FirstName']?></td>
                        <td><?php echo $user[$i]['LastName']?></td>
                        <td><?php echo $user[$i]['Password']?></td>
                        <td><?php echo $user[$i]['DOB']?></td>
                        <td><?php echo $user[$i]['Postcode']?></td>             
                        <td><?php echo $user[$i]['ContactNumber']?></td>                        
                        <td><?php echo $user[$i]['Product']?></td>                        
                        <td><?php echo $user[$i]['ApplicationStatus']?></td> 
                        <td><a href="UpdateUser.php?uid=<?php echo $user[$i]['ApplicationID']; ?>">Update</a>
                        
                        <?php
                            if($user[$i]['ApplicationStatus'] == "Withdrawn"):?>
                               | <a href="DeleteUser.php?uid=<?php echo $user[$i]['ApplicationID']; ?>">Delete</a>
                         <?php endif; ?>
                            
                        </td>    
                                           
                    </tr>
                    <?php endfor;?>
                </table>    
            </div>
        </div>
        <div>
            <a href="AdminPdf.php" target="_blank">Generate PDF</a>
        </div>

   </main>
</div>


<?php require("../Footer.php");?>