let add_button = document.querySelectorAll('.add-to-basket');

add_button.forEach(elem => {
    elem.onclick = (e) => {
        e.preventDefault();
    }
});

