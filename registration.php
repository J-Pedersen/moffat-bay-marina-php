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
        <link rel="stylesheet" href="styles/registration.css"> <!-- contains all registration page specific styles -->       
    </head>
    <body>
        <div class="wrapper"> <!-- page wrapper -->
            <?php include("header.php"); ?> <!-- Include the header -->
            <?php include("nav.php"); ?> <!-- Include the navigation menu -->
            <ul class="breadcrumb"> <!-- breadcrumb bar -->
                <li><a href="index.php" title="Home">Home</a></li> <!-- breadcrumb Index page -->
                <li><a href="#" title="Account Registration">Account Registration</a></li> <!-- breadcrumb Registration No Link -->
            </ul> <!-- end breadcrumb bar -->
            <div class="content"> <!-- body content container -->
                <div class="registration-container"> <!-- Container to help with positioning/styling -->
                    <form action="/MoffatBay/register" method="post">
                        <h1>Register</h1>
                        <div class="form-columns"> <!-- Container to help with positioning/styling -->
                            <div class="form-column"> <!-- Container to help with positioning/styling -->
                                <div class="form-group"> <!-- Container to help with positioning/styling -->
                                    <label for="user-email">Email Address<span class="required">*</span></label>
                                    <input type="text" id="username" name="email" class="text-field-xtend" required>
                                </div> <!-- end form-group -->
                                <div class="sub-row"> <!-- Container to help with positioning/styling -->
                                    <div class="form-group"> <!-- Container to help with positioning/styling -->
                                        <label for="new-password">New Password<span class="required">*</span></label>
                                        <input type="password" id="new-password" name="new-password" class="text-field" required>
                                    </div> <!-- end form-group -->
                                    <div class="form-group"> <!-- Container to help with positioning/styling -->
                                        <label for="confirm-password">Confirm Password<span class="required">*</span></label>
                                        <input type="password" id="confirm-password" name="confirm-password" class="text-field" required>
                                    </div> <!-- end form-group -->
                                </div> <!-- end sub-row -->
                                <div class="sub-row"> <!-- Container to help with positioning/styling -->
                                    <div class="form-group"> <!-- Container to help with positioning/styling -->
                                        <label for="first-name">First Name<span class="required">*</span></label>
                                        <input type="text" id="first-name" name="first-name" class="text-field" required>
                                    </div> <!-- end form-group -->
                                    <div class="form-group"> <!-- Container to help with positioning/styling -->
                                        <label for="last-name">Last Name<span class="required">*</span></label>
                                        <input type="text" id="last-name" name="last-name" class="text-field" required>
                                    </div> <!-- end form-group -->
                                </div> <!-- end sub-row -->
                                <div class="form-group"> <!-- Container to help with positioning/styling -->
                                    <label for="phone-number">Phone Number<span class="required">*</span></label>
                                    <input type="tel" id="phone-number" name="phone-number" class="text-field-xtend" required>
                                </div> <!-- end form-group -->
                            </div> <!-- end form-column -->
                            <div class="form-column"> <!-- Container to help with positioning/styling -->
                                <div class="form-group"> <!-- Container to help with positioning/styling -->
                                    <label for="boat-name">Boat Name<span class="required">*</span></label>
                                    <input type="text" id="boat-name" name="boat-name" class="text-field-xtend" required>
                                </div> <!-- end form-group -->
                                <div class="form-group"> <!-- Container to help with positioning/styling -->
                                    <label for="boat-length">Boat Length<span class="required">*</span></label>
                                    <div class="input-wrapper"> <!-- Container to help with positioning/styling -->
                                        <input type="text" id="boat-length" name="boat-length" required pattern="^\s*([6-9]|[1-4][0-9]|50)\s*$" title="Please enter length of 50 feet or less." maxlength="2" />
                                        <p class="notice">(Please round up to the next foot of 50 feet or less)</p>
                                    </div> <!-- end input-wrapper -->
                                </div> <!-- end form-group --> 
                                <div class="form-group"> <!-- Container to help with positioning/styling -->
                                    <label for="other-details">Other details</label>
                                    <textarea id="other-details" name="other-details" class="text-field-xtend resize-area"></textarea>
                                </div> <!-- end form-group -->
                                <button type="submit" class="submit-button" title="Submit">Submit</button>
                                <p id="require"><span class="required">*</span> = Required</p>
                            </div> <!-- end form-column -->
                        </div> <!-- end form-columns -->
                    </form>
                </div><!-- end registration-container -->
            </div> <!-- end content -->
            <?php include("footer.php"); ?> <!-- Include the footer -->
            <script type="text/javascript" src="./scripts/index.js"></script>
        </div> <!-- end wrapper -->      
    </body>
</html>