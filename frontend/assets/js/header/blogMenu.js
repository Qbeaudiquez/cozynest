const blogBtn = document.querySelector('.blogLink');
const blogMenu = document.querySelector('.blogLinkContainer');


blogBtn.addEventListener('click', (event) => {
    blogMenu.classList.toggle('active');
});

blogMenu.addEventListener('mouseleave', () => {
    blogMenu.classList.remove('active')
})