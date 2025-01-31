const header = document.querySelector("header");
// NavBar Flexibility 
window.addEventListener("scroll", function () {
    header.classList.toggle("sticky", window.scrollY > 0);
});

let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
let isMenuActive = false;
let scrollTimeout;

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');

    isMenuActive = menu.classList.contains('bx-x');

    menu.style.color = isMenuActive ? 'black' : 'white';
};

window.onscroll = () => {
    if (!isMenuActive) {
        menu.style.color = 'black';
    }

    clearTimeout(scrollTimeout);

    scrollTimeout = setTimeout(() => {
        if (!isMenuActive) {
            menu.style.color = 'white';
        }
    }, 500);
};

// About Us section Read More Button
document.addEventListener('DOMContentLoaded', () => {
    const readMoreBtn = document.getElementById('read-more-btn');
    const moreText = document.querySelector('.more-text');

    readMoreBtn.addEventListener('click', (event) => {
        event.preventDefault();

        if (moreText.style.display === 'none' || moreText.style.display === '') {
            moreText.style.display = 'inline';
            readMoreBtn.textContent = 'Read Less';
        } else {
            moreText.style.display = 'none';
            readMoreBtn.textContent = 'Read More';
        }
    });
});

// Linking 
// International partners
document.querySelector(".diu").addEventListener("click", () => {
    location.assign("https://diu.ac/");
});
document.querySelector(".ait").addEventListener("click", () => {
    location.assign("https://ait.ac.th/");
});
document.querySelector(".EsSoe").addEventListener("click", () => {
    location.assign("https://en.esigelec.fr/");
});

// National partners
document.querySelector(".jisu").addEventListener("click", () => {
    location.assign("https://www.jisuniversity.ac.in/");
});
document.querySelector(".jisce").addEventListener("click", () => {
    location.assign("https://www.jiscollege.ac.in/");
});
document.querySelector(".nit").addEventListener("click", () => {
    location.assign("https://www.nit.ac.in/");
});
document.querySelector(".gnit").addEventListener("click", () => {
    location.assign("https://gnit.ac.in/");
});
document.querySelector(".aec").addEventListener("click", () => {
    location.assign("http://www.aecwb.edu.in/");
});
document.querySelector(".jisRe").addEventListener("click", () => {
    location.assign("https://jisiasr.org/");
});
