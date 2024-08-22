/**
 * SASS
 */
import '../sass/frontend.scss';
/**
 * JavaScript
 */
// import Sliders from './components/swiper-init';
import Popup from './parts/popup-window';
import {anchorLinkScroll} from './parts/helpers';
import toggleCurrentMenuItem from './components/toggleCurrentMenuItem';
import toggleScrollBtnTop from "./components/toggleScrollBtnTop";
import toggleBurgerMenu from "./components/toggleBurgerMenu";

function ready() {
    const fileInputs = document.querySelectorAll('.wpcf7-file') as NodeList;

    const popupInstance = new Popup();
    popupInstance.init();

    anchorLinkScroll('.js-l-sidebar-item a', toggleCurrentMenuItem);
    anchorLinkScroll('.js-anchorLink', toggleCurrentMenuItem);

    /**
     * Add handler for scroll event.
     */
    window.document.addEventListener('scroll', () => {
        // scrollHeader();
        toggleScrollBtnTop();
    });

    /**
     * Add handler for click event.
     */
    document.body.addEventListener('click', (event) => {
        const target = event.target as HTMLElement;
        const ROLE = target.dataset.role;

        if (!ROLE) return;

        switch (ROLE) {
            case 'toggle-accordion-item': {
                const parentItem = target.closest('.js-accordion-item') as HTMLElement;
                const accordionTtems = window.document.querySelectorAll('.js-accordion-item') as NodeList;
                const actionType = parentItem && parentItem.classList.contains('active') ? 'remove' : 'add';

                accordionTtems &&
                    [...accordionTtems].forEach((item) => {
                        // @ts-ignore
                        item.classList.remove('active');
                    });

                parentItem.classList[actionType]('active');
                break;
            }

            case 'scroll-to-top': {
                window.scroll({
                    top: 0,
                    behavior: 'smooth',
                });

                break;
            }

            case 'load-more-projects': {
                const worksItemsElem = window.document.querySelector('.js-works-items') as HTMLElement;
                const postShown = target.dataset.postsShown;
                const { loadStep } = target.dataset;

                if (!postShown || !worksItemsElem || !loadStep) return;

                const data = new FormData();
                data.append('action', 'load-more-projects');
                data.append('postShown', postShown);
                data.append('loadStep', loadStep);
                // @ts-ignore
                fetch(var_from_php.ajax_url, {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: data,
                })
                    .then((response) => response.json())
                    .then((request) => {
                        if (request.success && request.data) {
                            worksItemsElem.insertAdjacentHTML('beforeend', request.data.data);
                            target.dataset.postsShown = String(+postShown + +loadStep);
                        } else {
                            worksItemsElem.insertAdjacentHTML('beforeend', request.data.data);
                            target.classList.add('not-active');
                        }
                    });

                break;
            }

            case 'toggle-burger-menu': {
                toggleBurgerMenu();

                break;
            }

            default:
                break;
        }
    });

    // Add a change event listener to the input type="file" fields.
    fileInputs &&
        [...fileInputs].forEach((item) => {
            item.addEventListener('change', () => {
                // @ts-ignore
                const parentInputWrap = item.closest('.js-input-wrapper');
                const fileNameElem = parentInputWrap ? parentInputWrap.querySelector('.js-file-name') : null;

                if (!fileNameElem) return;

                // @ts-ignore
                if (item.files && item.files[0]) {
                    // @ts-ignore
                    const fileName = item.files[0].name;
                    fileNameElem.textContent = ` ${fileName}`;
                } else {
                    fileNameElem.textContent = '';
                }
            });
        });
}

window.document.addEventListener('DOMContentLoaded', ready);
