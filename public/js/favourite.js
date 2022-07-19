let favourite_button = document.querySelector('.like'),
    favourite_count = favourite_button.querySelector('span'),
    add_favourite_button = document.querySelectorAll('.add-to-favourite'),
    favouriteProduct = [];

if (localStorage.favouriteProduct !== undefined) {
    favouriteProduct = JSON.parse(localStorage.favouriteProduct);
    checkLike();
}

add_favourite_button.forEach(elem => {
    elem.onclick = toggleFav;
});

function toggleFav (e)
{
    e.preventDefault();
    let product = e.target.closest('.product_id');

    if (!product.classList.contains('liked')) {
        if (favouriteProduct.length == 0) {
            favouriteProduct.push(product.getAttribute('data-product-id'));
        } else {
            for (let i = 0; i < favouriteProduct.length; i++) {
                if (favouriteProduct[i] == product.getAttribute('data-product-id')) {
                    break;
                } else if (i == favouriteProduct.length-1) {
                    favouriteProduct.push(product.getAttribute('data-product-id'));
                    break;
                }
            }
        }
    } else {
        favouriteProduct.splice(favouriteProduct.indexOf(product.getAttribute('data-product-id')), 1);

        if (location.pathname == '/favourite') {
            openfavourite(e);
        }
    }

    product.classList.toggle('liked');
    // showProductsNumber();
    localStorage.favouriteProduct = JSON.stringify(favouriteProduct);
}

favourite_button.onclick = openfavourite;

function openfavourite (e)
{
    e.preventDefault();
    location.href = `favourite?products=${JSON.stringify(favouriteProduct)}`;
}

function showProductsNumber ()
{
    // favourite_count.innerText = favouriteProduct.length;
}
// showProductsNumber();

function checkLike (){
    for (let i = 0; i < favouriteProduct.length; i++) {
        document.querySelector(`.product[data-product-id="${favouriteProduct[i]}"]`).classList.add('liked');
    }
}
