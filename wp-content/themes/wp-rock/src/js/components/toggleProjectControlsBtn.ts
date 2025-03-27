/**
 * Toggles the visibility of the project controls menu.
 *
 * This function adds or removes the 'burger-active' class from the burger menu,
 * custom sidebar, and the body element to control the visibility of the project controls.
 *
 * @param {HTMLElement} target - The element that was clicked to trigger this function.
 */
const toggleProjectControlsBtn = (target: HTMLElement) => {
    const projectControlsBtnArr = window.document.querySelectorAll('.js-project-controls-btn') as NodeListOf<HTMLElement>;
    const projectGalleryControls = window.document.querySelector('.js-project-gallery-controls') as HTMLElement;

    if (!projectControlsBtnArr || !projectGalleryControls) return;
    const isActiveReadMoreBtn = target.classList.contains('project-read-more-btn') ? 'toggle' : 'remove';

    [...projectControlsBtnArr].forEach((btn) => {
        const actionType = btn === target ? 'toggle' : 'remove';
        btn.classList[actionType]('btn-active');
    });

    projectGalleryControls.classList[isActiveReadMoreBtn]('read-more-active');
};

export default toggleProjectControlsBtn;
