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
        <link rel="stylesheet" href="styles/waitlist.css"> <!-- contains all waitlist page specific styles -->       
    </head>
    <body>
        <div class="wrapper"> <!-- page wrapper -->
            <?php include("header.php"); ?> <!-- Include the header -->
            <?php include("nav.php"); ?> <!-- Include the navigation menu -->
            <ul class="breadcrumb"> <!-- breadcrumb bar -->
                <li><a href="index.php" title="Home">Home</a></li> <!-- breadcrumb Index page -->
                <li><a href="#" title="Wait List Look Up">Wait List Look Up</a></li> <!-- breadcrumb Lookup No Link -->
            </ul> <!-- end breadcrumb bar -->
            <div class="content"> <!-- body content container -->
                <div class="waitlist-container"> <!-- Container to help with positioning/styling -->       
                    <div class="waitlist-group">
                        <div class="form-container"> <!-- Container to help with positioning/styling -->
                            <h1>Wait List Look Up</h1>
                            <form id="waitlist-form" action="/MoffatBay/waitlist" method="get">    
                                <div class="form-group-container"> <!-- Container to help with positioning/styling -->
                                    <div class="form-group"> <!-- Container to help with positioning/styling -->
                                        <label for="email">Email:</label>
                                        <input type="text" id="email" class="text-field" name="email"><br>
                                    </div> <!-- end form-group -->
                                    <button type="submit" class="submit-button" id="submit-button" title="Submit">Submit</button>
                                </div> <!-- end form-group-container -->
                            </form>
                        </div> <!-- end form-container -->
                        <div class="details-container"> <!-- Container to help with positioning/styling -->
                            <div id="waitlist-details">
                                <!--  Elements to insert waitlist data from the session object via interpolation. -->
                                <label class="waitlistData">
                                    26 Foot Slip<br/>
                                    Current Wait List:<br/> 
                                    <br class="waitlist-placeholder"/><!-- placeholder for the waitlist position if it exists -->
                                    <br/> 
                                </label>
                                <!--  Elements to insert waitlist data from the session object via interpolation. -->
                                <label class="waitlistData">
                                    40 Foot Slip<br/>
                                    Current Wait List:<br/> 
                                    <br class="waitlist-placeholder"/><!-- placeholder for the waitlist position if it exists -->
                                    <br/> 
                                </label>
                                <!--  Elements to insert waitlist data from the session object via interpolation. -->
                                <label class="waitlistData">
                                    50 Foot Slip<br/>
                                    Current Wait List:<br/> 
                                    <br class="waitlist-placeholder"/><!-- placeholder for the waitlist position if it exists -->
                                    <br/> 
                                </label>
                            </div> <!-- Container to display form data from Reservation page -->
                        </div> <!-- end details-container --> 
                    </div> <!-- end waitlist-group -->                 
                </div> <!-- end waitlist-container -->
            </div> <!-- end content -->
            <?php include("footer.php"); ?> <!-- Include the footer -->
            <script type="text/javascript" src="./scripts/index.js"></script>
        </div> <!-- end wrapper -->      	  
    </body>
</html>