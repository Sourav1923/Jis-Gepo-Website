// JavaScript for Read More buttons
const readMoreBtns = document.querySelectorAll('.read-more-btn');

readMoreBtns.forEach(btn => {
    btn.addEventListener('click', (event) => {
        event.preventDefault(); 
        const moreText = btn.previousElementSibling.querySelector('.more-text');

        if (moreText.style.display === 'none' || moreText.style.display === '') {
            moreText.style.display = 'inline'; 
            btn.textContent = 'Read Less'; 
        } else {
            moreText.style.display = 'none'; 
            btn.textContent = 'Read More'; 
        }
    });
});

// JavaScript for mobile menu toggle
document.addEventListener("DOMContentLoaded", function() {
    const menuIcon = document.getElementById("menu-icon");
    const navbar = document.querySelector(".navbar");

    menuIcon.addEventListener("click", function() {
        navbar.classList.toggle("open"); // Toggle the 'open' class on the navbar
        if (navbar.classList.contains("open")) {
            navbar.style.right = "0"; // Show the navbar
        } else {
            navbar.style.right = "-100%"; // Hide the navbar
        }
    });

    // Optional: Close the navbar when a link is clicked
    navbar.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", function() {
            navbar.classList.remove("open"); // Remove 'open' class when a link is clicked
            navbar.style.right = "-100%"; // Hide the navbar
        });
    });
});