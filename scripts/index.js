// 
    // CSD-460
    // Team Indigo
    // Moffat Bay Marina
    
    // Team Members
    //     Sam Crandall
    //     Jacob Ives
    //     Jeff Pedersen
    //     Micah Smith 

    // Contributors to this Code
    //     Jeff Pedersen (last update on 9-19-2023)

// Toggle function for opening and closing the menu
function toggleMenu() {
    var menu = document.querySelector('.nav-menu');
    var breadcrumb = document.querySelector('.breadcrumb');
    var smalloverlay = document.querySelector('.content-small');
    var loginwindow = document.querySelector('.login-container');
    var registrationwindow = document.querySelector('.registration-container');
    var reservationwindow = document.querySelector('.reservation-container');
    var summarywindow = document.querySelector('.summary-container');
    var aboutwindow = document.querySelector('.about-container');
    var lookupwindow = document.querySelector('.lookup-container');
    var waitlistwindow = document.querySelector('.waitlist-container');

    menu.classList.toggle('open');
    menu.classList.toggle('closed');
    // checks if breadcrumb exists before it chnages the z-index and opacity
    if (breadcrumb) {
        if (menu.classList.contains('open')) {
            breadcrumb.style.zIndex = -1;
            breadcrumb.style.opacity = 0;
        } 
        else {
            breadcrumb.style.zIndex = 99;
            breadcrumb.style.opacity = 1;
        }
    }

    // checks if smalloverlay exists before it changes the z-index
    if (smalloverlay) {
        if (menu.classList.contains('open')) {
            setTimeout(function () {
                smalloverlay.style.zIndex = 97;
            }, 10);
        } 
        else {
            setTimeout(function () {
                smalloverlay.style.zIndex = 99;
            }, 500);
        }
    }

    // checks if loginwindow exists before it changes the z-index
    if (loginwindow) {
        if (menu.classList.contains('open')) {
            setTimeout(function () {  
                loginwindow.style.zIndex = 97;
            }, 10);
        } 
        else {
            setTimeout(function () {
                loginwindow.style.zIndex = 98;
            }, 500);
        }
    }

    // checks if registrationwindow exists before it changes the z-index
    if (registrationwindow) {
        if (menu.classList.contains('open')) {
            setTimeout(function () {  
                registrationwindow.style.zIndex = 97;
            }, 10);
        } 
        else {
            setTimeout(function () {
                registrationwindow.style.zIndex = 98;
            }, 500);
        }
    }

    // checks if reservationwindow exists before it changes the z-index
    if (reservationwindow) {
        if (menu.classList.contains('open')) {
            setTimeout(function () {  
                reservationwindow.style.zIndex = 97;
            }, 10);
        } 
        else {
            setTimeout(function () {
                reservationwindow.style.zIndex = 98;
            }, 500);
        }
    }

    // checks if summarywindow exists before it changes the z-index
    if (summarywindow) {
        if (menu.classList.contains('open')) {
            setTimeout(function () {  
                summarywindow.style.zIndex = 97;
            }, 10);
        } 
        else {
            setTimeout(function () {
                summarywindow.style.zIndex = 98;
            }, 500);
        }
    }

    // checks if aboutwindow exists before it changes the z-index
    if (aboutwindow) {
        if (menu.classList.contains('open')) {
            setTimeout(function () {  
                aboutwindow.style.zIndex = 97;
            }, 10);
        } 
        else {
            setTimeout(function () {
                aboutwindow.style.zIndex = 98;
            }, 500);
        }
    }

    // checks if lookupwindow exists before it changes the z-index
    if (lookupwindow) {
        if (menu.classList.contains('open')) {
            setTimeout(function () {  
                lookupwindow.style.zIndex = 97;
            }, 10);
        } 
        else {
            setTimeout(function () {
                lookupwindow.style.zIndex = 98;
            }, 500);
        }
    }    
        
        // checks if waitlistwindow exists before it changes the z-index
    if (waitlistwindow) {
        if (menu.classList.contains('open')) {
            setTimeout(function () {  
                waitlistwindow.style.zIndex = 97;
            }, 10);
        } 
        else {
            setTimeout(function () {
                waitlistwindow.style.zIndex = 98;
            }, 500);
        }
    }
}
// end of toggleMenu

// functions to swap header images on hover
// swap image function for the account icon in the page header
function changeAccountImage(imageName) {
    document.getElementById('account-image').src = "images/" + imageName;
}

// swap image function for the menu icon in the page header
function changeMenuImage(imageName) {
    document.getElementById('menu-image').src = "images/" + imageName;
}
// end functions to swap header images

