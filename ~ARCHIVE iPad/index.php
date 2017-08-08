<?php include ('include/header.php'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<!-- START Safari form fixes (e.g. support for JS /JQ & required attribute etc.) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webshim/1.16.0/dev/polyfiller.js"></script>
		<script> 
            webshim.activeLang('en');
            webshims.polyfill('forms');
            webshims.cfg.no$Switch = true;
        </script>
<!-- END Safari form fixes (e.g. support for JS /JQ & required attribute etc.) -->
<nav>
    <ul class="sidenav">
        <li><a class="active" href="index.php">JHSC Risk Assessment Form</a></li>
        <li><a href="secureadmin.php">JHSC Risk Assessment Admin</a></li>
        <li><a href="report.php">JHSC Risk Assessment Report</a></li>
    </ul>
</nav>
<div class="pcaption">
    <a href="http://www.companywebsite.com/grouppage/modepage.aspx"><img src="images/companylogo.png" alt="Company Name"/></a>
    &nbsp;JHSC Risk Assessment Form<br /><hr class="hrtcaption1"/>
</div>
<div class="content pJHSCRAF pBJHSCRAF">
    <form name="form1" accept-charset="utf-8" onsubmit="return checkForm(this);" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form1">
        <table align="center">
            <!--<CAPTION class="tcaption1"><a href="http://www.companywebsite.com/grouppage/modepage.aspx"><img src="images/companylogo.png" alt="Company Name"/></a>&nbsp;JHSC Risk Assessment Form<br /><hr class="hrtcaption1"/></CAPTION><!--Repeats on printed pages if enabled here instead of handling in div above.-->
            <input type="text" name="orLWt" value="" id="orLWt" style="display:none;" />
            <THEAD>
                <tr>
                    <th colspan="1" class="th0">Auditor:
                    <td  colspan="1" class="td0">
<!--Auditor-->
                        <?php require "include/config.php";
							echo "<input name='auditor' id='auditor' list='audiNumb' class='datalistcss' placeholder='Who did the assessment?' required title='Please select auditor.'/>
							<datalist id='audiNumb' >";
							$sql="select audiNumb, fName, lName from auditor";
							foreach ($dbo->query($sql) as $row) {
							echo "<option value='$row[fName], $row[audiNumb]'/>";
							}
							echo "</datalist>"; ?>
                    <th colspan="1" class="th0">Area:
                    <td colspan="1">
    <!--Area (aRName used in value vs. aRCode for easier reporting UX; Area may be worth factoring into overall rating one day...)-->
						<?php require "include/config.php";
						$sql="select aRCode, aRName FROM area";
						echo "<select name='area' id='area' value='' required>
						<option value='' disabled selected style='display: none;'>Where was the assessment?</option>";
						foreach ($dbo->query($sql) as $row){
							echo "<option value=$row[aRName]>$row[aRName]</option>";
							}
						 echo "</select>"; ?>
                </tr>            
                <tr>
                    <th colspan="1" class="th0">Submitted By:
                    <td colspan="1" class="td0">
<!--Submitted By-->
                        <?php require "include/config.php";
							echo "<input name='submittedBy' id='auditor' list='audiNumb' class='datalistcss' placeholder='Who is submitting this?' required/>
							<datalist id='audiNumb' >";
							$sql="select audiNumb, fName, lName from auditor";
							foreach ($dbo->query($sql) as $row) {
							echo "<option value='$row[fName], $row[audiNumb]'/>";
							}
							echo "</datalist>"; ?>
                        <!--removed style="display:none;" --><th colspan="1" id="lmnt1" class="th1">Work Centre:
                        <!--removed style="display:none;" --><td colspan="1" id="lmnt2" >
        <!--Work Centre-->
							<?php require "include/config.php";
							echo "<input name='workCentre' id='workCentre' list='wCName' class='datalistcss'/>";
							echo "<datalist id='wCName' >";
							$sql="select wCName from work_centre";
							foreach ($dbo->query($sql) as $row) {
							echo "<option value='$row[wCName]'/>"; 
							}
							echo "</datalist>"; ?>
                </tr>
                <tr>
                    <th colspan="1" class="th0">Date of Assessment:
                    <td colspan="1" class="td0">
<!--Assessment Date-->
                        <input type="date" name="assessmentDate" id="assessmentDate" required/><!--<span class="smallprint">(YYYY-MM-DD if using Internet Explorer)</span>-->
                        <!--removed style="display:none;" --><th colspan="1" id="lmnt3" class="th1">Part:
                        <!--removed style="display:none;" --><td colspan="1" id="lmnt4" >
        <!--Part-->
                            <?php require "include/config.php";
							echo "<input name='part' id='part' list='pName' class='datalistcss' />
							<datalist id='pName' >";
							$sql="select pName from part";
							foreach ($dbo->query($sql) as $row) {
							echo "<option value='$row[pName]'/>"; 
							}
							echo "</datalist>"; ?>
                </tr>
                    <tr>
                        <!--removed style="display:none;" --><th colspan="3" id="lmnt5" class="th1">Position:
                        <!--removed style="display:none;" --><td colspan="1" id="lmnt6" >
        <!--Position-->
                            <?php require "include/config.php";
							echo "<input name='position' id='position' list='pOSName' class='datalistcss' />
							<datalist id='pOSName' >";
							$sql="select pOSName from position";
							foreach ($dbo->query($sql) as $row) {
							echo "<option value='$row[pOSName]'/>"; 
							}
							echo "</datalist>"; ?>
                    </tr>
                <tr>
                    <td colspan="4"><hr class="hrth1"/>
                </tr>
                <tr>
                    <th colspan="2" class="th2">Risk Factors<th colspan="1" class="th2">Descriptors<th colspan="1" class="th2">Quantifiers
                </tr>
<!--section "1. Awkward Postures"-->
				<TBODY>
                    <tr>
						<th colspan="2" class="th3">Awkward Postures:<td colspan="2"><hr class="hrth3"/>
					</tr>
                        <tr>
                            <td colspan="2" class="td1">Neck:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Awkward Postures: Neck, Bend-->
                                <label>
                                  <input type="radio" name="aPNB" value="Repeated" id="aPNB_0" />
                                    Repeated
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="aPNB" value="Sustained" id="aPNB_1" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="aPNB" value="n/a" id="aPNB_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPNBrLWt" value="0" id="aPNBrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Awkward Postures: Neck, Twist-->
                                <label>
                                  <input type="radio" name="aPNT" value="Repeated" id="aPNT_0" />
                                    Repeated
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="aPNT" value="Sustained" id="aPNT_1" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="aPNT" value="n/a" id="aPNT_2" checked="true"/>
                                    n/a
                                </label>
							<input type="hidden" name="aPNTrLWt" value="0" id="aPNTrLWt" />
                        </tr>
						<tr>
                            <td colspan="2" class="td1">Shoulder:<td colspan="1" class="td2">Extended Reach<td colspan="1" class="td3">
    <!--Awkward Postures: Shoulder, Extended Reach-->
                                <label>
                                	<input type="radio" name="aPSER" value="Repeated" id="aPSER" />
                                    Repeated
                                </label>    
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>    
                                	<input type="radio" name="aPSER" value="Sustained" id="aPSER" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>    
                                	<input type="radio" name="aPSER" value="n/a" id="aPSER" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPSERrLWt" value="0" id="aPSERrLWt" />
                        </tr>
						<tr>
                            <td colspan="2" class="td1">Elbow /Forearm:<td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Awkward Postures: Elbow /Forearm, Twist-->
                                <label>
                                	<input type="radio" name="aPEFT" value="Repeated" id="aPEFT" />
                                    Repeated
                                </label>    
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>    
                                	<input type="radio" name="aPEFT" value="Sustained" id="aPEFT" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>    
                                	<input type="radio" name="aPEFT" value="n/a" id="aPEFT" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPEFTrLWt" value="0" id="aPEFTrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Hand /Wrist:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Awkward Postures: Hand /Wrist, Bend-->
                                <label>
                                  <input type="radio" name="aPHWB" value="Repeated" id="aPHWB_0" />
                                    Repeated
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="aPHWB" value="Sustained" id="aPHWB_1" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="aPHWB" value="n/a" id="aPHWB_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPHWBrLWt" value="0" id="aPHWBrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Awkward Postures: Hand /Wrist, Twist-->
                                <label>
                                  <input type="radio" name="aPHWT" value="Repeated" id="aPHWT_0" />
                                    Repeated
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="aPHWT" value="Sustained" id="aPHWT_1" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>	
                                  <input type="radio" name="aPHWT" value="n/a" id="aPHWT_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPHWTrLWt" value="0" id="aPHWTrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Trunk:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Awkward Postures: Trunk, Bend-->
                                <label>
                                  <input type="radio" name="aPTB" value="Repeated" id="aPTB_0" />
                                    Repeated
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="aPTB" value="Sustained" id="aPTB_1" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="aPTB" value="n/a" id="aPTB_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPTBrLWt" value="0" id="aPTBrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Awkward Postures: Trunk, Twist-->
                                <label>
                                    <input type="radio" name="aPTT" value="Repeated" id="aPTT_0" />
                                    Repeated
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="aPTT" value="Sustained" id="aPTT_1" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>	
                                    <input type="radio" name="aPTT" value="n/a" id="aPTT_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPTTrLWt" value="0" id="aPTTrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Knees:<td colspan="1" class="td2">Squat<td colspan="1" class="td3">
    <!--Awkward Postures: Knees, Squat-->
                                <label>
                                    <input type="radio" name="aPKS" value="Repeated" id="aPKS_0" />
                                    Repeated
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="aPKS" value="Sustained" id="aPKS_1" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="aPKS" value="n/a" id="aPKS_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPKSrLWt" value="0" id="aPKSrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Kneel<td colspan="1" class="td3">
    <!--Awkward Postures: Knees, Kneel-->
                                <label>
                                    <input type="radio" name="aPKK" value="Repeated" id="aPKK_0" />
                                    Repeated
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="aPKK" value="Sustained" id="aPKK_1" />
                                    Sustained
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>	
                                    <input type="radio" name="aPKK" value="n/a" id="aPKK_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPKKrLWt" value="0" id="aPKKrLWt" />
                        </tr>
<!--section "2. Repetitive Motions"-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Repetitive Motions:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2" class="td1">Neck:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Repetitive Motions: Neck, Bend-->
                                <label>
                                <input type="radio" name="rMNBRpM" value="<=19 /min." id="rMNB_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMNBRpM" value="20-39 /min." id="rMNB_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMNBRpM" value=">=40 /min." id="rMNB_2" />
                                    >=40 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMNBRpM" value="n/a" id="rMNB_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMNBRpMrLWt" value="0" id="rMNBRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Repetitive Motions: Neck, Twist-->
                                <label>
                                <input type="radio" name="rMNTRpM" value="<=19 /min." id="rMNT_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMNTRpM" value="20-39 /min." id="rMNT_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMNTRpM" value=">=40 /min." id="rMNT_2" />
                                    >=40 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMNTRpM" value="n/a" id="rMNT_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMNTRpMrLWt" value="0" id="rMNTRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Shoulder:<td colspan="1" class="td2">Extended Reach<td colspan="1" class="td3">
    <!--Repetitive Motions: Shoulder, Extended Reach-->
                                <label>
                                <input type="radio" name="rMSERRpM" value="<=19 /min." id="rMSER_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMSERRpM" value="20-39 /min." id="rMSER_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMSERRpM" value=">=40 /min." id="rMSER_2" />
                                    >=40 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMSERRpM" value="n/a" id="rMSER_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMSERRpMrLWt" value="0" id="rMSERRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Elbow /Forearm:<td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Repetitive Motions: Elbow /Forearm, Twist-->
                                <label>
                                <input type="radio" name="rMEFTRpM" value="<=19 /min." id="rMEFT_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMEFTRpM" value="20-39 /min." id="rMEFT_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMEFTRpM" value=">=40 /min." id="rMEFT_2" />
                                    >=40 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMEFTRpM" value="n/a" id="rMEFT_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMEFTRpMrLWt" value="0" id="rMEFTRpMrLWt" />
                            </tr>
                        <tr>
                            <td colspan="2" class="td1">Hand /Wrist:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Repetitive Motions: Hand /Wrist, Bend-->
                                <label>
                                <input type="radio" name="rMHWBRpM" value="<=19 /min." id="rMHWB_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMHWBRpM" value="20-39 /min." id="rMHWB_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMHWBRpM" value=">=40 /min." id="rMHWB_2" />
                                    >=40 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMHWBRpM" value="n/a" id="rMHWB_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMHWBRpMrLWt" value="0" id="rMHWBRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Repetitive Motions: Hand /Wrist, Twist-->
								<label>
                                <input type="radio" name="rMHWTRpM" value="<=19 /min." id="rMHWT_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMHWTRpM" value="20-39 /min." id="rMHWT_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMHWTRpM" value=">=40 /min." id="rMHWT_2" />
                                    >=40 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMHWTRpM" value="n/a" id="rMHWT_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMHWTRpMrLWt" value="0" id="rMHWTRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Trunk:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Repetitive Motions: Trunk, Bend-->
                                <label>
                                <input type="radio" name="rMTBRpM" value="<=19 /min." id="rMTB_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMTBRpM" value="20-39 /min." id="rMTB_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMTBRpM" value=">=40 /min." id="rMTB_2" />
                                    >=40 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMTBRpM" value="n/a" id="rMTB_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMTBRpMrLWt" value="0" id="rMTBRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Repetitive Motions: Trunk, Twist-->
                                <label>
                                <input type="radio" name="rMTTRpM" value="<=19 /min." id="rMTT_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMTTRpM" value="20-39 /min." id="rMTT_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMTTRpM" value=">=40 /min." id="rMTT_2" />
                                    >=40 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMTTRpM" value="n/a" id="rMTT_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMTTRpMrLWt" value="0" id="rMTTRpMrLWt" />
                        </tr>
                        <tr>
                        <td colspan="2" class="td1">Knees:<td colspan="1" class="td2">Squat<td colspan="1" class="td3">
    <!--Repetitive Motions: Knees, Squat-->
                                <label>
                                <input type="radio" name="rMKSRpM" value="<=19 /min." id="rMKS_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMKSRpM" value="20-39 /min." id="rMKS_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMKSRpM" value=">=40 /min." id="rMKS_2" />
                                    >=40 /min.
                                </label>
                                <label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMKSRpM" value="n/a" id="rMKS_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMKSRpMrLWt" value="0" id="rMKSRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Kneel<td colspan="1" class="td3">
    <!--Repetitive Motions: Knees, Kneel-->
                                <label>
                                <input type="radio" name="rMKKRpM" value="<=19 /min." id="rMKK_0" />
                                    <=19 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMKKRpM" value="20-39 /min." id="rMKK_1" />
                                    20-39 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="rMKKRpM" value=">=40 /min." id="rMKK_2" />
                                    >=40 /min.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="rMKKRpM" value="n/a" id="rMKK_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMKKRpMrLWt" value="0" id="rMKKRpMrLWt" />
                        </tr>
<!--section "3. Force in the Hands"-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Force in the Hands:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Grip Force<td colspan="1" class="td3">
    <!--Force in the Hands: Grip Force-->
                                <label>
                                  <input type="radio" name="fHGF" value="Light" id="fHGF_0" />
                                    Light
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="fHGF" value="Hard" id="fHGF_1" />
                                    Hard
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="fHGF" value="Near Maximal" id="fHGF_2" />
                                    Near Maximal
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="fHGF" value="n/a" id="fHGF_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="fHGFrLWt" value="0" id="fHGFrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Pinch Force<td colspan="1" class="td3">
    <!--Force in the Hands: Pinch Force-->
                                <label>
                                  <input type="radio" name="fHPF" value="Light" id="fHPF_0" />
                                    Light
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="fHPF" value="Hard" id="fHPF_1" />
                                    Hard
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="fHPF" value="Near Maximal" id="fHPF_2" />
                                    Near Maximal
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="fHPF" value="n/a" id="fHPF_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="fHPFrLWt" value="0" id="fHPFrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Contact Force<td colspan="1" class="td3">
    <!--Force in the Hands: Contact Force-->
                                <label>
                                  <input type="radio" name="fHCF" value="Light" id="fHCF_0" />
                                    Light
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="fHCF" value="Hard" id="fHCF_1" />
                                    Hard
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="fHCF" value="Near Maximal" id="fHCF_2" />
                                    Near Maximal
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="fHCF" value="n/a" id="fHCF_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="fHCFrLWt" value="0" id="fHCFrLWt" />
                        </tr>
<!--section "4. Lifting /Lowering"-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Lifting /Lowering:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Floor to Knuckle<td colspan="1" class="td3">
    <!--Lifting /Lowering: Floor to Knuckle-->
                                <label>
                                  <input type="radio" name="lLFtK" value="<=9 lbs." id="lLFtK_0" />
                                    <=9 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="lLFtK" value="10-19 lbs." id="lLFtK_1" />
                                    10-19 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="lLFtK" value="20-49 lbs." id="lLFtK_2" />
                                    20-49 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="lLFtK" value=">=50 lbs." id="lLFtK_3" />
                                    >=50 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="lLFtK" value="n/a" id="lLFtK_4" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="lLFtKrLWt" value="0" id="lLFtKrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Knuckle to Shoulder<td colspan="1" class="td3">
    <!--Lifting /Lowering: Knuckle to Shoulder-->
                                <label>
                                  <input type="radio" name="lLKtS" value="<=9 lbs." id="lLKtS_0" />
                                    <=9 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="lLKtS" value="10-19 lbs." id="lLKtS_1" />
                                    10-19 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="lLKtS" value="20-49 lbs." id="lLKtS_2" />
                                    20-49 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="lLKtS" value=">=50 lbs." id="lLKtS_3" />
                                    >=50 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="lLKtS" value="n/a" id="lLKtS_4" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="lLKtSrLWt" value="0" id="lLKtSrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Above Shoulder<td colspan="1" class="td3">
    <!--Lifting /Lowering: Above Shoulder-->
                                <label>
                                  <input type="radio" name="lLAS" value="<=9 lbs." id="lLAS_0" />
                                    <=9 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="lLAS" value="10-19 lbs." id="lLAS_1" />
                                    10-19 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="lLAS" value="20-49 lbs." id="lLAS_2" />
                                    20-49 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="lLAS" value=">=50 lbs." id="lLKtS_3" />
                                    >=50 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="lLAS" value="n/a" id="lLAS_4" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="lLASrLWt" value="0" id="lLASrLWt" />
                        </tr>
<!--section "5. Pushing /Pulling"-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Pushing /Pulling:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td6">
    <!--Pushing /Pulling: Describe-->
                                <label>Describe:<br /><br />
                                    <textarea name="pPDesc" id="pPDesc" cols="25" rows="3" maxlength="140" placeholder="e.g. specifics like pushing vs. pulling, load source, repetition; etc."></textarea>
                                </label>
                            <td colspan="1" class="td6">    
    <!--Pushing /Pulling: Select-->
                                <label>Difficulty:<br /><br />
                                    <input type="radio" name="pPSlct" value="Easy" id="pPSlct_1" />
                                    Easy
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="pPSlct" value="Moderate" id="pPSlct_2" />
                                    Moderate
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="pPSlct" value="Hard" id="pPSlct_3" />
                                    Hard
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="pPSlct" value="n/a" id="pPSlct_4" checked="true" />
                                    n/a
                                </label>
                            <input type="hidden" name="pPSlctrLWt" value="0" id="pPSlctrLWt" />
                        </tr>
<!--section "6. Carrying"-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Carrying:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td6">Distance:<br /><br />
    <!--Carrying: Distance-->
                                <label>
                                  <input type="radio" name="cDist" value="<=9 ft." id="cDist_0" required/>
                                    <=9 ft.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                    <input type="radio" name="cDist" value="10-19 ft." id="cDist_1" required/>
                                    10-19 ft.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="cDist" value="20-49 ft." id="cDist_2" required/>
                                    20-49 ft.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="cDist" value=">=50 ft." id="cDist_3" required/> <!-- Set to "3" from "4" due to variability vs. load -->
                                    >=50 ft.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="cDist" value="n/a" id="cDist_4" checked="true" required/>
                                    n/a
                                </label>
							<input type="hidden" name="cDistrLWt" value="0" id="cDistrLWt" />
                                <td colspan="1" class="td6">Load:<br /><br />
    <!--Carrying: Select-->
                                <label>
                                  <input type="radio" name="cSlct" value="<=9 lbs." id="cSlct_0" required/>
                                    <=9 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="cSlct" value="10-19 lbs." id="cSlct_1" required/>
                                    10-19 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="cSlct" value="20-49 lbs." id="cSlct_2" required/>
                                    20-49 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="cSlct" value=">=50 lbs." id="cSlct_3" required/>
                                    >=50 lbs.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="cSlct" value="n/a" id="cSlct_4" checked="true" required/>
                                    n/a
                                </label>
                            <input type="hidden" name="cSlctrLWt" value="0" id="cSlctrLWt" />
                        </tr>
<!--section "7. Sustained Force"-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Sustained Force:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td6">
    <!--Sustained Force: Describe-->
                                <label>Describe:<br /><br />
                                    <textarea name="sFDesc" id="sFDesc" cols="25" rows="3" maxlength="140" placeholder="e.g. specifics like source, repetition, intensity; etc."></textarea>
                                </label>
                            <td colspan="1" class="td6">Duration:<br /><br />
    <!--Sustained Force: Duration-->
                                <label>
                                <input type="radio" name="sFDrtn" value="<=9 sec." id="sFDrtn_0" />
                                    <=9 sec.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="sFDrtn" value="10-29 sec." id="sFDrtn_1" />
                                    10-29 sec.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                <input type="radio" name="sFDrtn" value=">=30 sec." id="sFDrtn_2" />
                                    >=30 sec.
                                </label>
								<br /><!-- &nbsp;&nbsp; <!-- going more vertical for iPad display -->
                                <label>
                                  <input type="radio" name="sFDrtn" value="n/a" id="sFDrtn_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="sFDrtnrLWt" value="0" id="sFDrtnrLWt" />
                        </tr>
<!--section "8. Vibration"-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Vibration:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2"><td colspan="2" class="td6">
    <!--Vibration: Describe-->                             
                                <label>Applies?&nbsp;&nbsp;
                                <input type="radio" name="vSlct" value="y" id="vSlct" />
                                    Yes
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="vSlct" value="n" id="vSlct" checked="true" />
                                    No
                                </label><br /><br />
							<input type="hidden" name="vDescrLWt" value="0" id="vDescrLWt" />
                                <label>Describe:<br /><br />
                                    <textarea name="vDesc" id="vDesc" cols="25" rows="3" maxlength="140" placeholder="e.g. specifics like source, duration, repetition, intensity; etc." ></textarea>
                                </label>
                        </tr>
<!--section "9. Decibel"-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Noise Levels:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2"><td colspan="2" class="td6">
							<input type="hidden" name="dcblrLWt" value="0" id="dcblrLWt" />
                                <label>Provide Decibel Reading (if applicable):<br /><br />
                                    <input type="text" name="dcbl" id="dcbl" width="10px" ></textarea>
                                </label>
                        </tr>
<!--section "10. Promoter"-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Hazardous Materials:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2"><td colspan="2" class="td6">
    <!--Vibration: Describe-->                             
                                <label>Is Promoter used?&nbsp;&nbsp;
                                <input type="radio" name="prom" value="y" id="prom" />
                                    Yes
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="prom" value="n" id="prom" checked="true" />
                                    No
                                </label><br /><br />
							<input type="hidden" name="promrLWt" value="0" id="promrLWt" />
                        </tr>
<!--section '11. Comments'-->
                <TBODY>
                    <tr>
                        <th colspan="2" class="th3">Other:<td colspan="2"><hr class="hrth3"/>
                    </tr>
                        <tr>
                            <td colspan="2"><td colspan="2" class="td6">
    <!--Comments: Describe-->
                                <label>Please share any additional findings from your assessment (optional):<br /><br />
                                    <textarea name="oComm" id="oComm" cols="25" rows="3" maxlength="420" placeholder="e.g. more info regarding the Risk Factors, issue(s) not covered in this form; etc." ></textarea>
                                </label>
                        </tr>
<!--Submit-->
                <TBODY>
          <TFOOT>
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <input type="submit" name="frmAddRecord" class="button2 buttonh" value="Submit" />
                        <input type="reset" name="frmResetForm" class="button2 buttonh" value="Reset" />
                </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function ()
	{
<!--Area Expand & Require-->
	$("#area").change(function()
		{
		if ($(this).val() != "Production")
			{
			$('#lmnt1').hide();
			$('#lmnt2').hide();
			$('#workCentre').hide(); /*input id=#*/
			$('#workCentre').attr('required',false);
			$('#workCentre').val('n/a');
			$('#lmnt3').hide();
			$('#lmnt4').hide();
			$('#part').hide();
			$('#part').attr('required',false);
			$('#part').val('n/a');
			$('#lmnt5').hide();
			$('#lmnt6').hide();
			$('#position').hide();
			$('#position').attr('required',false);
			$('#position').val('n/a');
			}
		else
			{
			$('#lmnt1').show();
			$('#lmnt2').show();
			$('#workCentre').show();
			$('#workCentre').attr('required',true);
			$('#workCentre').val('');
			$('#lmnt3').show();
			$('#lmnt4').show();
			$('#part').show();
			$('#part').attr('required',true);
			$('#part').val('');
			$('#lmnt5').show();
			$('#lmnt6').show();
			$('#position').show();
			$('#position').attr('required',true);
			$('#position').val('');
			}
		});
<!--START Risk Level Hidden Field Calc-->
	<!--Awkward Postures: Neck, Bend-->
	$('input[name="aPNB"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPNBrLWt').val('0');
				}
			else
				{
				$('#aPNBrLWt').val('1');
				}
			}
		else
			{
			$('#aPNBrLWt').val('2');
			}
		});
    <!--Awkward Postures: Neck, Twist-->
	$('input[name="aPNT"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPNTrLWt').val('0');
				}
			else
				{
				$('#aPNTrLWt').val('1');
				}
			}
		else
			{
			$('#aPNTrLWt').val('2');
			}
		});
    <!--Awkward Postures: Shoulder, Extended Reach-->
	$('input[name="aPSER"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPSERrLWt').val('0');
				}
			else
				{
				$('#aPSERrLWt').val('1');
				}
			}
		else
			{
			$('#aPSERrLWt').val('2');
			}
		});
    <!--Awkward Postures: Elbow /Forearm, Twist-->
	$('input[name="aPEFT"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPEFTrLWt').val('0');
				}
			else
				{
				$('#aPEFTrLWt').val('1');
				}
			}
		else
			{
			$('#aPEFTrLWt').val('2');
			}
		});
    <!--Awkward Postures: Hand /Wrist, Bend-->
	$('input[name="aPHWB"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPHWBrLWt').val('0');
				}
			else
				{
				$('#aPHWBrLWt').val('1');
				}
			}
		else
			{
			$('#aPHWBrLWt').val('2');
			}
		});
    <!--Awkward Postures: Hand /Wrist, Twist-->
	$('input[name="aPHWT"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPHWTrLWt').val('0');
				}
			else
				{
				$('#aPHWTrLWt').val('1');
				}
			}
		else
			{
			$('#aPHWTrLWt').val('2');
			}
		});
    <!--Awkward Postures: Trunk, Bend-->
	$('input[name="aPTB"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPTBrLWt').val('0');
				}
			else
				{
				$('#aPTBrLWt').val('1');
				}
			}
		else
			{
			$('#aPTBrLWt').val('2');
			}
		});
    <!--Awkward Postures: Trunk, Twist-->
	$('input[name="aPTT"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPTTrLWt').val('0');
				}
			else
				{
				$('#aPTTrLWt').val('1');
				}
			}
		else
			{
			$('#aPTTrLWt').val('2');
			}
		});
    <!--Awkward Postures: Knees, Squat-->
	$('input[name="aPKS"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPKSrLWt').val('0');
				}
			else
				{
				$('#aPKSrLWt').val('1');
				}
			}
		else
			{
			$('#aPKSrLWt').val('2');
			}
		});
    <!--Awkward Postures: Knees, Kneel-->
	$('input[name="aPKK"]').change(function()
		{
		if ($(this).val() != 'Sustained')
			{
			if ($(this).val() != 'Repeated')
				{
				$('#aPKKrLWt').val('0');
				}
			else
				{
				$('#aPKKrLWt').val('1');
				}
			}
		else
			{
			$('#aPKKrLWt').val('2');
			}
		});
    <!--Repetitive Motions: Neck, Bend-->
	$('input[name="rMNBRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMNBRpMrLWt').val('0');
					}
				else
					{
					$('#rMNBRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMNBRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMNBRpMrLWt').val('3');
			}
		});
    <!--Repetitive Motions: Neck, Twist-->
	$('input[name="rMNTRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMNTRpMrLWt').val('0');
					}
				else
					{
					$('#rMNTRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMNTRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMNTRpMrLWt').val('3');
			}
		});
    <!--Repetitive Motions: Shoulder, Extended Reach-->
	$('input[name="rMSERRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMSERRpMrLWt').val('0');
					}
				else
					{
					$('#rMSERRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMSERRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMSERRpMrLWt').val('3');
			}
		});
    <!--Repetitive Motions: Elbow /Forearm, Twist-->
	$('input[name="rMEFTRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMEFTRpMrLWt').val('0');
					}
				else
					{
					$('#rMEFTRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMEFTRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMEFTRpMrLWt').val('3');
			}
		});
    <!--Repetitive Motions: Hand /Wrist, Bend-->
	$('input[name="rMHWBRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMHWBRpMrLWt').val('0');
					}
				else
					{
					$('#rMHWBRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMHWBRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMHWBRpMrLWt').val('3');
			}
		});
    <!--Repetitive Motions: Hand /Wrist, Twist-->
	$('input[name="rMHWTRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMHWTRpMrLWt').val('0');
					}
				else
					{
					$('#rMHWTRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMHWTRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMHWTRpMrLWt').val('3');
			}
		});
    <!--Repetitive Motions: Trunk, Bend-->
	$('input[name="rMTBRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMTBRpMrLWt').val('0');
					}
				else
					{
					$('#rMTBRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMTBRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMTBRpMrLWt').val('3');
			}
		});
    <!--Repetitive Motions: Trunk, Twist-->
	$('input[name="rMTTRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMTTRpMrLWt').val('0');
					}
				else
					{
					$('#rMTTRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMTTRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMTTRpMrLWt').val('3');
			}
		});
    <!--Repetitive Motions: Knees, Squat-->
	$('input[name="rMKSRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMKSRpMrLWt').val('0');
					}
				else
					{
					$('#rMKSRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMKSRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMKSRpMrLWt').val('3');
			}
		});
    <!--Repetitive Motions: Knees, Kneel-->
	$('input[name="rMKKRpM"]').change(function()
		{
		if ($(this).val() != '>=40 /min.')
			{
			if ($(this).val() != '20-39 /min.')
				{
				if ($(this).val() != '<=19 /min.')
					{
					$('#rMKKRpMrLWt').val('0');
					}
				else
					{
					$('#rMKKRpMrLWt').val('1');
					}
				}
			else
				{
				$('#rMKKRpMrLWt').val('2');
				}
			}
		else
			{
			$('#rMKKRpMrLWt').val('3');
			}
		});
    <!--Force in the Hands: Grip Force-->
	$('input[name="fHGF"]').change(function()
		{
		if ($(this).val() != 'Near Maximal')
			{
			if ($(this).val() != 'Hard')
				{
				if ($(this).val() != 'Light')
					{
					$('#fHGFrLWt').val('0');
					}
				else
					{
					$('#fHGFrLWt').val('1');
					}
				}
			else
				{
				$('#fHGFrLWt').val('2');
				}
			}
		else
			{
			$('#fHGFrLWt').val('3');
			}
		});
    <!--Force in the Hands: Pinch Force-->
	$('input[name="fHPF"]').change(function()
		{
		if ($(this).val() != 'Near Maximal')
			{
			if ($(this).val() != 'Hard')
				{
				if ($(this).val() != 'Light')
					{
					$('#fHPFrLWt').val('0');
					}
				else
					{
					$('#fHPFrLWt').val('1');
					}
				}
			else
				{
				$('#fHPFrLWt').val('2');
				}
			}
		else
			{
			$('#fHPFrLWt').val('3');
			}
		});
    <!--Force in the Hands: Contact Force-->
	$('input[name="fHCF"]').change(function()
		{
		if ($(this).val() != 'Near Maximal')
			{
			if ($(this).val() != 'Hard')
				{
				if ($(this).val() != 'Light')
					{
					$('#fHCFrLWt').val('0');
					}
				else
					{
					$('#fHCFrLWt').val('1');
					}
				}
			else
				{
				$('#fHCFrLWt').val('2');
				}
			}
		else
			{
			$('#fHCFrLWt').val('3');
			}
		});
    <!--Lifting /Lowering: Floor to Knuckle-->
	$('input[name="lLFtK"]').change(function()
		{
		if ($(this).val() != '>=50 lbs.')
			{
			if ($(this).val() != '20-49 lbs.')
				{
				if ($(this).val() != '10-19 lbs.')
					{
					if ($(this).val() != '<=9 lbs.')
						{
						$('#lLFtKrLWt').val('0');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						}
					else
						{
						$('#lLFtKrLWt').val('1');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						}
					}
				else
					{
					$('#lLFtKrLWt').val('2');
					<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
					}
				}
			else
				{
				$('#lLFtKrLWt').val('3');
				<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
				}
			}
		else
			{
			$('#lLFtKrLWt').val('4');
			$('#orLWt').val('4');
			}
		});
    <!--Lifting /Lowering: Knuckle to Shoulder-->
	$('input[name="lLKtS"]').change(function()
		{
		if ($(this).val() != '>=50 lbs.')
			{
			if ($(this).val() != '20-49 lbs.')
				{
				if ($(this).val() != '10-19 lbs.')
					{
					if ($(this).val() != '<=9 lbs.')
						{
						$('#lLKtSrLWt').val('0');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						}
					else
						{
						$('#lLKtSrLWt').val('1');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						}
					}
				else
					{
					$('#lLKtSrLWt').val('2');
					<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
					}
				}
			else
				{
				$('#lLKtSrLWt').val('3');
				<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
			}
				}
		else
			{
			$('#lLKtSrLWt').val('4');
			$('#orLWt').val('4');
			}
		});
    <!--Lifting /Lowering: Above Shoulder-->
	$('input[name="lLAS"]').change(function()
		{
		if ($(this).val() != '>=50 lbs.')
			{
			if ($(this).val() != '20-49 lbs.')
				{
				if ($(this).val() != '10-19 lbs.')
					{
					if ($(this).val() != '<=9 lbs.')
						{
						$('#lLASrLWt').val('0');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						}
					else
						{
						$('#lLASrLWt').val('1');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						}
					}
				else
					{
					$('#lLASrLWt').val('2');
					<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
					}
				}
			else
				{
				$('#lLASrLWt').val('3');
				<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
				}
			}
		else
			{
			$('#lLASrLWt').val('4');
			$('#orLWt').val('4');
			}
		});
	<!--Pushing /Pulling: Select-->
	$('input[name="pPSlct"]').change(function()
			{
			if ($(this).val() != 'Hard')
				{
				if ($(this).val() != 'Moderate')
					{
					if ($(this).val() != 'Easy')
						{
						$('#pPSlctrLWt').val('0');
						$('#pPDesc').attr('required',false);
						}
					else
						{
						$('#pPSlctrLWt').val('1');
						$('#pPDesc').attr('required',true);
						}
					}
				else
					{
					$('#pPSlctrLWt').val('2');
					$('#pPDesc').attr('required',true);
					}
				}
			else
				{
				$('#pPSlctrLWt').val('3');
				$('#pPDesc').attr('required',true);
				}
			});
		});
    <!--Carrying: Distance-->
	$('input[name="cDist"]').change(function()
		{
		if ($(this).val() != '>=50 ft.')
			{
			if ($(this).val() != '20-49 ft.')
				{
				if ($(this).val() != '10-19 ft.')
					{
					if ($(this).val() != '<=9 ft.')
						{
						$('#cDistrLWt').val('0');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						$('#cSlct').attr('required',false);
						$('#cSlct_4').attr('checked',true);
						}
					else
						{
						$('#cDistrLWt').val('1');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						$('#cSlct').attr('required',true);
						$('#cSlct_4').attr('checked',false);
						}
					}
				else
					{
					$('#cDistrLWt').val('1');
					<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
					$('#cSlct').attr('required',true);
					$('#cSlct_4').attr('checked',false);
					}
				}
			else
				{
				$('#cDistrLWt').val('2');
				<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
				$('#cSlct').attr('required',true);
				$('#cSlct_4').attr('checked',false);
				}
			}
		else
			{
			$('#cDistrLWt').val('2');
			<!--$('#orLWt').val('4');<!--Big badda booboo!!!!-->
			$('#cSlct').attr('required',true);
			$('#cSlct_4').attr('checked',false);
			}
		});
	<!--Carrying: Select-->
	$('input[name="cSlct"]').change(function()
		{
		if ($(this).val() != '>=50 lbs.')
			{
			if ($(this).val() != '20-49 lbs.')
				{
				if ($(this).val() != '10-19 lbs.')
					{
					if ($(this).val() != '<=9 lbs.')
						{
						$('#cSlctrLWt').val('0');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						$('#cDist').attr('required',false);
						$('#cDist_4').attr('checked',true);
						}
					else
						{
						$('#cSlctrLWt').val('1');
						<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
						$('#cDist').attr('required',true);
						$('#cDist_4').attr('checked',false);
						}
					}
				else
					{
					$('#cSlctrLWt').val('2');
					<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
					$('#cDist').attr('required',true);
					$('#cDist_4').attr('checked',false);
					}
				}
			else
				{
				$('#cSlctrLWt').val('3');
				<!--$('#orLWt').val('');<!--Big badda booboo!!!!-->
				$('#cDist').attr('required',true);
				$('#cDist_4').attr('checked',false);
				}
			}
		else
			{
			$('#cSlctrLWt').val('4');
			$('#orLWt').val('4');
			$('#cDist').attr('required',true);
			$('#cDist_4').attr('checked',false);
			}
		});
    <!--Sustained Force: Duration-->
	$('input[name="sFDrtn"]').change(function()
		{
		if ($(this).val() != '>=30 sec.')
			{
			if ($(this).val() != '10-29 sec.')
				{
				if ($(this).val() != '<=9 sec.')
					{
					$('#sFDrtnrLWt').val('0');
					$('#sFDesc').attr('required',false);
					}
				else
					{
					$('#sFDrtnrLWt').val('1');
					$('#sFDesc').attr('required',true);
					}
				}
			else
				{
				$('#sFDrtnrLWt').val('2');
				$('#sFDesc').attr('required',true);
				}
			}
		else
			{
			$('#sFDrtnrLWt').val('3');
			$('#sFDesc').attr('required',true);
			}
		});
    <!--Vibration: Describe-->
	$('input[name="vSlct"]').change(function()
		{
		if ($(this).val() != 'n')
			{
			$('#vDescrLWt').val('3');
			$('#vDesc').attr('required',true);
			}
		else
			{
			$('#vDescrLWt').val('0');
			$('#vDesc').attr('required',false);
			}
		});
<!--END Risk Level Hidden Field Calc-->
<!--START Form Submission Checks-->
function checkForm(form)
	{
	if(!checkDate(form.assessmentDate)) return false;
	if(!orLWtCheck(form.orLWt)) return false;
	return true;
	}
<!--START Assessment Date Checks (esp. re. IE)-->
function checkDate(assessmentDate)
	{
    var allowBlank = true;
    var currentYear = (new Date()).getFullYear();
	var inputDate = assessmentDate.value;
	var userDate = new Date(inputDate);
	var theDate = new Date;
    var errorMsg = "";
    re = /^(\d{4})-(\d{1,2})-(\d{1,2})$/;
	if(assessmentDate.value != '')
		{
		if(userDate > theDate)
				{
				errorMsg = "Silly rabbit, time travel not allowed!\nAssessment Date must be today or earlier.\nYour entry: " + assessmentDate.value;
				}
		else if(regs = assessmentDate.value.match(re))
			{
			if(regs[1] > currentYear)
				{
				errorMsg = "Year must be less than or equal to " + currentYear + ".\nYour entry: " + regs[1];
				}
			else if(regs[2] < 1 || regs[2] > 12)
				{
				errorMsg = "Month value must be from 1 to 12.\nYour entry: " + regs[2];
				}
	/*leap year check start*/				
			else if (regs[2] == 2)
				{
				var leapYear = false;  
				if ( (!(regs[1] % 4) && regs[1] % 100) || !(regs[1] % 400))
					{
					leapYear = true;
					}
					if ((leapYear==true) && (regs[3]=29))
						{
						errorMsg = "But, that's no leap year!\nYour Entry: " + assessmentDate.value;
						}
							if ((leapYear==true) && (regs[3]>29))
							{
							errorMsg = "I don't think February has more than 29 days in any year, does it? !)\nYour Entry: " + assessmentDate.value;
							}
				}
	/*leap year check end*/				
			else if(regs[3] < 1 || regs[3] > 31)
				{
				errorMsg = "Day value must be from 1 to 31.\nYour entry: " + regs[3];
				}
			
			/*former tomorrow check locale*/
			
			}
		else
			{
			errorMsg = "Date must be numeric in format: YYYY-MM-DD\nYour Entry: " + assessmentDate.value;
			}
		}
	else if(!allowBlank)
		{
		errorMsg = "No performing assessments outside of time!\nPlease select an Assessment Date.";
		}
    if(errorMsg != "")
		{
		alert(errorMsg);
		assessmentDate.focus();
		return false;
		}
	return true;
	}
<!--END Assessment Date Checks (esp. re. IE)-->
function orLWtCheck(orLWt)
	{
	/*rLWtFours = 0;
	$("input[type='hidden']").each(function(i, val)
			{
			if ($(this).val() == '4')
				{
				rLWtFours++;
				
				if (rLWtFours != 0)
					{
					document.forms["form1"]["orLWt"].value == "4";
					}
				else
					{
					document.forms["form1"]["orLWt"].value == "0";
					}
				}
			});*/
			
	if('#lLFtK' !== ">=50 lbs." && "#lLKtS" !== ">=50 lbs." && "#lLAS" !== ">=50 lbs." && "#cSlct" !== ">=50 lbs.")
		{
		document.forms["form1"]["orLWt"].value = "";
		}
	/*if ('#lLKtS' != '>=50 lbs.')
		{
		document.forms["form1"]["orLWt"].value = "";
		}
	if ('#lLAS' != '>=50 lbs.')
		{
		document.forms["form1"]["orLWt"].value = "";
		}
	if ('#cSlct' != '>=50 lbs.')
		{
		document.forms["form1"]["orLWt"].value = "";
		}*/
		
	if(document.forms["form1"]["orLWt"].value !== "4")
		{
		rLWtThrees = 0;
		rLWtTwos = 0;
		rLWtOnes = 0;
		$("input[type='hidden']").each(function(i, val)
			{
			if ($(this).val() == '3')
				{
				rLWtThrees++;
				}
			});
		$("input[type='hidden']").each(function(i, val)
			{
			if ($(this).val() == '2')
				{
				rLWtTwos++;
				}
			});
		$("input[type='hidden']").each(function(i, val)
			{
			if ($(this).val() == '1')
				{
				rLWtOnes++;
				}
			});
		var quotient = Math.round((rLWtThrees*3+rLWtTwos*2+rLWtOnes)/(rLWtThrees+rLWtTwos+rLWtOnes));
		/*if(isNaN(quotient))
			{
			alert("Uh uh uh! You didn't provide Risk Factors data!\nPlease edit at least one of the Risk Factors sections with your findings.");
			return false;
			}*/
		document.forms["form1"]["orLWt"].value = quotient;
		}
	return true;
	}
<!--END Form Submission Checks-->
</script>
<?php include ('include/footer.php'); ?>