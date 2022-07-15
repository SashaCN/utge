let popupBtn = document.querySelector('#popupBtn'),
    popupCloseBtn = document.querySelector('.close-popup-btn'),
    popupBox = document.querySelector('#popupBox'),
    popup = document.querySelector('#popup'),
    oldPosition = 0;


popupBtn.onclick = function () {
    popupBox.style.display = 'flex';
    scrollTop()
}

popupBox.onclick = closePopup;
popupCloseBtn.onclick = closePopup;

function closePopup() {
    popupBox.style.display = 'none';
}

function scrollTop() {

    window.scrollTo(0, window.pageYOffset - 5);
    // if(window.pageYOffset <= popup.offsetTop - (popup.offsetTop + popup.offsetHeight/2) || window.pageYOffset == oldPosition){
    if(window.pageYOffset <= popup.offsetTop + popup.offsetHeight / 3  || window.pageYOffset == oldPosition){
        return false;
    }else{
        oldPosition = window.pageYOffset;
        setTimeout(()=>{
            scrollTop();
        },1)
    }
}