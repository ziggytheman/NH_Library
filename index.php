<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>NHS Library Sign In/Sign Out</title>
        <link rel="stylesheet" type="text/css" href="css/nhilibrary.css" /> 
     

    </head>
    <body>
        <header>
            <h1 id="pageHeader">Sign In/Sign Out</h1>
           
        </header> <!--topheader -->
       

        <div id="main_area">
		<h2> Libary & Lab Sign In/Sign Out</h2>
		<p>All students using the library/labs must sign in and out here. </p>
		<p>	If you have a pass, please leave your pass in the box and retrieve it when you sign out.</p> 
		<p>	Due to scheduling students may be asked to return to class or leave the library/lab area. </p>
		<p>	Students are expected to use the library to read, study or work on homework. </p>
		<p>	Sign out with your name and time only.</p>

            <?php
           
            $returnMsg = "";
            include('htconfig/dbConfig.php');
            if (isset($_GET["next"])) {
                $location = "includes/" . $_GET["next"];
            } else {
                $location = "includes/check.php";
            }


            include($location);
            unset($GLOBALS['next']);
            ?>
        </div> <!--main_area -->
        <footer>
            <p><span class="returnMsg"><?php echo $returnMsg; ?></span></p>
        </footer>
    </body>

</html>