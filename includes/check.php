<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('includes/dbaccess.php');
include('includes/fn_insert_validations.php');
$errorMsg ="";
$returnMsg = "Enter Student ID to search";
if ($dbSuccess) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //select studentID
        $studentID = clean_input($_POST["studentID"]);
        if (!empty($studentID)) { {  //   SQL:    Select from Asset table
                $tStudent_SQLselect = "Select nhs_fName, nhs_lName, nhs_class ";
                $tStudent_SQLselect .= "FROM nh_students ";
                $tStudent_SQLselect .= "WHERE nhs_dps_id = $studentID";

                $tStudent_SQLselect_Query = mysqli_query($dbSelected, $tStudent_SQLselect);
            }

            if (count(mysqli_fetch_assoc($tStudent_SQLselect_Query)) > 0) {
                //if found display edit screen

                header("Location: /library/index.php?next=updateCheck_io.php&studentID=$studentID");
            } else {

                header("Location: /library/index.php?next=addStudent.php&studentID=$studentID");
            }
            // else display add screen
        } else {
            $returnMsg = "Enter a Student ID to begin";
        }
    }
}
?>
<form method="post" action="index.php?next=check.php" >
    <div class="fieldSet">
        <fieldset>
			<p>
                <label class="field" for="studentID">DPS Student ID</label>
                <input type="text" name="studentID" id="studentID" class="textbox-input" autofocus/>
            </p>
        </fieldset>
    </div>
    <input type="submit" value="Find">
</form>



