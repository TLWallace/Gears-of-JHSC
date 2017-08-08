<?php include ('include/header.php'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
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
            <input type="hidden" name="orLWt" value="" id="orLWt" />
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
                        <th colspan="1" id="lmnt1" style="display:none;" class="th1">Work Centre:
                        <td colspan="1" id="lmnt2" style="display:none;">
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
                        <input type="date" name="assessmentDate" id="assessmentDate" required/><span class="smallprint">(YYYY-MM-DD if using Internet Explorer)</span>
                        <th colspan="1" id="lmnt3" style="display:none;" class="th1">Part:
                        <td colspan="1" id="lmnt4" style="display:none;">
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
                        <th colspan="3" id="lmnt5" style="display:none;" class="th1">Position:
                        <td colspan="1" id="lmnt6" style="display:none;">
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
                                  <input type="radio" name="aPNB" value="RQAP101" id="aPNB_0" />
                                    Repeated
                                </label>
								&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="aPNB" value="RQAP102" id="aPNB_1" />
                                    Sustained
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="aPNB" value="RQZZ101" id="aPNB_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPNBrLWt" value="RL00" id="aPNBrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Awkward Postures: Neck, Twist-->
                                <label>
                                  <input type="radio" name="aPNT" value="RQAP101" id="aPNT_0" />
                                    Repeated
                                </label>
								&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="aPNT" value="RQAP102" id="aPNT_1" />
                                    Sustained
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="aPNT" value="RQZZ101" id="aPNT_2" checked="true"/>
                                    n/a
                                </label>
							<input type="hidden" name="aPNTrLWt" value="RL00" id="aPNTrLWt" />
                        </tr>
						<tr>
                            <td colspan="2" class="td1">Shoulder:<td colspan="1" class="td2">Extended Reach<td colspan="1" class="td3">
    <!--Awkward Postures: Shoulder, Extended Reach-->
                                <label>
                                	<input type="radio" name="aPSER" value="RQAP101" id="aPSER" />
                                    Repeated
                                </label>    
                                &nbsp;&nbsp;
                                <label>    
                                	<input type="radio" name="aPSER" value="RQAP102" id="aPSER" />
                                    Sustained
                                </label>
                                &nbsp;&nbsp;
                                <label>    
                                	<input type="radio" name="aPSER" value="RQZZ101" id="aPSER" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPSERrLWt" value="RL00" id="aPSERrLWt" />
                        </tr>
						<tr>
                            <td colspan="2" class="td1">Elbow /Forearm:<td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Awkward Postures: Elbow /Forearm, Twist-->
                                <label>
                                	<input type="radio" name="aPEFT" value="RQAP101" id="aPEFT" />
                                    Repeated
                                </label>    
                                &nbsp;&nbsp;
                                <label>    
                                	<input type="radio" name="aPEFT" value="RQAP102" id="aPEFT" />
                                    Sustained
                                </label>
                                &nbsp;&nbsp;
                                <label>    
                                	<input type="radio" name="aPEFT" value="RQZZ101" id="aPEFT" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPEFTrLWt" value="RL00" id="aPEFTrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Hand /Wrist:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Awkward Postures: Hand /Wrist, Bend-->
                                <label>
                                  <input type="radio" name="aPHWB" value="RQAP101" id="aPHWB_0" />
                                    Repeated
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="aPHWB" value="RQAP102" id="aPHWB_1" />
                                    Sustained
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="aPHWB" value="RQZZ101" id="aPHWB_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPHWBrLWt" value="RL00" id="aPHWBrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Awkward Postures: Hand /Wrist, Twist-->
                                <label>
                                  <input type="radio" name="aPHWT" value="RQAP101" id="aPHWT_0" />
                                    Repeated
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="aPHWT" value="RQAP102" id="aPHWT_1" />
                                    Sustained
                                </label>
                                &nbsp;&nbsp;
                                <label>	
                                  <input type="radio" name="aPHWT" value="RQZZ101" id="aPHWT_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPHWTrLWt" value="RL00" id="aPHWTrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Trunk:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Awkward Postures: Trunk, Bend-->
                                <label>
                                  <input type="radio" name="aPTB" value="RQAP101" id="aPTB_0" />
                                    Repeated
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="aPTB" value="RQAP102" id="aPTB_1" />
                                    Sustained
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="aPTB" value="RQZZ101" id="aPTB_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPTBrLWt" value="RL00" id="aPTBrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Awkward Postures: Trunk, Twist-->
                                <label>
                                    <input type="radio" name="aPTT" value="RQAP101" id="aPTT_0" />
                                    Repeated
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="aPTT" value="RQAP102" id="aPTT_1" />
                                    Sustained
                                </label>
                                &nbsp;&nbsp;
                                <label>	
                                    <input type="radio" name="aPTT" value="RQZZ101" id="aPTT_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPTTrLWt" value="RL00" id="aPTTrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Knees:<td colspan="1" class="td2">Squat<td colspan="1" class="td3">
    <!--Awkward Postures: Knees, Squat-->
                                <label>
                                    <input type="radio" name="aPKS" value="RQAP101" id="aPKS_0" />
                                    Repeated
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="aPKS" value="RQAP102" id="aPKS_1" />
                                    Sustained
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="aPKS" value="RQZZ101" id="aPKS_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPKSrLWt" value="RL00" id="aPKSrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Kneel<td colspan="1" class="td3">
    <!--Awkward Postures: Knees, Kneel-->
                                <label>
                                    <input type="radio" name="aPKK" value="RQAP101" id="aPKK_0" />
                                    Repeated
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="aPKK" value="RQAP102" id="aPKK_1" />
                                    Sustained
                                </label>
                                &nbsp;&nbsp;
                                <label>	
                                    <input type="radio" name="aPKK" value="RQZZ101" id="aPKK_2" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="aPKKrLWt" value="RL00" id="aPKKrLWt" />
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
                                <input type="radio" name="rMNBRpM" value="RQRM101" id="rMNB_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMNBRpM" value="RQRM102" id="rMNB_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMNBRpM" value="RQRM103" id="rMNB_2" />
                                    >=40 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMNBRpM" value="RQZZ101" id="rMNB_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMNBRpMrLWt" value="RL00" id="rMNBRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Repetitive Motions: Neck, Twist-->
                                <label>
                                <input type="radio" name="rMNTRpM" value="RQRM101" id="rMNT_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMNTRpM" value="RQRM102" id="rMNT_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMNTRpM" value="RQRM103" id="rMNT_2" />
                                    >=40 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMNTRpM" value="RQZZ101" id="rMNT_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMNTRpMrLWt" value="RL00" id="rMNTRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Shoulder:<td colspan="1" class="td2">Extended Reach<td colspan="1" class="td3">
    <!--Repetitive Motions: Shoulder, Extended Reach-->
                                <label>
                                <input type="radio" name="rMSERRpM" value="RQRM101" id="rMSER_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMSERRpM" value="RQRM102" id="rMSER_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMSERRpM" value="RQRM103" id="rMSER_2" />
                                    >=40 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMSERRpM" value="RQZZ101" id="rMSER_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMSERRpMrLWt" value="RL00" id="rMSERRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Elbow /Forearm:<td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Repetitive Motions: Elbow /Forearm, Twist-->
                                <label>
                                <input type="radio" name="rMEFTRpM" value="RQRM101" id="rMEFT_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMEFTRpM" value="RQRM102" id="rMEFT_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMEFTRpM" value="RQRM103" id="rMEFT_2" />
                                    >=40 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMEFTRpM" value="RQZZ101" id="rMEFT_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMEFTRpMrLWt" value="RL00" id="rMEFTRpMrLWt" />
                            </tr>
                        <tr>
                            <td colspan="2" class="td1">Hand /Wrist:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Repetitive Motions: Hand /Wrist, Bend-->
                                <label>
                                <input type="radio" name="rMHWBRpM" value="RQRM101" id="rMHWB_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMHWBRpM" value="RQRM102" id="rMHWB_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMHWBRpM" value="RQRM103" id="rMHWB_2" />
                                    >=40 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMHWBRpM" value="RQZZ101" id="rMHWB_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMHWBRpMrLWt" value="RL00" id="rMHWBRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Repetitive Motions: Hand /Wrist, Twist-->
								<label>
                                <input type="radio" name="rMHWTRpM" value="RQRM101" id="rMHWT_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMHWTRpM" value="RQRM102" id="rMHWT_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMHWTRpM" value="RQRM103" id="rMHWT_2" />
                                    >=40 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMHWTRpM" value="RQZZ101" id="rMHWT_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMHWTRpMrLWt" value="RL00" id="rMHWTRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2" class="td1">Trunk:<td colspan="1" class="td2">Bend<td colspan="1" class="td3">
    <!--Repetitive Motions: Trunk, Bend-->
                                <label>
                                <input type="radio" name="rMTBRpM" value="RQRM101" id="rMTB_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMTBRpM" value="RQRM102" id="rMTB_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMTBRpM" value="RQRM103" id="rMTB_2" />
                                    >=40 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMTBRpM" value="RQZZ101" id="rMTB_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMTBRpMrLWt" value="RL00" id="rMTBRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Twist<td colspan="1" class="td3">
    <!--Repetitive Motions: Trunk, Twist-->
                                <label>
                                <input type="radio" name="rMTTRpM" value="RQRM101" id="rMTT_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMTTRpM" value="RQRM102" id="rMTT_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMTTRpM" value="RQRM103" id="rMTT_2" />
                                    >=40 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMTTRpM" value="RQZZ101" id="rMTT_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMTTRpMrLWt" value="RL00" id="rMTTRpMrLWt" />
                        </tr>
                        <tr>
                        <td colspan="2" class="td1">Knees:<td colspan="1" class="td2">Squat<td colspan="1" class="td3">
    <!--Repetitive Motions: Knees, Squat-->
                                <label>
                                <input type="radio" name="rMKSRpM" value="RQRM101" id="rMKS_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMKSRpM" value="RQRM102" id="rMKS_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMKSRpM" value="RQRM103" id="rMKS_2" />
                                    >=40 /min.
                                </label>
                                <label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMKSRpM" value="RQZZ101" id="rMKS_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMKSRpMrLWt" value="RL00" id="rMKSRpMrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Kneel<td colspan="1" class="td3">
    <!--Repetitive Motions: Knees, Kneel-->
                                <label>
                                <input type="radio" name="rMKKRpM" value="RQRM101" id="rMKK_0" />
                                    <=19 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMKKRpM" value="RQRM102" id="rMKK_1" />
                                    20-39 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="rMKKRpM" value="RQRM103" id="rMKK_2" />
                                    >=40 /min.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="rMKKRpM" value="RQZZ101" id="rMKK_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="rMKKRpMrLWt" value="RL00" id="rMKKRpMrLWt" />
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
                                  <input type="radio" name="fHGF" value="RQFH101" id="fHGF_0" />
                                    Light
                                </label>
								&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="fHGF" value="RQFH102" id="fHGF_1" />
                                    Hard
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="fHGF" value="RQFH103" id="fHGF_2" />
                                    Near Maximal
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="fHGF" value="RQZZ101" id="fHGF_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="fHGFrLWt" value="RL00" id="fHGFrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Pinch Force<td colspan="1" class="td3">
    <!--Force in the Hands: Pinch Force-->
                                <label>
                                  <input type="radio" name="fHPF" value="RQFH101" id="fHPF_0" />
                                    Light
                                </label>
								&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="fHPF" value="RQFH102" id="fHPF_1" />
                                    Hard
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="fHPF" value="RQFH103" id="fHPF_2" />
                                    Near Maximal
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="fHPF" value="RQZZ101" id="fHPF_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="fHPFrLWt" value="RL00" id="fHPFrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Contact Force<td colspan="1" class="td3">
    <!--Force in the Hands: Contact Force-->
                                <label>
                                  <input type="radio" name="fHCF" value="RQFH101" id="fHCF_0" />
                                    Light
                                </label>
								&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="fHCF" value="RQFH102" id="fHCF_1" />
                                    Hard
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="fHCF" value="RQFH103" id="fHCF_2" />
                                    Near Maximal
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="fHCF" value="RQZZ101" id="fHCF_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="fHCFrLWt" value="RL00" id="fHCFrLWt" />
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
                                  <input type="radio" name="lLFtK" value="RQLL101" id="lLFtK_0" />
                                    <=9 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="lLFtK" value="RQLL102" id="lLFtK_1" />
                                    10-19 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="lLFtK" value="RQLL103" id="lLFtK_2" />
                                    20-49 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="lLFtK" value="RQLL104" id="lLFtK_3" />
                                    >=50 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="lLFtK" value="RQZZ101" id="lLFtK_4" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="lLFtKrLWt" value="RL00" id="lLFtKrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Knuckle to Shoulder<td colspan="1" class="td3">
    <!--Lifting /Lowering: Knuckle to Shoulder-->
                                <label>
                                  <input type="radio" name="lLKtS" value="RQLL101" id="lLKtS_0" />
                                    <=9 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="lLKtS" value="RQLL102" id="lLKtS_1" />
                                    10-19 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="lLKtS" value="RQLL103" id="lLKtS_2" />
                                    20-49 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="lLKtS" value="RQLL104" id="lLKtS_3" />
                                    >=50 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="lLKtS" value="RQZZ101" id="lLKtS_4" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="lLKtSrLWt" value="RL00" id="lLKtSrLWt" />
                        </tr>
                        <tr>
                            <td colspan="2"><td colspan="1" class="td2">Above Shoulder<td colspan="1" class="td3">
    <!--Lifting /Lowering: Above Shoulder-->
                                <label>
                                  <input type="radio" name="lLAS" value="RQLL101" id="lLAS_0" />
                                    <=9 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="lLAS" value="RQLL102" id="lLAS_1" />
                                    10-19 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="lLAS" value="RQLL103" id="lLAS_2" />
                                    20-49 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="lLAS" value="RQLL104" id="lLKtS_3" />
                                    >=50 lbs.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="lLAS" value="RQZZ101" id="lLAS_4" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="lLASrLWt" value="RL00" id="lLASrLWt" />
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
                                    <input type="radio" name="pPSlct" value="RQPP101" id="pPSlct_1" />
                                    Easy
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="pPSlct" value="RQPP102" id="pPSlct_2" />
                                    Moderate
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="pPSlct" value="RQPP103" id="pPSlct_3" />
                                    Hard
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="pPSlct" value="RQZZ101" id="pPSlct_4" checked="true" />
                                    n/a
                                </label>
                            <input type="hidden" name="pPSlctrLWt" value="RL00" id="pPSlctrLWt" />
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
                                  <input type="radio" name="cDist" value="RQCD101" id="cDist_0" required/>
                                    <=9 ft.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                    <input type="radio" name="cDist" value="RQCD102" id="cDist_1" required/>
                                    10-19 ft.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="cDist" value="RQCD103" id="cDist_2" required/>
                                    20-49 ft.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="cDist" value="RQCD103" id="cDist_3" required/> <!-- Set to "3" from "4" due to variability vs. load -->
                                    >=50 ft.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="cDist" value="RQZZ101" id="cDist_4" checked="true" required/>
                                    n/a
                                </label>
							<input type="hidden" name="cDistrLWt" value="RL00" id="cDistrLWt" />
                                <td colspan="1" class="td6">Load:<br /><br />
    <!--Carrying: Select-->
                                <label>
                                  <input type="radio" name="cSlct" value="RQLL101" id="cSlct_0" required/>
                                    <=9 lbs.
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                <input type="radio" name="cSlct" value="RQLL102" id="cSlct_1" required/>
                                    10-19 lbs.
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                <input type="radio" name="cSlct" value="RQLL103" id="cSlct_2" required/>
                                    20-49 lbs.
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                <input type="radio" name="cSlct" value="RQLL104" id="cSlct_3" required/>
                                    >=50 lbs.
                                </label>
                                &nbsp;&nbsp;
                                <label>
                                <input type="radio" name="cSlct" value="RQZZ101" id="cSlct_4" checked="true" required/>
                                    n/a
                                </label>
                            <input type="hidden" name="cSlctrLWt" value="RL00" id="cSlctrLWt" />
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
                                <input type="radio" name="sFDrtn" value="RQSF101" id="sFDrtn_0" />
                                    <=9 sec.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="sFDrtn" value="RQSF102" id="sFDrtn_1" />
                                    10-29 sec.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                <input type="radio" name="sFDrtn" value="RQSF103" id="sFDrtn_2" />
                                    >=30 sec.
                                </label>
								&nbsp;&nbsp;
                                <label>
                                  <input type="radio" name="sFDrtn" value="RQZZ101" id="sFDrtn_3" checked="true" />
                                    n/a
                                </label>
							<input type="hidden" name="sFDrtnrLWt" value="RL00" id="sFDrtnrLWt" />
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
									<select name="vSlct" id="vSlct" class="slct" required>
                                        <option value="" disabled selected style='display: none;'>Select...</option>
                                        <option value="y">Yes</option>
                                        <option value="n">No</option>
                                    </select>
                                </label><br /><br />
                                <label>Describe:<br /><br />
                                    <textarea name="vDesc" id="vDesc" cols="25" rows="3" maxlength="140" placeholder="e.g. specifics like source, duration, repetition, intensity; etc." ></textarea>
                                </label>
							<input type="hidden" name="vDescrLWt" value="RL00" id="vDescrLWt" />
                        </tr>

<!--section '9. Comments'-->
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
	$("#area").click(function()
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
	$('input[name="aPNB"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPNBrLWt').val('RL00');
				}
			else
				{
				$('#aPNBrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPNBrLWt').val('RL13');
			}
		});
    <!--Awkward Postures: Neck, Twist-->
	$('input[name="aPNT"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPNTrLWt').val('RL00');
				}
			else
				{
				$('#aPNTrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPNTrLWt').val('RL13');
			}
		});
    <!--Awkward Postures: Shoulder, Extended Reach-->
	$('input[name="aPSER"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPSERrLWt').val('RL00');
				}
			else
				{
				$('#aPSERrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPSERrLWt').val('RL13');
			}
		});
    <!--Awkward Postures: Elbow /Forearm, Twist-->
	$('input[name="aPEFT"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPEFTrLWt').val('RL00');
				}
			else
				{
				$('#aPEFTrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPEFTrLWt').val('RL13');
			}
		});
    <!--Awkward Postures: Hand /Wrist, Bend-->
	$('input[name="aPHWB"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPHWBrLWt').val('RL00');
				}
			else
				{
				$('#aPHWBrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPHWBrLWt').val('RL13');
			}
		});
    <!--Awkward Postures: Hand /Wrist, Twist-->
	$('input[name="aPHWT"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPHWTrLWt').val('RL00');
				}
			else
				{
				$('#aPHWTrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPHWTrLWt').val('RL13');
			}
		});
    <!--Awkward Postures: Trunk, Bend-->
	$('input[name="aPTB"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPTBrLWt').val('RL00');
				}
			else
				{
				$('#aPTBrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPTBrLWt').val('RL13');
			}
		});
    <!--Awkward Postures: Trunk, Twist-->
	$('input[name="aPTT"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPTTrLWt').val('RL00');
				}
			else
				{
				$('#aPTTrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPTTrLWt').val('RL13');
			}
		});
    <!--Awkward Postures: Knees, Squat-->
	$('input[name="aPKS"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPKSrLWt').val('RL00');
				}
			else
				{
				$('#aPKSrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPKSrLWt').val('RL13');
			}
		});
    <!--Awkward Postures: Knees, Kneel-->
	$('input[name="aPKK"]').click(function()
		{
		if ($(this).val() != 'RQAP102')
			{
			if ($(this).val() != 'RQAP101')
				{
				$('#aPKKrLWt').val('RL00');
				}
			else
				{
				$('#aPKKrLWt').val('RL12');
				}
			}
		else
			{
			$('#aPKKrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Neck, Bend-->
	$('input[name="rMNBRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMNBRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMNBRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMNBRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMNBRpMrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Neck, Twist-->
	$('input[name="rMNTRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMNTRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMNTRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMNTRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMNTRpMrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Shoulder, Extended Reach-->
	$('input[name="rMSERRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMSERRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMSERRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMSERRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMSERRpMrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Elbow /Forearm, Twist-->
	$('input[name="rMEFTRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMEFTRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMEFTRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMEFTRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMEFTRpMrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Hand /Wrist, Bend-->
	$('input[name="rMHWBRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMHWBRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMHWBRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMHWBRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMHWBRpMrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Hand /Wrist, Twist-->
	$('input[name="rMHWTRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMHWTRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMHWTRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMHWTRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMHWTRpMrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Trunk, Bend-->
	$('input[name="rMTBRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMTBRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMTBRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMTBRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMTBRpMrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Trunk, Twist-->
	$('input[name="rMTTRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMTTRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMTTRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMTTRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMTTRpMrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Knees, Squat-->
	$('input[name="rMKSRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMKSRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMKSRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMKSRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMKSRpMrLWt').val('RL13');
			}
		});
    <!--Repetitive Motions: Knees, Kneel-->
	$('input[name="rMKKRpM"]').click(function()
		{
		if ($(this).val() != 'RQRM103')
			{
			if ($(this).val() != 'RQRM102')
				{
				if ($(this).val() != 'RQRM101')
					{
					$('#rMKKRpMrLWt').val('RL00');
					}
				else
					{
					$('#rMKKRpMrLWt').val('RL11');
					}
				}
			else
				{
				$('#rMKKRpMrLWt').val('RL12');
				}
			}
		else
			{
			$('#rMKKRpMrLWt').val('RL13');
			}
		});
    <!--Force in the Hands: Grip Force-->
	$('input[name="fHGF"]').click(function()
		{
		if ($(this).val() != 'RQFH103')
			{
			if ($(this).val() != 'RQFH102')
				{
				if ($(this).val() != 'RQFH101')
					{
					$('#fHGFrLWt').val('RL00');
					}
				else
					{
					$('#fHGFrLWt').val('RL11');
					}
				}
			else
				{
				$('#fHGFrLWt').val('RL12');
				}
			}
		else
			{
			$('#fHGFrLWt').val('RL13');
			}
		});
    <!--Force in the Hands: Pinch Force-->
	$('input[name="fHPF"]').click(function()
		{
		if ($(this).val() != 'RQFH103')
			{
			if ($(this).val() != 'RQFH102')
				{
				if ($(this).val() != 'RQFH101')
					{
					$('#fHPFrLWt').val('RL00');
					}
				else
					{
					$('#fHPFrLWt').val('RL11');
					}
				}
			else
				{
				$('#fHPFrLWt').val('RL12');
				}
			}
		else
			{
			$('#fHPFrLWt').val('RL13');
			}
		});
    <!--Force in the Hands: Contact Force-->
	$('input[name="fHCF"]').click(function()
		{
		if ($(this).val() != 'RQFH103')
			{
			if ($(this).val() != 'RQFH102')
				{
				if ($(this).val() != 'RQFH101')
					{
					$('#fHCFrLWt').val('RL00');
					}
				else
					{
					$('#fHCFrLWt').val('RL11');
					}
				}
			else
				{
				$('#fHCFrLWt').val('RL12');
				}
			}
		else
			{
			$('#fHCFrLWt').val('RL13');
			}
		});
    <!--Lifting /Lowering: Floor to Knuckle-->
	$('input[name="lLFtK"]').click(function()
		{
		if ($(this).val() != 'RQLL104')
			{
			if ($(this).val() != 'RQLL103')
				{
				if ($(this).val() != 'RQLL102')
					{
					if ($(this).val() != 'RQLL101')
						{
						$('#lLFtKrLWt').val('RL00');
						$('#orLWt').val('');
						}
					else
						{
						$('#lLFtKrLWt').val('RL11');
						$('#orLWt').val('');
						}
					}
				else
					{
					$('#lLFtKrLWt').val('RL12');
					$('#orLWt').val('');
					}
				}
			else
				{
				$('#lLFtKrLWt').val('RL13');
				$('#orLWt').val('');
				}
			}
		else
			{
			$('#lLFtKrLWt').val('RL14');
			$('#orLWt').val('4');
			}
		});
    <!--Lifting /Lowering: Knuckle to Shoulder-->
	$('input[name="lLKtS"]').click(function()
		{
		if ($(this).val() != 'RQLL104')
			{
			if ($(this).val() != 'RQLL103')
				{
				if ($(this).val() != 'RQLL102')
					{
					if ($(this).val() != 'RQLL101')
						{
						$('#lLKtSrLWt').val('RL00');
						$('#orLWt').val('');
						}
					else
						{
						$('#lLKtSrLWt').val('RL11');
						$('#orLWt').val('');
						}
					}
				else
					{
					$('#lLKtSrLWt').val('RL12');
					$('#orLWt').val('');
					}
				}
			else
				{
				$('#lLKtSrLWt').val('RL13');
				$('#orLWt').val('');
			}
				}
		else
			{
			$('#lLKtSrLWt').val('RL14');
			$('#orLWt').val('4');
			}
		});
    <!--Lifting /Lowering: Above Shoulder-->
	$('input[name="lLAS"]').click(function()
		{
		if ($(this).val() != 'RQLL104')
			{
			if ($(this).val() != 'RQLL103')
				{
				if ($(this).val() != 'RQLL102')
					{
					if ($(this).val() != 'RQLL101')
						{
						$('#lLASrLWt').val('RL00');
						$('#orLWt').val('');
						}
					else
						{
						$('#lLASrLWt').val('RL11');
						$('#orLWt').val('');
						}
					}
				else
					{
					$('#lLASrLWt').val('RL12');
					$('#orLWt').val('');
					}
				}
			else
				{
				$('#lLASrLWt').val('RL13');
				$('#orLWt').val('');
				}
			}
		else
			{
			$('#lLASrLWt').val('RL14');
			$('#orLWt').val('4');
			}
		});
	<!--Pushing /Pulling: Select-->
	$('input[name="pPSlct"]').click(function()
			{
			if ($(this).val() != 'RQPP103')
				{
				if ($(this).val() != 'RQPP102')
					{
					if ($(this).val() != 'RQPP101')
						{
						$('#pPSlctrLWt').val('RL00');
						$('#pPDesc').attr('required',false);
						}
					else
						{
						$('#pPSlctrLWt').val('RL11');
						$('#pPDesc').attr('required',true);
						}
					}
				else
					{
					$('#pPSlctrLWt').val('RL12');
					$('#pPDesc').attr('required',true);
					}
				}
			else
				{
				$('#pPSlctrLWt').val('RL13');
				$('#pPDesc').attr('required',true);
				}
			});
		});
    <!--Carrying: Distance-->
	$('input[name="cDist"]').click(function()
		{
		if ($(this).val() != 'RQCD104')
			{
			if ($(this).val() != 'RQCD103')
				{
				if ($(this).val() != 'RQCD102')
					{
					if ($(this).val() != 'RQCD101')
						{
						$('#cDistrLWt').val('RL00');
						$('#orLWt').val('');
						$('#cSlct').attr('required',false);
						$('#cSlct_4').attr('checked',true);
						}
					else
						{
						$('#cDistrLWt').val('RL11');
						$('#orLWt').val('');
						$('#cSlct').attr('required',true);
						$('#cSlct_4').attr('checked',false);
						}
					}
				else
					{
					$('#cDistrLWt').val('RL12');
					$('#orLWt').val('');
					$('#cSlct').attr('required',true);
					$('#cSlct_4').attr('checked',false);
					}
				}
			else
				{
				$('#cDistrLWt').val('RL13');
				$('#orLWt').val('');
				$('#cSlct').attr('required',true);
				$('#cSlct_4').attr('checked',false);
				}
			}
		else
			{
			$('#cDistrLWt').val('RL14');
			$('#orLWt').val('4');
			$('#cSlct').attr('required',true);
			$('#cSlct_4').attr('checked',false);
			}
		});
	<!--Carrying: Select-->
	$('input[name="cSlct"]').click(function()
		{
		if ($(this).val() != 'RQLL104')
			{
			if ($(this).val() != 'RQLL103')
				{
				if ($(this).val() != 'RQLL102')
					{
					if ($(this).val() != 'RQLL101')
						{
						$('#cSlctrLWt').val('RL00');
						$('#orLWt').val('');
						$('#cDist').attr('required',false);
						$('#cDist_4').attr('checked',true);
						}
					else
						{
						$('#cSlctrLWt').val('RL11');
						$('#orLWt').val('');
						$('#cDist').attr('required',true);
						$('#cDist_4').attr('checked',false);
						}
					}
				else
					{
					$('#cSlctrLWt').val('RL12');
					$('#orLWt').val('');
					$('#cDist').attr('required',true);
					$('#cDist_4').attr('checked',false);
					}
				}
			else
				{
				$('#cSlctrLWt').val('RL13');
				$('#orLWt').val('');
				$('#cDist').attr('required',true);
				$('#cDist_4').attr('checked',false);
				}
			}
		else
			{
			$('#cSlctrLWt').val('RL14');
			$('#orLWt').val('4');
			$('#cDist').attr('required',true);
			$('#cDist_4').attr('checked',false);
			}
		});
    <!--Sustained Force: Duration-->
	$('input[name="sFDrtn"]').click(function()
		{
		if ($(this).val() != 'RQSF103')
			{
			if ($(this).val() != 'RQSF102')
				{
				if ($(this).val() != 'RQSF101')
					{
					$('#sFDrtnrLWt').val('RL00');
					$('#sFDesc').attr('required',false);
					}
				else
					{
					$('#sFDrtnrLWt').val('RL11');
					$('#sFDesc').attr('required',true);
					}
				}
			else
				{
				$('#sFDrtnrLWt').val('RL12');
				$('#sFDesc').attr('required',true);
				}
			}
		else
			{
			$('#sFDrtnrLWt').val('RL13');
			$('#sFDesc').attr('required',true);
			}
		});
    <!--Vibration: Describe-->
	$('#vSlct').click(function()
		{
		if ($(this).val() != 'n')
			{
			$('#vDescrLWt').val('RL13');
			$('#vDesc').attr('required',true);
			}
		else
			{
			$('#vDescrLWt').val('RL00');
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
<!--START orLWt Calculation-related Checks-->
function orLWtCheck(orLWt)
	{
	<!--START orLWt calc-->
	if(document.forms["form1"]["orLWt"].value !== "4")
		{
		var rLWtThrees = 0;
		var rLWtTwos = 0;
		var rLWtOnes = 0;
		$("input[type='hidden']").each(function(i, val)
			{
			if ($(this).val() == 'RL13')
				{
				rLWtThrees++;
				}
			});
		$("input[type='hidden']").each(function(i, val)
			{
			if ($(this).val() == 'RL12')
				{
				rLWtTwos++;
				}
			});
		$("input[type='hidden']").each(function(i, val)
			{
			if ($(this).val() == 'RL11')
				{
				rLWtOnes++;
				}
			});
		<!--START Risk Factors editted check-->
		var quotient = Math.ceil((rLWtThrees*3+rLWtTwos*2+rLWtOnes)/(rLWtThrees+rLWtTwos+rLWtOnes));
		if(isNaN(quotient))
			{
			alert("Uh uh uh! You didn't provide Risk Factors data!\nPlease edit at least one of the Risk Factors sections with your findings.");
			return false;
			}
		<!--END Risk Factors editted check-->
		document.forms["form1"]["orLWt"].value = quotient;
		}
	<!--END orLWt calc-->
	<!--START blank text fields to n/a checks-->
	if(document.forms["form1"]["pPDesc"].value == "")
	document.forms["form1"]["pPDesc"].value = "n/a";
	if(document.forms["form1"]["sFDesc"].value == "")
	document.forms["form1"]["sFDesc"].value = "n/a";
	if(document.forms["form1"]["vDesc"].value == "")
	document.forms["form1"]["vDesc"].value = "n/a";
	if(document.forms["form1"]["oComm"].value == "")
	document.forms["form1"]["oComm"].value = "n/a";
	<!--END blank text fields to n/a checks-->
<!--END orLWt Calculation-related checks-->
	return true;
	}
<!--END Form Submission Checks-->
</script>
<?php include ('include/footer.php'); ?>