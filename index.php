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
        <link rel="stylesheet" href="styles/home.css"> <!-- contains all home page specific styles -->
    </head>
    <body>
    <div class="wrapper"> <!-- page wrapper -->
        <?php include "header.php"; ?> <!-- Include the header -->
        <?php include "nav.php"; ?> <!-- Include the navigation menu -->
        <div class="content"> <!-- body content container -->
            <div id="hero"> <!-- Container to help with positioning/styling -->
                <img id="hero-image" src="images/hero.jpg" alt="Sailboat">
                <div class="content-overlay"> <!-- Container to help with positioning/styling -->
                    <div class="button-container"> <!-- Container to help with positioning/styling -->
                        <div class="fish-image"></div> <!-- fish image -->
                        <a href="registration.php" title="Register"><button class="overlay-button">Register</button></a>
                        <a href="reservation.php" title="Reservation"><button class="overlay-button">Start My Reservation</button></a>
                        <a href="lookup.php" title="Reservation Look Up"><button class="overlay-button">Check My Reservation</button></a>
                        <a href="waitlist.php" title="Wait List"><button class="overlay-button">Check Wait List</button></a>
                    </div> <!-- end button-container -->
                    <div class="text-container"> <!-- Container to help with positioning/styling -->
                        <p>
                            WE HAVE SLIPS TO MEET
                            THE <br>NEEDS OF BOTH
                            SAILBOAT AND <br>POWERBOAT
                            OWNERS WITH SLIP <br>SIZES
                            RANGING FROM 26' TO 50'
                        </p>
                        <img src="images/marina.png" alt="Marina"  title="Map of Moffat Bay Marina">
                    </div> <!-- end text-container -->
                </div> <!-- end content-overlay -->
            </div> <!-- end hero -->
            <div class="content-small"> <!-- Container to help with positioning/styling -->
                <div class="button-container"> <!-- Container to help with positioning/styling -->
                    <div class="fish-image"></div> <!-- fish image -->
                    <a href="registration.php" title="Register"><button class="overlay-button">Register</button></a>
                    <a href="reservation.php" title="Reservation"><button class="overlay-button">Start My Reservation</button></a>
                    <a href="lookup.php" title="Reservation Look Up"><button class="overlay-button">Check My Reservation</button></a>
                    <a href="waitlist.php" title="Wait List"><button class="overlay-button">Check Wait List</button></a>
                </div> <!-- end button-container -->
                <div class="text-container"> <!-- Container to help with positioning/styling -->
                    <p>
                        WE HAVE SLIPS TO MEET
                        THE NEEDS OF BOTH<br>
                        SAILBOAT AND POWERBOAT
                        OWNERS WITH <br>SLIP SIZES
                        RANGING FROM 26' TO 50'
                    </p>
                    <img src="images/marina.png" alt="Marina" title="Map of Moffat Bay Marina">
                </div> <!-- end text-container -->
            </div> <!-- end content-small -->
        </div> <!-- end content -->
        <?php include "footer.php"; ?> <!-- Include the footer -->
        <script type="text/javascript" src="./scripts/index.js"></script>
    </div> <!-- end wrapper -->
    </body>
</html>