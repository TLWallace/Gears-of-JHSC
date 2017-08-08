<?php
//Assessment Submissions:
	include("include/connectDB.php"); //Creds from connectDB.php : $dbConn...
	if(isset($_POST['frmAddRecord'])) //frmAddRecord passed from index.php submit html element...
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor'); //Setting active MySQL database, hs_risk_factor, via $dbObj...
		//Escaping special characters from datalist & text fields...
		$auditor = mysqli_real_escape_string($dbConn, $_POST[auditor]);
		$area = mysqli_real_escape_string($dbConn, $_POST[area]);
		$submittedBy = mysqli_real_escape_string($dbConn, $_POST[submittedBy]);
		$workCentre = mysqli_real_escape_string($dbConn, $_POST[workCentre]);
		$part = mysqli_real_escape_string($dbConn, $_POST[part]);
		$position = mysqli_real_escape_string($dbConn, $_POST[position]);
		$pPDesc = mysqli_real_escape_string($dbConn, $_POST[pPDesc]);
		$sFDesc = mysqli_real_escape_string($dbConn, $_POST[sFDesc]);
		$vDesc = mysqli_real_escape_string($dbConn, $_POST[vDesc]);
		$dcbl = mysqli_real_escape_string($dbConn, $_POST[dcbl]);
		$prom = mysqli_real_escape_string($dbConn, $_POST[prom]);
		$oComm = mysqli_real_escape_string($dbConn, $_POST[oComm]);
		$sqlStatement= //Setting variable, $sqlStatement to MySQL query...
			"INSERT INTO
			form_test
			 	(orLWt,
				auditor,area,submittedBy,workCentre,assessmentDate,part,position,
				aPNBrLWt,aPNB,
				aPNTrLWt,aPNT,
				aPSERrLWt,aPSER,
				aPEFTrLWt,aPEFT,
				aPHWBrLWt,aPHWB,
				aPHWTrLWt,aPHWT,
				aPTBrLWt,aPTB,
				aPTTrLWt,aPTT,
				aPKSrLWt,aPKS,
				aPKKrLWt,aPKK,
				rMNBRpMrLWt,rMNBRpM,
				rMNTRpMrLWt,rMNTRpM,
				rMSERRpMrLWt,rMSERRpM,
				rMEFTRpMrLWt,rMEFTRpM,
				rMHWBRpMrLWt,rMHWBRpM,
				rMHWTRpMrLWt,rMHWTRpM,
				rMTBRpMrLWt,rMTBRpM,
				rMTTRpMrLWt,rMTTRpM,
				rMKSRpMrLWt,rMKSRpM,
				rMKKRpMrLWt,rMKKRpM,
				fHGFrLWt,fHGF,
				fHPFrLWt,fHPF,
				fHCFrLWt,fHCF,
				lLFtKrLWt,lLFtK,
				lLKtSrLWt,lLKtS,
				lLASrLWt,lLAS,
				pPDesc,
				pPSlctrLWt,pPSlct,
				cDistrLWt,cDist,
				cSlctrLWt,cSlct,
				sFDesc,
				sFDrtnrLWt,sFDrtn,
				vDescrLWt,vDesc,
				dcbl,dcblrLWt,
				prom,promrLWt,
				oComm)
			VALUES
			 	('$_POST[orLWt]',
				'$auditor','$area','$submittedBy','$workCentre','$_POST[assessmentDate]','$part','$position',
				'$_POST[aPNBrLWt]','$_POST[aPNB]',
				'$_POST[aPNTrLWt]','$_POST[aPNT]',
				'$_POST[aPSERrLWt]','$_POST[aPSER]',
				'$_POST[aPEFTrLWt]','$_POST[aPEFT]',
				'$_POST[aPHWBrLWt]','$_POST[aPHWB]',
				'$_POST[aPHWTrLWt]','$_POST[aPHWT]',
				'$_POST[aPTBrLWt]','$_POST[aPTB]',
				'$_POST[aPTTrLWt]','$_POST[aPTT]',
				'$_POST[aPKSrLWt]','$_POST[aPKS]',
				'$_POST[aPKKrLWt]','$_POST[aPKK]',
				'$_POST[rMNBRpMrLWt]','$_POST[rMNBRpM]',
				'$_POST[rMNTRpMrLWt]','$_POST[rMNTRpM]',
				'$_POST[rMSERRpMrLWt]','$_POST[rMSERRpM]',
				'$_POST[rMEFTRpMrLWt]','$_POST[rMEFTRpM]',
				'$_POST[rMHWBRpMrLWt]','$_POST[rMHWBRpM]',
				'$_POST[rMHWTRpMrLWt]','$_POST[rMHWTRpM]',
				'$_POST[rMTBRpMrLWt]','$_POST[rMTBRpM]',
				'$_POST[rMTTRpMrLWt]','$_POST[rMTTRpM]',
				'$_POST[rMKSRpMrLWt]','$_POST[rMKSRpM]',
				'$_POST[rMKKRpMrLWt]','$_POST[rMKKRpM]',
				'$_POST[fHGFrLWt]','$_POST[fHGF]',
				'$_POST[fHPFrLWt]','$_POST[fHPF]',
				'$_POST[fHCFrLWt]','$_POST[fHCF]',
				'$_POST[lLFtKrLWt]','$_POST[lLFtK]',
				'$_POST[lLKtSrLWt]','$_POST[lLKtS]',
				'$_POST[lLASrLWt]','$_POST[lLAS]',
				'$pPDesc',
				'$_POST[pPSlctrLWt]','$_POST[pPSlct]',
				'$_POST[cDistrLWt]','$_POST[cDist]',
				'$_POST[cSlctrLWt]','$_POST[cSlct]',
				'$sFDesc',
				'$_POST[sFDrtnrLWt]','$_POST[sFDrtn]',
				'$_POST[vDescrLWt]',
				'$vDesc',
				'$dcbl',
				'$_POST[dcblrLWt]',
				'$prom',
				'$_POST[promrLWt]',
				'$oComm');";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successIndex.php'); //Helps handle prevention of form resubmission on refresh
		include("include/closeDB.php");
	}
?>

<?php
//Auditor Additions:
	include("include/connectDB.php");
	if(isset($_POST['auditorAddItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$fName = mysqli_real_escape_string($dbConn, $_POST[fName]);
		$lName = mysqli_real_escape_string($dbConn, $_POST[lName]);
		$audiNumb = mysqli_real_escape_string($dbConn, $_POST[audiNumb]);
		$sqlStatement=
		"INSERT INTO
		auditor
			(fName,lName,audiNumb)
		VALUES
			('$fName','$lName','$audiNumb')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?>
<?php
//Auditor Deletions:
	include("include/connectDB.php");
	if(isset($_POST['auditorRemoveItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$iD = mysqli_real_escape_string($dbConn, $_POST[iD]);
		$sqlStatement=
		"DELETE FROM
		auditor
		WHERE
			iD=('$iD')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?>

<?php
//Area Additions:
	include("include/connectDB.php");
	if(isset($_POST['areaAddItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$aRCode = mysqli_real_escape_string($dbConn, $_POST[aRCode]);
		$aRName = mysqli_real_escape_string($dbConn, $_POST[aRName]);
		$sqlStatement=
		"INSERT INTO
		area
			(aRCode,aRName)
		VALUES
			('$aRCode','$aRName')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?>
<?php
//Area Deletions:
	include("include/connectDB.php");
	if(isset($_POST['areaRemoveItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$iD = mysqli_real_escape_string($dbConn, $_POST[iD]);
		$sqlStatement=
		"DELETE FROM
		area
		WHERE
			iD=('$iD')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?><?php
//Work Centre Additions:
	include("include/connectDB.php");
	if(isset($_POST['work_centreAddItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$wCCode = mysqli_real_escape_string($dbConn, $_POST[wCCode]);
		$wCName = mysqli_real_escape_string($dbConn, $_POST[wCName]);
		$sqlStatement=
		"INSERT INTO
		work_centre
			(wCCode,wCName)
		VALUES
			('$wCCode','$wCName')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?>
<?php
//Work Centre Deletions:
	include("include/connectDB.php");
	if(isset($_POST['work_centreRemoveItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$iD = mysqli_real_escape_string($dbConn, $_POST[iD]);
		$sqlStatement=
		"DELETE FROM
		work_centre
		WHERE
			iD=('$iD')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?>
<?php
//Part Additions:
	include("include/connectDB.php");
	if(isset($_POST['partAddItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$pCode = mysqli_real_escape_string($dbConn, $_POST[pCode]);
		$pName = mysqli_real_escape_string($dbConn, $_POST[pName]);
		$sqlStatement=
		"INSERT INTO
		part
			(pCode,pName)
		VALUES
			('$pCode]','$pName')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?>
<?php
//Part Deletions:
	include("include/connectDB.php");
	if(isset($_POST['partRemoveItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$iD = mysqli_real_escape_string($dbConn, $_POST[iD]);
		$sqlStatement=
		"DELETE FROM
		part
		WHERE
			iD=('$iD')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?>
<?php
//Part Additions:
	include("include/connectDB.php");
	if(isset($_POST['positionAddItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$pOSCode = mysqli_real_escape_string($dbConn, $_POST[pOSCode]);
		$pOSName = mysqli_real_escape_string($dbConn, $_POST[pOSName]);
		$sqlStatement=
		"INSERT INTO
		position
			(pOSCode,pOSName)
		VALUES
			('$pOSCode','$pOSName')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?>
<?php
//Position Deletions:
	include("include/connectDB.php");
	if(isset($_POST['positionRemoveItem']))
	{
		$dbObj=mysqli_select_db($dbConn,'hs_risk_factor');
		$iD = mysqli_real_escape_string($dbConn, $_POST[iD]);
		$sqlStatement=
		"DELETE FROM
		position
		WHERE
			iD=('$iD')";
		if(!mysqli_query($dbConn,$sqlStatement))
		{
			die('Error: ' . mysqli_error($dbConn));
		}
		header('Location: successAdmin.php');
		include("include/closeDB.php");
	}
?>