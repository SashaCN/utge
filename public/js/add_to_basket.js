let basket_button = document.querySelector('.basket'),
    basket_count = basket_button.querySelector('span'),
    add_button = document.querySelectorAll('.add-to-basket')
    basketProduct = [],
    pr_weight = 0,
    pr_price = 0;


showBasketNum();
if (localStorage.basketProduct !== undefined) {
    basketProduct = JSON.parse(localStorage.basketProduct);
    showBasketNum();
}

add_button.forEach(elem => {
    elem.onclick = addToBasket;
});

function addToBasket (e)
{
    e.preventDefault();
    let product = e.target.closest('.product_id');

    if (product.classList.contains('not_available') || product.classList.contains('waiting_available')) {
        return false;
    }

    pr_weight = product.querySelector('.active-size').textContent;
    pr_price = product.querySelector('.active-price').textContent;

    if (basketProduct.length == 0) {
        basketProduct.push({id: product.getAttribute('data-product-id'), quantify:  1, size: pr_weight, price: pr_price});
    } else {
        for (let i = 0; i < basketProduct.length; i++) {
            if (basketProduct[i]['id'] == product.getAttribute('data-product-id') && basketProduct[i]['size'] == pr_weight) {
                basketProduct[i]['quantify']++;
                break;
            } else if (i == basketProduct.length-1) {
                basketProduct.push({id: product.getAttribute('data-product-id'), quantify:  1, size: pr_weight, price: pr_price});
                break;
            }
        }
    }

    showBasketNum();
    localStorage.basketProduct = JSON.stringify(basketProduct);
}

basket_button.onclick = openBasket;

function openBasket (e, basketProducts = basketProduct)
{
    e.preventDefault();
    let products = [];
    if (basketProducts != []) {
        for (let i = 0; i < basketProducts.length; i++) {
            products.push([basketProducts[i]['id'], basketProducts[i]['quantify'], basketProducts[i]['size'], basketProducts[i]['price']]);
        }
    }
    location.href = `${location.origin}/basket?products=${JSON.stringify(products)}`;
}

function showBasketNum ()
{
    basket_button.querySelector('span').innerText = basketProduct.length;
}
