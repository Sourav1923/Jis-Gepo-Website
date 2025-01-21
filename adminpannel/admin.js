const sideMenu = document.querySelector('aside');
const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');
const themeToggler = document.querySelector('.theme-toggler');

// Show sidebar
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

// Close sidebar
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

// Change theme
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
});

// Handle collaboration requests
document.querySelectorAll('.approve').forEach(button => {
    button.addEventListener('click', () => {
        const row = button.closest('tr');
        row.querySelector('.pending').textContent = 'Approved';
        row.querySelector('.pending').classList.remove('pending');
        row.querySelector('.pending').classList.add('approved');
        button.style.display = 'none';
        row.querySelector('.reject').style.display = 'none';
    });
});

document.querySelectorAll('.reject').forEach(button => {
    button.addEventListener('click', () => {
        const row = button.closest('tr');
        row.remove();
    });
});