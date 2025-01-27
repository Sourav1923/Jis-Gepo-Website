

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
