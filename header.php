<!-- Contains the structure of the Header used on all Pages -->
<div class="header"> <!-- site header -->
    <button class="menu-button" onclick="toggleMenu()" onmouseover="changeMenuImage('menu-hover.svg')" onmouseout="changeMenuImage('menu.svg')">
        <img src="images/menu.svg" alt="Menu" title="Menu" id="menu-image">
    </button> <!-- end menu-button -->
    <div class="logo-container"> <!-- container for the two styles of logos -->             
        <img class="default-logo" src="images/logo.svg" alt="Moffat Bay Marina"> <!-- logo SVG for larger tablets and desktops -->
        <img class="mobile-logo" src="images/mobile-logo.svg" alt="Moffat Bay Marina"> <!-- logo SVG for mobile devices and small tablets -->
    </div> <!-- end logo-container -->
    <a href="login.php" title="Account Login"> <!-- adds the link function to the account image -->
        <button class="account-button" onmouseover="changeAccountImage('account-hover.svg')" onmouseout="changeAccountImage('account.svg')"> <!-- adds button function to the account SVG -->
            <img src="images/account.svg" alt="Account Login" title="Account Login" id="account-image">                
        </button> <!-- end account-button -->
    </a> <!-- end account image link function -->
</div> <!-- end header -->