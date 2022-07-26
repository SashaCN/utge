let popupBtn = document.querySelector('#popupBtn'),
    popupCloseBtn = document.querySelector('.close-popup-btn'),
    popupCloseBox = document.querySelector('#popupCloseBox'),
    popupBox = document.querySelector('#popupBox'),
    popup = document.querySelector('#popup'),
    oldPosition = 0;


popupBtn.onclick = function () {
    popupBox.style.display = 'flex';
}

popupCloseBox.onclick = closePopup;
if (popupCloseBtn != null) {
    popupCloseBtn.onclick = closePopup;
}

function closePopup() {
    popupBox.style.display =  'none';
}