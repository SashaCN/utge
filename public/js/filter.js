let categories = document.querySelectorAll('.category-item');
categories.forEach(elem => {
    elem.onclick = (e) => {
        console.log('hello world');
        e.target.classList.toggle('checked-category');
    }
});
