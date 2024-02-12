// Scroll to Top Functionality
const scrollToTop = document.querySelector('.scrollToTop');
// console.log(btn)
window.addEventListener('scroll', () => {
    if (window.pageYOffset > 100) {
        scrollToTop.classList.add('active');
    }
    else {
        scrollToTop.classList.remove('active');
    }
})
scrollToTop.addEventListener('click', () => {
    window.scrollTo(0, 0)
})
