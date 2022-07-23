window.onload = () => {
    let orderProducts = document.querySelectorAll(".product-row"),
        productPlus = document.querySelectorAll(".product-plus"),
        productMinus = document.querySelectorAll(".product-minus"),
        productQuantify = document.querySelector(".product-quantify"),
        productPrice = document.querySelectorAll(".basket-price"),
        deleteProduct = document.querySelectorAll(".delete-product"),
        generalQuantify = document.querySelector(".general-quantify"),
        generalPrice = document.querySelectorAll(".general-price"),
        basketProducts,
        productId,
        innerString = "",
        totalQuantify = 0,
        totalPrice = 0,
        productNumber


    refreshProducts()

    function attributeAdd() {
        for (let i = 0; i < orderProducts.length; i++) {
            orderProducts[i].dataset.productNumber = i
            productPrice[i].dataset.productStartingPrice = productPrice[i].textContent.match(/\d+/g)
            productPrice[i].dataset.productPrice = productPrice[i].textContent.match(/\d+/g)
        }
    }

    function prMinus(event) {
        event.preventDefault()
        productNumber = this.closest(".product-row").getAttribute("data-product-number")
        productId = this.closest(".product-row").getAttribute("data-product-id")

        if (productQuantify[productNumber].value > 0) {
            productQuantify[productNumber].value = productQuantify[productNumber].value - 1
            productQuantify[productNumber].setAttribute("value", productQuantify[productNumber].value)

            storeQuantify (productId, productQuantify[productNumber].value)

            productPrice[productNumber].innerHTML = `${parseInt(productPrice[productNumber].getAttribute("data-product-price")) - parseInt(productPrice[productNumber].getAttribute("data-product-starting-price"))} грн`
            productPrice[productNumber].dataset.productPrice = productPrice[productNumber].textContent.slice(0, productPrice[productNumber].textContent.length - 1)
            totalPriceCount()
        } else {
            return false
        }
    }

    function prPlus(event) {
        event.preventDefault()
        productNumber = this.closest(".product-row").getAttribute("data-product-number")
        productId = this.closest(".product-row").getAttribute("data-product-id")

        productQuantify[productNumber].value = parseInt(productQuantify[productNumber].value) + 1
        productQuantify[productNumber].setAttribute("value", productQuantify[productNumber].value)

            storeQuantify (productId, productQuantify[productNumber].value)

        productPrice[productNumber].innerHTML = `${parseInt(productPrice[productNumber].getAttribute("data-product-starting-price")) + parseInt(productPrice[productNumber].getAttribute("data-product-price"))} грн`
        productPrice[productNumber].dataset.productPrice = productPrice[productNumber].textContent.slice(0, productPrice[productNumber].textContent.length - 1)
        totalPriceCount()
    }

    function valueChange() {
        productNumber = this.closest(".product-row").getAttribute("data-product-number")
        productQuantify[productNumber].setAttribute("value", productQuantify[productNumber].value)
        // localStorageAdd()
        productPrice[productNumber].innerHTML = `${parseInt(productPrice[productNumber].getAttribute("data-product-starting-price")) * this.value} грн`
        productPrice[productNumber].dataset.productPrice = productPrice[productNumber].textContent.slice(0, productPrice[productNumber].textContent.length - 1)
        totalPriceCount()
    }

    function totalPriceCount() {
        productPrice = document.querySelectorAll(".basket-price")
        productQuantify = document.querySelectorAll(".product-quantify")

        productPrice.forEach((elem) => {
            totalPrice += parseInt(elem.getAttribute("data-product-price"))
        })

        productQuantify.forEach((elem) => {
            totalQuantify += parseInt(elem.value)
        })

        generalPrice.forEach(element => {
            element.innerHTML = `${totalPrice} грн`
        });
        generalQuantify.innerHTML = `${totalQuantify} шт`
        totalPrice = 0
        totalQuantify = 0
    }

    function refreshProducts() {
        orderProducts = document.querySelectorAll(".product-row")
            productPlus = document.querySelectorAll(".product-plus")
            productMinus = document.querySelectorAll(".product-minus")
            productQuantify = document.querySelectorAll(".product-quantify")
            productPrice = document.querySelectorAll(".basket-price") // in popup
            deleteProduct = document.querySelectorAll(".delete-product")
            generalQuantify = document.querySelector(".general-quantify")

        attributeAdd()
        checkQuatify()
        totalPriceCount()

        productPlus.forEach((elem) => {
            elem.onclick = prPlus
        })
        productMinus.forEach((elem) => {
            elem.onclick = prMinus
        })
        productQuantify.forEach((elem) => {
            elem.oninput = valueChange
        })
        deleteProduct.forEach((elem) => {
            elem.onclick = (event) => {
                event.preventDefault()

                basketProducts = JSON.parse(localStorage.basketProduct)
                for (let i = 0; i < basketProducts.length; i++){
                    if (event.target.closest(".product-row").getAttribute("data-product-id") == basketProducts[i]['id']) {
                        basketProducts.splice(i, 1)
                        break
                    }
                }
                localStorage.basketProduct = JSON.stringify(basketProducts)
                openBasket(event, basketProducts)
            }
        })
    }

    function checkQuatify(){
        basketProducts = JSON.parse(localStorage.basketProduct)
        for (let i = 0; i < orderProducts.length; i++){
            basketProducts.forEach(basket => {
                if (orderProducts[i].getAttribute("data-product-id") == basket['id']) {
                    productQuantify[i].value = parseInt(basket['quantify'])
                    productQuantify[i].setAttribute("value", productQuantify[i].value)
                    productPrice[i].innerHTML = `${parseInt(productPrice[i].getAttribute("data-product-starting-price")) * parseInt(basket['quantify'])} грн`
                    productPrice[i].dataset.productPrice = productPrice[i].textContent.match(/\d+/g)
                }
            })
        }
    }

    function storeQuantify (id, quantify){
        basketProducts = JSON.parse(localStorage.basketProduct)
        basketProducts.forEach(basket => {
            if (id == basket['id']) {
                basket['quantify'] = quantify
            }
        })
        localStorage.basketProduct = JSON.stringify(basketProducts)
    }

    // function localStorageAdd() {
    //     localStorage.basketContent = basketProducts.innerHTML
    //     // localStorage.basketPrice = balance.innerHTML
    // }

}

document.querySelector('#to-order-btn').onclick = function (){
    document.querySelector('.basket-table').style.display = 'none';
    document.querySelector('.placing-an-order').style.display = 'block';

    productQuantify = document.querySelectorAll('.product-quantify');
    productPrice = document.querySelectorAll('.basket-price');
    productQuantifyOrder = document.querySelectorAll('.product-quantify-order');
    productPriceOrder = document.querySelectorAll('.product-price-order');
    productPriceOrder = document.querySelectorAll('.product-price-order');
    productInputQuantify = document.querySelectorAll('.product_input_quantify');
    productInputPrice = document.querySelectorAll('.product_input_price');

    document.querySelector('.product_input_general_price').value = document.querySelector('.general-price').textContent;

    for (let i = 0; i < productQuantify.length; i++) {
        productQuantifyOrder[i].innerHTML = productQuantify[i].value;
        productPriceOrder[i].innerHTML = productPrice[i].textContent;
        productInputQuantify[i].value = productQuantify[i].value;
        productInputPrice[i].value = productPrice[i].textContent;
    }
}

let selfDelivery = document.querySelector('.self_delivery'),
    adressDelivery = document.querySelectorAll('.adress_delivery'),
    postDelivery = document.querySelectorAll('.post_delivery'),
    selfDeliveryLabel = document.querySelector('.self_delivery_label'),
    postDeliveryLabel = document.querySelector('.post_delivery_label'),
    adressDeliveryLabel = document.querySelector('.adress_delivery_label');

    selfDelivery.onclick = hiddeSelfDeliveryLabel;

    adressDelivery.forEach(element => {
        element.onclick = showAdressDeliveryLabel();
    });
    
    postDelivery.forEach(element => {
        
        element.onclick = showPostDeliveryLabel();
    });
    
    function showPostDeliveryLabel() {
        selfDeliveryLabel.style.display = 'block';
        postDeliveryLabel.style.display = 'block';
        adressDeliveryLabel.style.display = 'none';
    }
    
    function showAdressDeliveryLabel() {
        selfDeliveryLabel.style.display = 'block';
        postDeliveryLabel.style.display = 'none';
        adressDeliveryLabel.style.display = 'block';
    }
    
    function hiddeSelfDeliveryLabel() {
        selfDeliveryLabel.style.display = 'none';
    }