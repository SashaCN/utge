let product = document.querySelector('#product'),
    productPlus = document.querySelector(".product-plus"),
    productMinus = document.querySelector(".product-minus"),
    productQuantify = document.querySelector(".product-quantify"),
    productPrice = document.querySelector(".active-price span"),
    productSizes = document.querySelectorAll(".size-line p"),
    productPrices = document.querySelectorAll(".general-price p");

setPrice();

productSizes.forEach((elem) => {
   elem.onclick = changeSize;
});

productPlus.onclick = prPlus;
productMinus.onclick = prMinus;

function setPrice ()
{
    product.setAttribute('data-price', productPrice.innerHTML);
}

function prMinus(event)
{
    event.preventDefault();

    if (productQuantify.value > 1) {
        productQuantify.value = productQuantify.value - 1;
        productQuantify.setAttribute("value", productQuantify.value);


        // productPrice.innerHTML = `${parseInt(productPrice.getAttribute("data-product-price")) - parseInt(productPrice.getAttribute("data-product-starting-price"))} грн`
        // productPrice.dataset.productPrice = productPrice.textContent.slice(0, productPrice.textContent.length - 1)
        // totalPriceCount()
    } else {
        return false;
    }
}

function prPlus(event) {
    event.preventDefault();
    // productNumber = this.closest(".product-row").getAttribute("data-product-number")
    // productId = this.closest(".product-row").getAttribute("data-product-id")

    productQuantify.value = parseInt(productQuantify.value) + 1;
    productQuantify.setAttribute("value", productQuantify.value);

    //     storeQuantify (productId, productQuantify.value)

    // productPrice.innerHTML = `${parseInt(productPrice.getAttribute("data-product-starting-price")) + parseInt(productPrice.getAttribute("data-product-price"))} грн`
    // productPrice.dataset.productPrice = productPrice.textContent.slice(0, productPrice.textContent.length - 1)
    // totalPriceCount()
}

function changeSize (e)
{
    if (e.target.classList.contains('active-size')) {
        return false;
    }

    document.querySelector('.active-size').classList.remove('active-size');
    e.target.classList.add('active-size');

    productPrices.forEach(elem => {
        elem.classList.remove('active-price');
        if (e.target.getAttribute('data-price') == elem.querySelector('span').textContent) {
            elem.classList.add('active-price');
        }
    });

    product.classList.remove('available');
    product.classList.remove('not_available');
    product.classList.remove('waiting_available');
    product.classList.remove('available_for_order');

    
}
