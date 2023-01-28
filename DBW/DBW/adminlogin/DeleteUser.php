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
$db = new SQLITE3('C:\xampp\data\ABCDATABASE.db');
$sql = "SELECT ApplicationID FROM users WHERE ApplicationID=:uid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['delete'])){

    $db = new SQLITE3('C:\xampp\data\ABCDATABASE.db');

    $stmt = "DELETE FROM users WHERE ApplicationID = :stdID";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':stdID', $_POST['uid'], SQLITE3_TEXT);

    $sql->execute();
    header("Location:AdminviewUser.php?deleted=true");
}

?>

	<div class="container bgColor">
        <main role="main" class="pb-3">
            <h2>Delete User for <?php echo $_GET['uid'];?></h2><br>
            <h4 style="color: red;">Are you sure want to delete this user?</h4><br>

            <div class="row">
                <div class="col-5">
                    <form method="post">
                        <input type="hidden" name="uid" value = "<?php echo $_GET['uid'] ?>"><br>
                        <input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="viewUser.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                    </form>
                </div>
            </div>

		</main>
	</div>

<?php require("../Footer.php");?>
