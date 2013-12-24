<?php
include('includes/fn_insert_validations.php');
include('includes/dbaccess.php');
$fName = $lName = "";
$returnMsg = "Select Options then click SUBMIT";
if ($dbSuccess) {
	if ($_SERVER["REQUEST_METHOD"] == "GET") { 
        $studentID = clean_input($_GET["studentID"]);   
		$tStudent_SQLselect = "Select nhs_fName, nhs_lName, nhs_class ";
		$tStudent_SQLselect .= "FROM nh_students ";
		$tStudent_SQLselect .= "WHERE nhs_dps_id = $studentID";
        
		$tStudent_SQLselect_Query = mysqli_query($dbSelected, $tStudent_SQLselect);
        if ($row = mysqli_fetch_assoc($tStudent_SQLselect_Query)) {
			foreach ($row as $idx => $r) {
			
				switch($idx) {
					case "nhs_fName":
						$fName = $r;
						break;
					case "nhs_lName":
						$lName = $r;
						break;
					case "nhs_class":
						$class = $r;
						break;
				}
			}
        }  else {
            $errorMsg = "FAILED to select Student.<br />";
            $errorMsg .= mysqli_error($dbSelected) . "<br /><br />";
            $returnMsg = dataError($errorMsg);
		}
	}
}	


?>
<form method="post" action="index.php?next=updateCheck_io.php">
    <div class="fieldSet">
        <fieldset>
			<p>
                <label class="field" for="studentID">DPS Student ID</label>
                <input type="text" name="studentID" id="studentID" class="textbox-input" value="<?php echo $studentID; ?>" readonly/>
            </p>
			<p>
                <label class="field" for="fName">First Name</label>
                <input type="text" name="fName" id="studentID" class="textbox-input" value="<?php echo $fName; ?>" />
			</p>
			<p>
			    <label class="field" for="lName">Last Name</label>
                <input type="text" name="lName" id="studentID" class="textbox-input" value="<?php echo $lName; ?>"/>
            </p>
			<p>
                <label class="field" for="reasonforuse">Reason for Use</label><br/>
                <input type="radio" name="reasonforuse" value="freeperiod"/>Free Period<br/>
				<input type="radio" name="reasonforuse" value="pass"/>Pass<br/>
				<input type="radio" name="reasonforuse" value="lunch"/>Lunch Period<br/>
				<input type="radio" name="reasonforuse" value="other"/>Other<br/>
            </p>
			<p>
                <label class="field" for="signinout">Sign In or Sign Out</label><br/>
			</p>
			<div class="radioButton1">
                <input class="radioButton" type="radio" name="signinout" value="in"/>Sign In
				<input class="radioButton"type="radio" name="signinout" value="out"/>Sign Out
            </div>
        </fieldset>
    </div>
    <input type="submit" value="Submit">
</form>