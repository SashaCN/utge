let categories = document.querySelectorAll('.category-item'),
    form = document.querySelector('#filter'),
    sub = document.querySelectorAll('.sub-list input[type=checkbox]');

categories.forEach(elem => {
    elem.onclick = (e) => {
        e.target.classList.toggle('checked-category');
    }
});

sub.forEach(elem => {
    elem.onchange = () => {
        form.submit();
    }
});

showCategory ();

function showCategory ()
{
    sub.forEach(elem => {
        if (elem.checked == true) {
            elem.closest('.category-li').querySelector('.category-item').classList.add('checked-category');
        }
    });
}
