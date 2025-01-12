// Function to check if the user is on a desktop device
function isDesktop() {
    return window.innerWidth > 768; // Adjust the width based on your design
}

// Function to redirect to another page
function redirectToAnotherPage() {
    window.location.href = 'pRi3sEnI4tIoN7pAsS8wOrD.html';
}

// Check if the user is on a desktop and redirect if true
window.addEventListener('DOMContentLoaded', function () {
    if (isDesktop()) {
        redirectToAnotherPage();
    }
});


// Function to disable right-click context menu
function disableRightClick(event) {
    event.preventDefault();
}

// Attach the disableRightClick function to the contextmenu event
window.addEventListener('contextmenu', disableRightClick);

