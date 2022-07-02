let basket_button = document.querySelector('.basket'),
    add_button = document.querySelectorAll('.add-to-basket')
    basketProduct = [];

if (localStorage.basketProduct !== undefined) {
    basketProduct = JSON.parse(localStorage.basketProduct);
}

add_button.forEach(elem => {
    elem.onclick = (e) => {
        e.preventDefault();
        let product = elem.closest('.product')

        if (product.classList.contains('not_available') || product.classList.contains('waiting_available')) {
            return false;
        }

        if (basketProduct.length == 0) {
            basketProduct.push({id: product.getAttribute('data-product-id'), quantify:  1});
        } else {
            for (let i = 0; i < basketProduct.length; i++) {
                if (basketProduct[i]['id'] == product.getAttribute('data-product-id')) {
                    basketProduct[i]['quantify']++;
                    break;
                } else if (i == basketProduct.length-1) {
                    basketProduct.push({id: product.getAttribute('data-product-id'), quantify:  1});
                    break;
                }
            }
        }

        localStorage.basketProduct = JSON.stringify(basketProduct);
    }
});

basket_button.onclick = openBasket;

function openBasket (e, basketProducts = basketProduct){
    console.log(e)
    e.preventDefault();
    let products = "";
    console.log(basketProducts)
    if (basketProducts != []) {
        for (let i = 0; i < basketProducts.length; i++) {
            if (i == 0){
                products = products+basketProducts[i]['id'];
            } else {
                products = products+","+basketProducts[i]['id'];
            }
        }
    }
    location.href = `basket?products=[${products}]`;
}
