import toggleBurgerMenu from './toggleBurgerMenu';

const toggleCurrentMenuItem = (targetElem = null) => {
    if (!targetElem) {
        throw Error('toggleCurrentMenuItem function - "Target element was not provided"');
    }

    const menuItems = window.document.querySelectorAll('.js-l-sidebar-item') as NodeList;
    // @ts-ignore
    const parentItem = targetElem.closest('.js-l-sidebar-item') as HTMLElement;
    const burgerMenu = window.document.querySelector('.js-burger-menu') as HTMLElement;

    menuItems &&
        [...menuItems].forEach((item) => {
            // @ts-ignore
            item.classList.remove('current-item');
        });

    parentItem && parentItem.classList.add('current-item');

    if (burgerMenu && burgerMenu.classList.contains('burger-active')) toggleBurgerMenu();
};

export default toggleCurrentMenuItem;
