const header = document.querySelector("header");
//NavBar Flexibility 
window.addEventListener ("scroll", function() {
    header.classList.toggle ("sticky", window.scrollY > 0);
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

    
    menu.classList.remove('bx-x');
    navbar.classList.remove('open');
    isMenuActive = false; 
    clearTimeout(scrollTimeout);

    
    scrollTimeout = setTimeout(() => {
        if (!isMenuActive) {
            menu.style.color = 'white'; 
        }
    }, 500);
};
//About Us section Read more Button
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

