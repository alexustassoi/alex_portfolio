// Toggle scroll button top. Clicking on this button will cause a smooth
// scroll to the top of the page
const toggleScrollBtnTop = () => {
    const scrollToTopBtn = window.document.querySelector('.js-scrollToTopBtn') as HTMLElement;
    const actionType = document.body.scrollTop > 200 || document.documentElement.scrollTop > 200 ? 'add' : 'remove';

    if (!scrollToTopBtn) return;
    scrollToTopBtn.classList[actionType]('active');
};

export default toggleScrollBtnTop;
