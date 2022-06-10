// child page select

document.querySelector('#child-page-select').addEventListener('mouseenter', e => {
    document.querySelector('#child-page-first-option').disabled = true;
});

document.querySelector('#child-page-select').addEventListener('mouseleave', e => {
    document.querySelector('#child-page-first-option').disabled = false;
});
