<?php include ('include/header.php'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<nav>
    <ul class="sidenav">
        <li><a href="index.php">JHSC Risk Assessment Form</a></li>
        <li><a class="active" href="secureadmin.php">JHSC Risk Assessment Admin</a></li>
        <li><a href="report.php">JHSC Risk Assessment Report</a></li>
    </ul>
</nav>
<div class="pcaption">
    <a href="http://www.companywebsite.com/grouppage/modepage.aspx"><img src="images/companylogo.png" alt="Company Name"/></a>
    &nbsp;JHSC Risk Assessment Admin<br /><hr class="hrtcaption1"/>
</div>
<div class="content pJHSCRAA">
<!--Auditor-->
    <div class="adminSection">
        <h1 class="th4"><br />Auditors</h1>
        <div class="adminFetch">
            <?php include("include/config.php");
                $sql = "SELECT * FROM auditor";
                $query = $dbo->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC ); ?>
                <table class="TBD" align="center">
                    <tr>
                        <th class="th5">Current Work Centres</th><td colspan="3"><hr class="hrth1"/>
                    </tr>
                        <tr>
                            <th class="th6">Record Id.</th>
                            <th class="th6">First Names</th>
                            <th class="th6">Last Names</th>
                            <th class="th6">Auditor Numbers</th>
                        </tr>
                        <?php foreach( $results as $row ){
                            echo "<tr><td>";
                            echo $row['iD'];
                            echo "</td><td>";
                            echo $row['fName'];
                            echo "</td><td>";
                            echo $row['lName'];
                            echo "</td><td>";
                            echo $row['audiNumb'];
                            echo "</td>";
                            echo "</tr>";
                            } ?>
                     </table>
            </form>
        </div>
        <div class="adminSubmit">
        <h2 class="th7">Edit Auditors</h2><hr class="hrth3"/>
        <form name="form4" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form4" >
             Add New Auditor First Name:&nbsp;<input name="fName" type="text" required>
             <br />
             Add New Auditor Last Name:&nbsp;<input name="lName" type="text" required>
             <br />
             Add New Auditor Number:&nbsp;<input name="audiNumb" type="text" required>
             <br />
             <input type="submit" name="auditorAddItem" class="button2 buttonh" value="Submit" />
        </form>
        <form name="form5" onsubmit="return deleteConfirm();" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form5" >
             <span class="danger">Remove Auditor (enter Record Id.):&nbsp;</span><input name="iD" type="text" required>
             <br />
             <input type="submit" name="auditorRemoveItem" class="button3 buttonh" value="Submit" />
        </form>
        </div>
    </div>
<!--Areas-->
    <div class="adminSection">
        <h1 class="th4">Areas</h1>
        <div class="adminFetch">
            <?php include("include/config.php");
                $sql = "SELECT * FROM area";
                $query = $dbo->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC ); ?>
                <table class="TBD" align="center">
                    <tr>
                        <th class="th5">Current Areas</th><td colspan="3"><hr class="hrth1"/>
                    </tr>
                        <tr>
                            <th class="th6">Record Id.</th>
                            <th class="th6">Area Codes</th>
                            <th class="th6">Area Names</th>
                            <th class="th6">Associated Work Centres</th>
                        </tr>
                        <?php foreach( $results as $row ){
                            echo "<tr><td>";
                            echo $row['iD'];
                            echo "</td><td>";
                            echo $row['aRCode'];
                            echo "</td><td>";
                            echo $row['aRName'];
                            echo "</td><td>";
                            echo $row['work_centre'];
                            echo "</td>";
                            echo "</tr>";
                            } ?>
                 </table>
        </div>
        <div class="adminSubmit">
        <h2 class="th7">Edit Areas</h2><hr class="hrth3"/>
        <form name="form2" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form2" >
             Add New Area Code:&nbsp;<input name="aRCode" type="text" required>
             <br />
             Add New Area Name:&nbsp;<input name="aRName" type="text" required>
             <br />
             <input type="submit" name="areaAddItem" class="button2 buttonh" value="Submit" />
        </form>
        <form name="form3" onsubmit="return deleteConfirm();" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form3" >
             <span class="danger">Remove Area (enter Record Id.):&nbsp;</span><input name="iD" type="text" required>
             <br />
             <input type="submit" name="areaRemoveItem" class="button3 buttonh" value="Submit" />
        </form>
        </div>
    </div>
<!--Work Centres-->
    <div class="adminSection">
        <h1 class="th4"><br />Work Centres</h1>
        <div class="adminFetch">
            <?php include("include/config.php");
                $sql = "SELECT * FROM work_centre";
                $query = $dbo->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC ); ?>
                <table class="TBD" align="center">
                    <tr>
                        <th class="th5">Current Work Centres</th><td colspan="3"><hr class="hrth1"/>
                    </tr>
                        <tr>
                            <th class="th6">Record Id.</th>
                            <th class="th6">Work Centre Codes</th>
                            <th class="th6">Work Centre Names</th>
                            <th class="th6">Associated Parts</th>
                        </tr>
                        <?php foreach( $results as $row ){
                            echo "<tr><td>";
                            echo $row['iD'];
                            echo "</td><td>";
                            echo $row['wCCode'];
                            echo "</td><td>";
                            echo $row['wCName'];
                            echo "</td><td>";
                            echo $row['part_description'];
                            echo "</td>";
                            echo "</tr>";
                            } ?>
                     </table>
            </form>
        </div>
        <div class="adminSubmit">
        <h2 class="th7">Edit Work Centres</h2><hr class="hrth3"/>
        <form name="form4" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form4" >
             Add New Work Centre Code:&nbsp;<input name="wCCode" type="text" required>
             <br />
             Add New Work Centre Name:&nbsp;<input name="wCName" type="text" required>
             <br />
             <input type="submit" name="work_centreAddItem" class="button2 buttonh" value="Submit" />
        </form>
        <form name="form5" onsubmit="return deleteConfirm();" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form5" >
             <span class="danger">Remove Work Centre (enter Record Id.):&nbsp;</span><input name="iD" type="text" required>
             <br />
             <input type="submit" name="work_centreRemoveItem" class="button3 buttonh" value="Submit" />
        </form>
        </div>
    </div>
<!--Parts-->
    <div class="adminSection">
        <h1 class="th4"><br />Parts</h1>
        <div class="adminFetch">
            <?php include("include/config.php");
                $sql = "SELECT * FROM part";
                $query = $dbo->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC ); ?>
                <table class="TBD" align="center">
                    <tr>
                        <th class="th5">Current Parts</th><td colspan="3"><hr class="hrth1"/>
                    </tr>
                        <tr>
                            <th class="th6">Record Id.</th>
                            <th class="th6">Part Codes</th>
                            <th class="th6">Part Names</th>
                            <th class="th6">Part Group</th>
                        </tr>
                        <?php foreach( $results as $row ){
                            echo "<tr><td>";
                            echo $row['iD'];
                            echo "</td><td>";
                            echo $row['pCode'];
                            echo "</td><td>";
                            echo $row['pName'];
                            echo "</td><td>";
                            echo $row['part_group'];
                            echo "</td>";
                            echo "</tr>";
                            } ?>
                     </table>
            </form>
        </div>
        <div class="adminSubmit">
        <h2 class="th7">Edit Parts</h2><hr class="hrth3"/>
        <form name="form4" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form4" >
             Add New Part Code:&nbsp;<input name="pCode" type="text" required>
             <br />
             Add New Part Name:&nbsp;<input name="pName" type="text" required>
             <br />
             <input type="submit" name="partAddItem" class="button2 buttonh" value="Submit" />
        </form>
        <form name="form5" onsubmit="return deleteConfirm();" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form5" >
             <span class="danger">Remove Part (enter Record Id.):&nbsp;</span><input name="iD" type="text" required>
             <br />
             <input type="submit" name="partRemoveItem" class="button3 buttonh" value="Submit" />
        </form>
        </div>
    </div>
<!--Positions-->
    <div class="adminSection">
        <h1 class="th4"><br />Positions</h1>
        <div class="adminFetch">
            <?php include("include/config.php");
                $sql = "SELECT * FROM position";
                $query = $dbo->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC ); ?>
                <table class="TBD" align="center">
                    <tr>
                        <th class="th5">Current Positions</th><td colspan="3"><hr class="hrth1"/>
                    </tr>
                        <tr>
                            <th class="th6">Record Id.</th>
                            <th class="th6">Position Codes</th>
                            <th class="th6">Position Names</th>
                            <th class="th6">Risk Factor</th>
                        </tr>
                        <?php foreach( $results as $row ){
                            echo "<tr><td>";
                            echo $row['iD'];
                            echo "</td><td>";
                            echo $row['pOSCode'];
                            echo "</td><td>";
                            echo $row['pOSName'];
                            echo "</td><td>";
                            echo $row['risk_factor'];
                            echo "</td>";
                            echo "</tr>";
                            } ?>
                     </table>
            </form>
        </div>
        <div class="adminSubmit">
        <h2 class="th7">Edit Positions</h2><hr class="hrth3"/>
        <form name="form4" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form4" >
             Add New Position Code:&nbsp;<input name="pOSCode" type="text" required>
             <br />
             Add New Position Name:&nbsp;<input name="pOSName" type="text" required>
             <br />
             <input type="submit" name="positionAddItem" class="button2 buttonh" value="Submit" />
        </form>
        <form name="form5" onsubmit="return deleteConfirm();" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form5" >
             <span class="danger">Remove Position (enter Record Id.):&nbsp;</span><input name="iD" type="text" required>
             <br />
             <input type="submit" name="positionRemoveItem" class="button3 buttonh" value="Submit" />
        </form>
        </div>
    </div>
</div>
<script type="text/javascript">
function deleteConfirm(){
	var result = confirm("Are you sure you want to delete?");
	if(result){
		return true;
	}else{
		return false;
	}
}
</script>
<?php include ('include/footer.php'); ?>