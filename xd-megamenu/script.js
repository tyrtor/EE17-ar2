/* element vi använder */
const overlay = document.querySelector('#overlay');
const closeMenu = document.querySelector('#close-menu');
const openMenu = document.querySelector('#open-menu');

/* vad händer när vi klickar */
openMenu.addEventListener('click', toggleOverlay);

/* vad händer när vi klickar */
closeMenu.addEventListener('click', toggleOverlay);


function toggleOverlay() {
    overlay.classList.toggle('show-menu');
}
