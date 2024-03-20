<?php
session_start();
// checks if the user is logged in
if (!isset($_SESSION['user'])) {
    // redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.30">
        <title>Moffat Bay Marina</title>
        <link rel="stylesheet" href="styles/normalize.css"> <!-- contains all styles resets -->
        <link rel="stylesheet" href="styles/index.css"> <!-- contains all universal page styles -->
        <link rel="stylesheet" href="styles/header.css"> <!-- contains all header specific styles -->
        <link rel="stylesheet" href="styles/footer.css"> <!-- contains all footer specific styles -->
        <link rel="stylesheet" href="styles/nav.css"> <!-- contains all nav bar specific styles -->
        <link rel="stylesheet" href="styles/reservation.css"> <!-- contains all reservation page specific styles -->
    </head>
    <body>
        <div class="wrapper"> <!-- page wrapper -->
            <?php include("header.php"); ?> <!-- Include the header -->
            <?php include("nav.php"); ?> <!-- Include the navigation menu -->
            <ul class="breadcrumb"> <!-- breadcrumb bar -->
                <li><a href="index.php" title="Home">Home</a></li> <!-- breadcrumb Index page -->
                <li><a href="#" title="Slip Reservation">Slip Reservation</a></li> <!-- breadcrumb Reservation No Link-->
            </ul> <!-- end breadcrumb bar -->
            <div class="content"> <!-- body content container -->
                <div class="reservation-container" id="reservation-container"> <!-- Container to help with positioning/styling -->
                    <form action="/MoffatBay/reserve" method="get" target="_self">
                        <h1>Slip Reservation</h1>
                        <div class="form-columns"> <!-- Container to help with positioning/styling -->
                            <div class="form-column"> <!-- Container to help with positioning/styling -->
                                <div class="form-group"> <!-- Container to help with positioning/styling -->
                                    <label for="boat-length">Boat Length<span class="required">*</span></label>
                                    <div class="input-wrapper"> <!-- Container to help with positioning/styling -->
                                        <input type="text" id="boat-length" name="boatlength" required pattern="^\s*([6-9]|[1-4][0-9]|50)\s*$" title="Please enter length of 50 feet or less." maxlength="2" />
                                        <p class="notice">(Please round up to the next foot of 50 feet or less)</p>
                                    </div> <!-- end input-wrapper -->
                                </div> <!-- end form-group -->                                                               
                                <div class="form-group"> <!-- Container to help with positioning/styling -->
                                    <label for="boat-name">Boat Name<span class="required">*</span></label>
                                    <input type="text" id="boat-name" name="boatname" class="text-field-xtend" required>
                                </div> <!-- end form-group -->
                                <div class="form-group"> <!-- Container to help with positioning/styling -->
                                    <label for="start-date">Start Date<span class="required">*</span></label>
                                    <input type="date" id="start-date" name="startdate" class="text-field-xtend" required>
                                </div> <!-- end form-group -->
                                <div class="form-group stack"> <!-- Container to help with positioning/styling -->
                                    <button type="reset" class="clear-button" id="clear-button" title="Clear">Clear</button>
                                    <button type="submit" class="submit-button" id="submit-button" title="Submit">Submit</button>
                                    <p id="require"><span class="required">*</span> = Required</p>
                                </div> <!-- end form-group stack --> 
                            </div> <!-- end form-column -->
                        </div> <!-- end form-columns --> 
                    </form>
                </div> <!-- end reservation-container -->                
            </div> <!-- end content -->
        <?php include("footer.php"); ?> <!-- Include the footer -->
        <script type="text/javascript" src="./scripts/index.js"></script> 
        </div> <!-- end wrapper -->      	  
    </body>
</html>