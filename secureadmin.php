<?php include ('include/header.php'); ?>
<?php
$user = $_POST['user'];
$pass =$_POST['pass'];
if($user == "gearsofwar4connection"
&& $pass == "gearsofwar4referenced")
{
        include("admin.php");
}
else
{
	if(isset($_POST))
    {?>
<nav>
    <ul class="sidenav">
        <li><a href="index.php">JHSC Risk Assessment Form</a></li>
        <li><a href="secureadmin.php">JHSC Risk Assessment Admin</a></li>
        <li><a href="report.php">JHSC Risk Assessment Report</a></li>
    </ul>
</nav>
<a href="http://www.companywebsite.com/grouppage/modepage.aspx"><img min-height="88px" min-width="87px" src="images/companylogo.png" alt="Company Name"/></a>
            <CENTER>
            <form method="POST" action="secureadmin.php">
            Please Enter Your Username: <input type="text" name="user"></input><br/>
            Please Enter Your Password: <input type="password" name="pass"></input><br/>
            <input type="submit" name="submit" class="button2 buttonh" value="Go"></input>
            </form>
            </CENTER>
    <?php }
}
?>