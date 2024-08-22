// Toggle burger menu.
const toggleBurgerMenu = () => {
    const burgerMenu = window.document.querySelector('.js-burger-menu') as HTMLElement;
    const customSidebarLeft = window.document.querySelector('.js-custom-sidebar-left') as HTMLElement;

    if (!burgerMenu || !customSidebarLeft) return;
    burgerMenu.classList.toggle('burger-active');
    customSidebarLeft.classList.toggle('burger-active');
    window.document.body.classList.toggle('burger-active');
};

export default toggleBurgerMenu;
