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
$db = new SQLite3('C:\xampp\data\ABCDATABASE.db');
$sql = "SELECT * FROM users WHERE ApplicationID=:uid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['submit'])){

     if ($_POST['Product']=="100"){
          $LuckyDrawEntries = "10";
      }
      if ($_POST['Product']=="300"){
          $LuckyDrawEntries = "15";
      }
      if ($_POST['Product']=="500"){
          $LuckyDrawEntries = "25";
      }
      if ($_POST['Product']=="800"){
          $LuckyDrawEntries = "35";
      }
      if ($_POST['Product']=="1000"){
          $LuckyDrawEntries = "45";
      }
      if ($_POST['Product']=="5000"){
          $LuckyDrawEntries = "55";
      }
      if ($_POST['Product']=="10,000"){
          $LuckyDrawEntries = "60";
      }
      if ($_POST['Product']=="15,000"){
          $LuckyDrawEntries = "65";
      }

//---------------------------------
    $Date = date("d/m/y");
    $myfile = fopen("C:/xampp/data/UserChanges.txt", "a");
    $txt = "--------------------\n";
    fwrite($myfile, $txt);
    $txt = $_GET['uid'];
    fwrite($myfile, $txt);
    $txt = ": has made changes on ";
    fwrite($myfile, $txt);
    $txt = $Date;
    fwrite($myfile, $txt);
    $txt = "\n------\n";
    fwrite($myfile, $txt);

    if ($_POST['Fname']!=$arrayResult[0][1]){
        $txt = "Change: ";
        fwrite($myfile, $txt);
        $txt = $_POST['Fname'];
        fwrite($myfile, $txt);
        $txt = "\nOriginal: ";
        fwrite($myfile, $txt);
        $txt = $arrayResult[0][1];
        fwrite($myfile, $txt);
        $txt = "\n\n";
        fwrite($myfile, $txt);
    }
    if ($_POST['Lname']!=$arrayResult[0][2]){
        $txt = "Change: ";
        fwrite($myfile, $txt);
        $txt = $_POST['Lname'];
        fwrite($myfile, $txt);
        $txt = "\nOriginal: ";
        fwrite($myfile, $txt);
        $txt = $arrayResult[0][2];
        fwrite($myfile, $txt);
        $txt = "\n\n";
        fwrite($myfile, $txt);
    }
    if ($_POST['Pass']!=$arrayResult[0][3]){
        $txt = "Change: ";
        fwrite($myfile, $txt);
        $txt = $_POST['Pass'];
        fwrite($myfile, $txt);
        $txt = "\nOriginal: ";
        fwrite($myfile, $txt);
        $txt = $arrayResult[0][3];
        fwrite($myfile, $txt);
        $txt = "\n\n";
        fwrite($myfile, $txt);
    }
    if ($_POST['dob']!=$arrayResult[0][4]){
        $txt = "Change: ";
        fwrite($myfile, $txt);
        $txt = $_POST['dob'];
        fwrite($myfile, $txt);
        $txt = "\nOriginal: ";
        fwrite($myfile, $txt);
        $txt = $arrayResult[0][4];
        fwrite($myfile, $txt);
        $txt = "\n\n";
        fwrite($myfile, $txt);
    }
    if ($_POST['Postcode']!=$arrayResult[0][6]){
        $txt = "Change: ";
        fwrite($myfile, $txt);
        $txt = $_POST['Postcode'];
        fwrite($myfile, $txt);
        $txt = "\nOriginal: ";
        fwrite($myfile, $txt);
        $txt = $arrayResult[0][6];
        fwrite($myfile, $txt);
        $txt = "\n\n";
        fwrite($myfile, $txt);
    }
    if ($_POST['CN']!=$arrayResult[0][7]){
        $txt = "Change: ";
        fwrite($myfile, $txt);
        $txt = $_POST['CN'];
        fwrite($myfile, $txt);
        $txt = "\nOriginal: ";
        fwrite($myfile, $txt);
        $txt = $arrayResult[0][7];
        fwrite($myfile, $txt);
        $txt = "\n\n";
        fwrite($myfile, $txt);
    }
    if ($_POST['Product']!=$arrayResult[0][8]){
        $txt = "Change: ";
        fwrite($myfile, $txt);
        $txt = $_POST['Product'];
        fwrite($myfile, $txt);
        $txt = "\nOriginal: ";
        fwrite($myfile, $txt);
        $txt = $arrayResult[0][8];
        fwrite($myfile, $txt);
        $txt = "\n\n";
        fwrite($myfile, $txt);
    }
    if ($arrayResult[0][11]!=$LuckyDrawEntries){
        $txt = "Change: ";
        fwrite($myfile, $txt);
        $txt = $LuckyDrawEntries;
        fwrite($myfile, $txt);
        $txt = "\nOriginal: ";
        fwrite($myfile, $txt);
        $txt = $arrayResult[0][11];
        fwrite($myfile, $txt);
        $txt = "\n\n";
        fwrite($myfile, $txt);
    }
    fclose($myfile);
//---------------------------------

    $db = new SQLite3('C:\xampp\data\ABCDATABASE.db');
    $sql = "UPDATE users SET FirstName = :Fname, LastName = :Lname, Password = :Pass, DOB = :dob, Postcode = :Postcode, ContactNumber = :CN, Product = :Product, ApplicationStatus = :Astatus, LuckyDrawEntries = :Entries WHERE ApplicationID = :uid";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);
    $stmt->bindParam(':Fname',$_POST['Fname'], SQLITE3_TEXT);
    $stmt->bindParam(':Lname',$_POST['Lname'], SQLITE3_TEXT);
    $stmt->bindParam(':Pass',$_POST['Pass'], SQLITE3_TEXT);
    $stmt->bindParam(':dob',$_POST['dob'], SQLITE3_TEXT);
    $stmt->bindParam(':Postcode',$_POST['Postcode'], SQLITE3_TEXT);
    $stmt->bindParam(':CN',$_POST['CN'], SQLITE3_TEXT);
    $stmt->bindParam(':Product',$_POST['Product'], SQLITE3_TEXT);
    $stmt->bindParam(':Astatus',$_POST['Astatus'], SQLITE3_TEXT);
    $stmt->bindParam(':Entries',$LuckyDrawEntries, SQLITE3_TEXT);

    $stmt->execute();

  



    header('Location: UserPage.php?uid='.$arrayResult[0][0]);
}
?>

	<div class="container bgColor">
        	<main role="main" class="pb-3">
			<h2>Update User</h2><br>
            <div class="row">
            <div class="col-11">
                <form method="post">

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name = "Fname" value="<?php echo $arrayResult[0][1]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "Lname" value="<?php echo $arrayResult[0][2]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Password</label>
                        <input class="form-control" type="text" name = "Pass" value="<?php echo $arrayResult[0][3]; ?>">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Date of birth</label>
                        <input class="form-control" type="date" name = "dob" value="<?php echo $arrayResult[0][4]; ?>">
                   </div>   
                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "Postcode" value="<?php echo $arrayResult[0][6]; ?>">
                   </div> 
                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">ContactNumber</label>
                        <input class="form-control" type="text" name = "CN" value="<?php echo $arrayResult[0][7]; ?>">
                   </div> 

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Product</label>
                        <select name="Product" class="form-control">
                           <option value="100" <?php echo ($arrayResult[0][8]=="100") ? "selected" : ""; ?>>£100 6 months</option>
                           <option value="300" <?php echo ($arrayResult[0][8]=="300") ? "selected" : ""; ?>>£300 5 months</option>
                           <option value="500" <?php echo ($arrayResult[0][8]=="500") ? "selected" : ""; ?>>£500 3 months</option>
                           <option value="800" <?php echo ($arrayResult[0][8]=="800") ? "selected" : ""; ?>>£800 3 months</option>
                           <option value="1000" <?php echo ($arrayResult[0][8]=="1000") ? "selected" : ""; ?>>£1000 3 months</option>
                           <option value="5000" <?php echo ($arrayResult[0][8]=="5000") ? "selected" : ""; ?>>£5000 3 months</option>
                           <option value="10,000" <?php echo ($arrayResult[0][8]=="10,000") ? "selected" : ""; ?>>£10,000 5 months</option>
                           <option value="15,000" <?php echo ($arrayResult[0][8]=="15,000") ? "selected" : ""; ?>>£15,000 5 months</option>

                        </select>
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Status</label>
                        <select name="Astatus" class="form-control">
                           <option value="New" <?php echo ($arrayResult[0][9]=="New") ? "selected" : ""; ?>>New</option>
                           <option value="Withdrawn" <?php echo ($arrayResult[0][9]=="Withdrawn") ? "selected" : ""; ?>>Withdrawn</option>
                        </select>
                   </div>

                   <div class="form-group col-md-3">
                       <input type="submit" name="submit" value="Update" class="btn btn-primary">
                   </div><br><br>
                </form>
            </div>
        </div>		
		</main>
	</div>

<?php require("../Footer.php");?>