<?php include ('include/header.php'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<nav>
    <ul class="sidenav">
        <li><a href="index.php">JHSC Risk Assessment Form</a></li>
        <li><a href="secureadmin.php">JHSC Risk Assessment Admin</a></li>
        <li><a class="active" href="report.php">JHSC Risk Assessment Report</a></li>
    </ul>
</nav>
<div class="pcaption">
    <a href="http://www.companywebsite.com/grouppage/modepage.aspx"><img src="images/companylogo.png" alt="Company Name"/></a>
    &nbsp;JHSC Risk Assessment Report<br /><hr class="hrtcaption1"/>
</div>
<div class="content pJHSCRAR">
<!--Areas-->
    <div class="reportSection">
        <h1 class="th4">Ratings at a Glance...<br />
            <div><h2 class="th7">Export Options</h2></div>
            <div class="reportFormButton">
                <!--These no longer work due to possible corruption of the associated views...
                <form action="assets/exportNam.php" method="post" name="export_excel" >
                    <button type="submit" id="export" name="export" class="buttonReport2 buttonreporth" >By Risk Level Name</button>
                </form>
            </div>
            <div class="reportFormButton">
                <form action="assets/exportVal.php" method="post" name="export_excel" >
                    <button type="submit" id="export" name="export" class="buttonReport2 buttonreporth" >By Risk Level Value</button>
                </form>
            </div>-->
            <div class="reportFormButton">
                <form action="assets/export.php" method="post" name="export_excel" >
                    <button type="submit" id="export" name="export" class="buttonReport2 buttonreporth" >Give Me Everything</button>
                </form>
            </div>
            <div class="reportFormButton">
                <form action="assets/exportSaf.php" method="post" name="export_excel" >
                    <button type="submit" id="export" name="export" class="buttonReport2 buttonreporth" >"At A Glance" Data</button>
                </form></h1>
            </div>
            
        <div class="reportFetch">
        	<hr class="hrth1"/>
<!--VIEW jhscrfnam-->
            <?php include("include/config.php");
                $sql =	"SELECT * FROM jhscrasafari;";
                $query = $dbo->prepare( $sql );
                $query->execute();
                $results = $query->fetchAll( PDO::FETCH_ASSOC ); ?>
                <table class="reportTable" align="center">
                    <tr>
                        <th class="th6 reportTableCell">Assessment Date</th>
                        <th class="th6 reportTableCell">Rating</th>
                        <th class="th6 reportTableCell">Auditor</th>
                        <th class="th6 reportTableCell">Area</th>
                        <th class="th6 reportTableCell">Work Centre</th>
                        <th class="th6 reportTableCell">Part</th>
                        <th class="th6 reportTableCell">Position</th>
                        <th class="th6 reportTableCell">General Comments</th>
                    </tr>
                    <?php foreach( $results as $row ){
                        echo "<tr><td class='reportTableCell'>";
                        echo $row['Assessment Date'];
                        echo "</td><td class='reportTableCell'>";
                        echo $row['Overall Rating Description'];
						echo "</td><td class='reportTableCell'>";
                        echo $row['Auditor'];
						echo "</td><td class='reportTableCell'>";
                        echo $row['Area'];
						echo "</td><td class='reportTableCell'>";
                        echo $row['Work Centre'];
						echo "</td><td class='reportTableCell'>";
                        echo $row['Part'];
						echo "</td><td class='reportTableCell'>";
                        echo $row['Position'];
						echo "</td><td class='reportTableCell'>";
                        echo $row['General Comments'];
                        echo "</td>";
                        echo "</tr>";
                        } ?>
                        
                 </table>
        </div>
    </div>
</div>
<?php include ('include/footer.php'); ?>