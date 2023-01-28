<?php require("../Navbars/NavBar.php");
include_once("NewViewSQL.php");
$arrayResult = Viewuser();

?>

<div class="container pb-5">
        <main role="main" class="pb-3">
        <h2>Welcome To the ABC</h2><br>
        <p>Your record has been successfully submitted.</p>
        <p>Thank you <?php echo $arrayResult[0][1] ?> <?php echo $arrayResult[0][2] ?> for your interest to open a Time Deposit Account with us under this
        campaign. Your application ID is <?php echo $arrayResult[0][0] ?>, you will use this to login. Only one application is
        allowed per customer. You will have <?php echo $arrayResult[0][8] ?> entries for the lucky draw (stand a chance to win £10,000) upon
        successful deposit placement until the end of account tenure. If there is any cahnges you would like to make to your
        account then login in and make your changes there are long as your application status is “new”.
        </p>
        <a class="btn btn-primary" href="\DBWCoursework_c1025879\MainPage.php" role="button">Home Page</a>
</div>


<?php require("../Footer.php");?>
