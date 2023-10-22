const toggleCurrentMenuItem = (targetElem = null) => {
    if (!targetElem) {
        throw Error('toggleCurrentMenuItem function - "Target element was not provided"');
    }

    const menuItems = window.document.querySelectorAll('.js-l-sidebar-item') as NodeList;
    // @ts-ignore
    const parentItem = targetElem.closest('.js-l-sidebar-item') as HTMLElement;

    menuItems &&
        [...menuItems].forEach((item) => {
            // @ts-ignore
            item.classList.remove('current-item');
        });

    parentItem && parentItem.classList.add('current-item');
};

export default toggleCurrentMenuItem;
