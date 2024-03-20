<!DOCTYPE html>

<!-- Contains the page structure for the contents section of the About Us Page -->
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
        <link rel="stylesheet" href="styles/about.css"> <!-- contains all about page specific styles -->      
    </head>
    <body>
        <div class="wrapper"> <!-- page wrapper -->
            <?php include 'header.php'; ?> <!-- Include the header -->
            <?php include 'nav.php'; ?> <!-- Include the navigation menu -->
            <ul class="breadcrumb"> <!-- breadcrumb bar -->
                <li><a href="index.php" title="Home">Home</a></li> <!-- breadcrumb Index page -->
                <li><a href="#" title="About Our Marina">About Our Marina</a></li> <!-- breadcrumb About No Link -->
            </ul> <!-- end breadcrumb bar -->
            <div class="content"> <!-- body content container -->
                <div class="about-container"> <!-- Container to help with positioning/styling -->
                    <div class="content-heading"> <!-- Container to help with positioning/styling -->
                        <h1>About Our Marina</h1>
                    </div> <!-- end content-heading -->
                    <div class="contact-about-group"> <!-- Container to help with positioning/styling -->
                        <div class="contact-container"> <!-- Container to help with positioning/styling -->
                            <div class="group-column"> <!-- Container to help with positioning/styling -->
                                <h3>Contact Us</h3>
                                <P>
                                    If you have any questions or concerns, <br>
                                    or would just like to tell us how we're doing, <br>
                                    we'd love to hear from you!
                                </P>
                            </div> <!-- end group-column -->
                            <div class="group-column"> <!-- Container to help with positioning/styling -->
                                <p>Phone: <br>(555)555-5555</p>
                                <p>Email: <br>harbormaster@mbmarina.com</p>
                                <p>Harbormaster VHF Channel: <br>6</p>
                                <p>123 Moffat Bay Dr. <br>Joviesda Island, WA <br>98250</p>
                            </div> <!-- end group-column -->
                        </div> <!-- end contact-container -->
                        <div class="about-group"> <!-- Container to help with positioning/styling -->
                            <div class="group-column"> <!-- Container to help with positioning/styling -->
                                <div class="group-section"> <!-- Container to help with positioning/styling -->
                                    <p>We are a new marina located in Joviesda Island's beautiful Moffat Bay.</p>
                                    <p>We maintain a large number of boat slips to accommodate a variety of vessels.</p>
                                    <p>Come dock with us!</p>
                                </div> <!-- end group-section -->
                                <div class="group-section"> <!-- Container to help with positioning/styling -->
                                    <h3>What Are Your Slip Sizes?</h3>
                                    <p>We offer slips in sizes of 26, 40, and 50 feet.</p>
                                    <p>Vessels which exceed a given slip size must reserve in the next largest slip size.</p>
                                </div> <!-- end group-section -->
                                <div class="group-section"> <!-- Container to help with positioning/styling -->
                                    <h3>What Are Your Rates?</h3>
                                    <p>To help with a stress-free extended stay, we charge only $10 per foot,</p>
                                    <p>plus $10 for electric power to the slip, per month.</p>
                                    <p>For example, a 34 ft boat would cost $350 a month before tax.</p>
                                    <p>Reservations are billed monthly. We do not support transient rentals at this time.</p>
                                </div> <!-- end group-section -->
                                <div class="group-section"> <!-- Container to help with positioning/styling -->
                                    <h3>What If The Slip Size I Want Is Unavailable?</h3>
                                    <p>To accommodate future guests, we maintain a waiting list for each of our slip sizes.</p>
                                    <p>If the slip size you require is not available at the time of reservation,</p>
                                    <p>you have the option to have your email address added to our waiting list so that</p>
                                    <p>we can notify you whenever a slip in your size requirements becomes available.</p>
                                </div> <!-- end group-section -->
                            </div> <!-- end group-column -->
                        </div> <!-- end about-group --> 
                    </div> <!-- end contact-about-group --> 
                </div> <!-- end about-container -->
            </div> <!-- end content -->
            <?php include 'footer.php'; ?> <!-- Include the footer -->
            <script type="text/javascript" src="./scripts/index.js"></script>
        </div> <!-- end wrapper -->      	  
    </body>
</html>