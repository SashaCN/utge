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

        basketProduct.push(product.getAttribute('data-product-number'));
        localStorage.basketProduct = JSON.stringify(basketProduct);
    }
});

basket_button.onclick = (e) => {
    e.preventDefault();
    let products = "";
    if (basketProduct != []) {
        for (let i = 0; i < basketProduct.length; i++) {
            if (i == 0){
                products = products+basketProduct[i];
            } else {
                products = products+","+basketProduct[i];
            }
        }
    }
    location.href = `basket?products=[${products}]`;
}
