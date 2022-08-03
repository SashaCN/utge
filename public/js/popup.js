let popupBtn = document.querySelector('#popupBtn'),
    popupCloseBtn = document.querySelector('.close-popup-btn'),
    popupCloseBox = document.querySelector('#popupCloseBox'),
    popupBox = document.querySelector('#popupBox'),
    popup = document.querySelector('#popup'),
    oldPosition = 0,
    check = false;


popupBtn.onclick = function () {
    if (popupBtn.classList.contains('send-order-btn')) {
        document.querySelectorAll('input[type=text]').forEach(elem => {
            if (elem.value == '') {
                check = true;
            }
        });
        if (check == false) {
            popupBox.style.display = 'flex';
        }
    } else {
        popupBox.style.display = 'flex';
    }
}

popupCloseBox.onclick = closePopup;
if (popupCloseBtn != null) {
    popupCloseBtn.onclick = closePopup;
}

function closePopup() {
    popupBox.style.display =  'none';
}
