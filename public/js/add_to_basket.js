let add_button = document.querySelectorAll('.add-to-basket')
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

