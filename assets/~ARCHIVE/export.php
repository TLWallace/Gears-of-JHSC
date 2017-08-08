<?php
include ('../include/connectDB.php');

$DB_TBLName = "form_test";

//$DB_TBLName = "form_test"; //IMPORTANT for 2017-02-01 testing: Orig variable
$filename = "JHSCRACodeView";
// Part of failed attempt to use PDO via config.php...   
/*$sql = "Select * from $DB_TBLName";
$query = $dbo->prepare( $sql );
$result = $query->execute();
$file_ending = "xls";*/

// Using connectDB.php + MySQLi...
$dbObj = mysqli_select_db($dbConn,'hs_risk_factor');

$sql = "SELECT *
		FROM $DB_TBLName";

/*$sql = "SELECT *
		FROM $DB_TBLName";*///IMPORTANT for 2017-02-01 testing: Orig query
		
$result = mysqli_query($dbConn,$sql); // @ suppressor abandoned

	// For Browser...
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
	// Formatting...   
$sep = "\t"; //delimiter
	// Column Names (as MySQLi field names)...
/*for ($i = 0; $i < mysqli_num_fields($result); $i++)
{
echo mysqli_fetch_field($result->name). "\t"; // $result,$i changed to $result->name until I can get loop to work...
}*/
print(
"Legend:\tRisk Level Code\tRisk Level Name\tRisk Level Value\t\tQuantifier Code\tQuantifier Name\tQuantifier Value\n\tRL11\tLow\t1\t\tRQAP101\tRepeated\tRL12\n\tRL12\tMedium\t2\t\tRQAP102\tSustained\tRL13\n\tRL13\tHigh\t3\t\tRQFH101\tLight\tRL11\n\tRL14\tHigh+Escalator(s)\t4\t\tRQFH102\tHard\tRL12\n\tRL00\tn/a\t0\t\tRQFH103\tNear Maximal\tRL13\n\t\t\t\t\tRQLL101\t<=9 lbs\tRL11\n\t\t\t\t\tRQLL102\t10-19 lbs\tRL12\n\t\t\t\t\tRQLL103\t20-49 lbs\tRL13\n\t\t\t\t\tRQLL104\t>=50 lbs\tRL14\n\t\t\t\t\tRQPP101\tEasy\tRL11\n\t\t\t\t\tRQPP102\tModerate\tRL12\n\t\t\t\t\tRQPP103\tHard\tRL13\n\t\t\t\t\tRQRM101\t<=19 /min.\tRL11\n\t\t\t\t\tRQRM102\t20-39 /min.\tRL12\n\t\t\t\t\tRQRM103\t>=40 /min.\tRL13\n\t\t\t\t\tRQCD101\t<=9 ft.\tRL11\n\t\t\t\t\tRQCD102\t10-19 ft.\tRL12\n\t\t\t\t\tRQCD103\t20-49 ft.\tRL13\n\t\t\t\t\tRQCD104\t>=50 ft.\tRL14\n\t\t\t\t\tRQSF101\t<=9 sec.\tRL11\n\t\t\t\t\tRQSF102\t10-29 sec.\tRL12\n\t\t\t\t\tRQSF103\t>=30 sec.\tRL13\n\t\t\t\t\tRQZZ101\tn/a\tRL00\n
Record Id.\tOverall Rating Value\tRecorded Date\tAuditor\tArea\tSubmitted By\tWork Centre\tAssessment Date\tPart\tPosition\tAP NB Val\tAP NB Sel\tAP NT Val\tAP NT Sel\tAP SER Val\tAP SER Sel\tAP EFT Val\tAP EFT Sel\tAP HWB Val\tAP HWB Sel\tAP HWT Val\tAP HWT Sel\tAP TB Val\tAP TB Sel\tAP TT Val\tAP TT Sel\tAP KS Val\tAP KS Sel\tAP KK Val\tAP KK Sel\tRM NB Val\tRM NB Sel\tRM NT Val\tRM NT Sel\tRM SER Val\tRM SER Sel\tRM EFT Val\tRM EFT Sel\tRM HWB Val\tRM HWB Sel\tRM HWT Val\tRM HWT Sel\tRM TB Val\tRM TB Sel\tRM TT Val\tRM TT Sel\tRM KS Val\tRM KS Sel\tRM KK Val\tRM KK Sel\tFH GF Val\tFH GF Sel\tFH PF Val\tFH PF Sel\tFH CF Val\tFH CF Sel\tLL FTK Val\tLL FTK Sel\tLL KTS Val\tLL KTS Sel\tLL AS Val\tLL AS Sel\tPP Desc\tPP Val\tPP Sel\tCarr Dist Val\tCarr DiSt Sel\tCarr Load Val\tCarr Load Sel\tSF Desc\tSF Drtn Val\tSF Drtn Sel\tVibe Val\tVibe Desc\tDcbl Lvl\tDcbl Val\tProm Sel\tProm Val\tGen Comm\t\n");

/*//IMPORTANT for 2017-02-01 testing: Orig header atttempts...
//START this works
// For Browser...
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
// Formatting...   
$sep = "\t"; //delimiter
// Column Names (as MySQLi field names)...
for ($i = 0; $i < mysqli_num_fields($result); $i++)
{
echo mysqli_fetch_field($result->name). "\t"; // $result,$i changed to $result->name until I can get loop to work...
}
print("\n");
//END this works
*/

	// This has worked to get all but column headers too...
	/*
	$sep = "\t"; //delimiter
		// Loop removed...
	echo . mysqli_fetch_field($result->name) . "\t"; // $result,$i changed to $result->name...
	print("\n");
	*/
	// The following, original attempt, does not work at all...
	/*
	$sep = "\t"; //delimiter
	for ($i = 0; $i < mysqli_num_fields($result); $i++)
	{
	echo mysqli_fetch_field($result,$i). "\t";
	}
	print("\n");
	*/

// Getting Data...
    while($row = mysqli_fetch_row($result))
    {
        $schema_insert = "";
        for($j = 0; $j<mysqli_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }
include ('../include/closeDB.php');   
?>