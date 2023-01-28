<?php require("../Navbars/NavBar.php");
include_once("registersSQL.php");

$errorfname = $errorlname = $errorpass = $errorpass = $errordob = $errormob = $errorpostc = $errorcontact = "";
$allFields = "yes";

if (isset($_POST['submit'])){
    
    if ($_POST['fname']==""){
        $errorfname = "First name is mandatory";
        $allFields = "no";
    }
    if ($_POST['lname']==null){
        $errorlname = "Last name is mandatory";
        $allFields = "no";
    }
    if ($_POST['Pass']==null){
        $errorpass = "Password is mandatory";
        $allFields = "no";
    }
    if ($_POST['dob']==""){
        $errordob = "Date is mandatory";
        $allFields = "no";
    }
    if ($_POST['mob']==""){
        $errormob = "month is mandatory";
        $allFields = "no";
    }
    if ($_POST['postc']==""){
        $errorpostc = "Postcode is mandatory";
        $allFields = "no";
    }
    if ($_POST['contact']==""){
        $errorcontact = "Contact number is mandatory";
        $allFields = "no";
    }
    if($allFields == "yes")
    {
        $createUser = createUser();

        header('Location: registersummery.php?uid='.$createUser);
    }
}?>

	<div class="container bgColor">
        <main role="main" class="pb-3">
		<h2>Register</h2><br>
			<div class="row">
                <div class="col-6">
                    <form method="post">
                        <div class="form-group col-md-6">
                                <label class="control-label labelFont">First Name</label>
                                <input class="form-control" type="text" name = "fname">
                                <span class="text-danger"><?php echo $errorfname; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                                <label class="control-label labelFont">Last Name</label>
                                <input class="form-control" type="text" name = "lname">
                                <span class="text-danger"><?php echo $errorlname; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                                <label class="control-label labelFont">Password</label>
                                <input class="form-control" type="text" name="Pass">
                                <span class="text-danger"><?php echo $errorpass; ?></span>
                        </div>
                        
                        <div class="form-group col-md-6">
                                <label class="control-label labelFont">Date of birth</label>
                                <input class="form-control" type="date" name="dob">
                                <span class="text-danger"><?php echo $errordob; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                                <label class="control-label labelFont">month of birth</label>
                                <input class="form-control" type="date" name = "mob">
                                <span class="text-danger"><?php echo $errormob; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                                <label class="control-label labelFont">Postcode</label>
                                <input class="form-control" type="text" name = "postc">
                                <span class="text-danger"><?php echo $errorpostc; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                                <label class="control-label labelFont">Contact number</label>
                                <input class="form-control" type="text" name = "contact">
                                <span class="text-danger"><?php echo $errorcontact; ?></span>
                        </div>

                        <div class="form-group col-md-6">
                                <label class="control-label labelFont">Product</label>
                                <select name="Product" class="form-control">
                                    <option value="100">£100 6 months</option>
                                    <option value="300">£300 5 months</option>
                                    <option value="500">£500 3 months</option>
                                    <option value="800">£800 3 months</option>
                                    <option value="1000">£1000 3 months</option>
                                    <option value="5000">£5000 3 months</option>
                                    <option value="10,000">£10,000 5 months</option>
                                    <option value="15,000">£15,000 5 months</option>
                                </select>
                        </div>

                        <div class="form-group col-md-4">
                                <input class="btn btn-primary" type="submit" value="Create User" name ="submit">
                        </div>
                        <br><br><br>
                    </form>
                </div>
            </div>
		</main>
	</div>

<?php require("../Footer.php");?>