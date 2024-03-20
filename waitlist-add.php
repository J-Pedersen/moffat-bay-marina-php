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
        <link rel="stylesheet" href="styles/waitlist-add.css"> <!-- contains all reservation page specific styles -->
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
                <div class="waitlist-container" id="waitlist-container"> <!-- Container to help with positioning/styling -->
                    <form action="/MoffatBay/waitlist" method="post">
                        <h1>Slip Wait List</h1>
                        <div class="form-columns"> <!-- Container to help with positioning/styling -->
                            <div class="form-column"> <!-- Container to help with positioning/styling -->
                                <div class="form-group waitlist-label"> <!-- Container to help with positioning/styling -->
                                    <label for="slip-length">Slip Length</label>
                                </div> <!-- end form-group -->                                                               
                                <div class="waitlist-group"> <!-- Container to help with positioning/styling -->
                                    <div class="form-group"> <!-- Container to help with positioning/styling -->
                                        <div class="waitlist-text-group"> <!-- Container to help with positioning/styling -->
                                            <p>We are sorry but there are currently no slips available in <br/> 
                                                the size that you require.</p>
                                            <p>Would you like to be added to our wait list?</p>
                                        </div> <!-- end waitlist-text-group -->
                                    </div> <!-- end form-group -->
                                    <div class="form-group stack waitlist-button-group"> <!-- Container to help with positioning/styling -->
                                        <a href="index.php" title="Home Page">
                                            <button type="button" class="close-button"id="close-button" title="No">No</button>
                                        </a>
                                        <button type="submit" class="waitlist-button" id="waitlist-Button" title="Yes">Yes</button>
                                    </div> <!-- end form-group stack -->
                                </div> <!-- end waitlist-group -->
                            </div> <!-- end form-column -->
                        </div> <!-- end form-columns --> 
                    </form>
                </div> <!-- end waitlist-container -->                    
            </div> <!-- end content -->
        <?php include("footer.php"); ?> <!-- Include the footer -->
        <script type="text/javascript" src="./scripts/index.js"></script> 
        </div> <!-- end wrapper -->      	  
    </body>
</html>