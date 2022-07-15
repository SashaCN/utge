let favourite_button = document.querySelector('.like'),
    favourite_count = favourite_button.querySelector('span'),
    add_favourite_button = document.querySelectorAll('.add-to-favourite'),
    favouriteProduct = [];

if (localStorage.favouriteProduct !== undefined) {
    favouriteProduct = JSON.parse(localStorage.favouriteProduct);
}

add_favourite_button.forEach(elem => {
    elem.onclick = (e) => {
        e.preventDefault();
        let product = elem.closest('.product_id');

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

        // showProductsNumber();
        localStorage.favouriteProduct = JSON.stringify(favouriteProduct);
    }
});

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
