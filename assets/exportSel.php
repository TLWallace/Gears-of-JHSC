<?php
include ('../include/connectDB.php');

$DB_TBLName = "jhscrfsel";
$filename = "JHSCRAQntfrSlctns";
$dbObj = mysqli_select_db($dbConn,'hs_risk_factor');

$sql = "SELECT *
		FROM $DB_TBLName";
$result = mysqli_query($dbConn,$sql);
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
$sep = "\t";
print(
"Legend:\tRisk Level Code\tRisk Level Name\tRisk Level Value\t\tQuantifier Code\tQuantifier Name\tQuantifier Value\n\tRL11\tLow\t1\t\tRQAP101\tRepeated\tRL12\n\tRL12\tMedium\t2\t\tRQAP102\tSustained\tRL13\n\tRL13\tHigh\t3\t\tRQFH101\tLight\tRL11\n\tRL14\tHigh+Escalator(s)\t4\t\tRQFH102\tHard\tRL12\n\tRL00\tn/a\t0\t\tRQFH103\tNear Maximal\tRL13\n\t\t\t\t\tRQLL101\t<=9 lbs\tRL11\n\t\t\t\t\tRQLL102\t10-19 lbs\tRL12\n\t\t\t\t\tRQLL103\t20-49 lbs\tRL13\n\t\t\t\t\tRQLL104\t>=50 lbs\tRL14\n\t\t\t\t\tRQPP101\tEasy\tRL11\n\t\t\t\t\tRQPP102\tModerate\tRL12\n\t\t\t\t\tRQPP103\tHard\tRL13\n\t\t\t\t\tRQRM101\t<=19 /min.\tRL11\n\t\t\t\t\tRQRM102\t20-39 /min.\tRL12\n\t\t\t\t\tRQRM103\t>=40 /min.\tRL13\n\t\t\t\t\tRQCD101\t<=9 ft.\tRL11\n\t\t\t\t\tRQCD102\t10-19 ft.\tRL12\n\t\t\t\t\tRQCD103\t20-49 ft.\tRL13\n\t\t\t\t\tRQCD104\t>=50 ft.\tRL14\n\t\t\t\t\tRQSF101\t<=9 sec.\tRL11\n\t\t\t\t\tRQSF102\t10-29 sec.\tRL12\n\t\t\t\t\tRQSF103\t>=30 sec.\tRL13\n\t\t\t\t\tRQZZ101\tn/a\tRL00\n
Record Id.\tRecorded Date\tAssessment Date\tOverall Rating Description\tOverall Rating Value\tAuditor\tSubmitted By\tArea\tWork Centre\tPart\tPosition\tAwkward Posture Neck Bend Selection\tAwkward Posture Neck Twist Selection\tAwkward Posture Shoulder Extended Reach Selection\tAwkward Posture Elbow Forearm Twist Selection\tAwkward Posture Hand Wrist Bend Selection\tAwkward Posture Hand Wrist Twist Selection\tAwkward Posture Trunk Bend Selection\tAwkward Posture Trunk Twist Selection\tAwkward Posture Knees Squat Selection\tAwkward Posture Knees Kneel Selection\tRepetitive Motions Neck Bend Selection\tRepetitive Motions Neck Twist Selection\tRepetitive Motions Shoulder Extended Reach Selection\tRepetitive Motions Elbow Forearm Twist Selection\tRepetitive Motions Hand Wrist Bend Selection\tRepetitive Motions Hand Wrist Twist Selection\tRepetitive Motions Trunk Bend Selection\tRepetitive Motions Trunk Twist Selection\tRepetitive Motions Knees Squat Selection\tRepetitive Motions Knees Kneel Selection\tForce in the Hands Grip Force Selection\tForce in the Hands Pinch Force Selection\tForce in the Hands Contact Force Selection\tLifting Lowering Floor to Knuckle Selection\tLifting Lowering Knuckle to Shoulder Selection\tLifting Lowering Above Shoulder Selection\tPushing Pulling Difficulty Selection\tPushing Pulling Description\tCarrying Distance Selection\tCarrying Load Selection\tSustained Force Duration Selection\tSustained Force Description\tVibration Description\tGeneral Comments\n");
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