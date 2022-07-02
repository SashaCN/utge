window.onload = () => {
    let orderProducts = document.querySelectorAll(".product-row"),
        productPlus = document.querySelectorAll(".product-plus"),
        productMinus = document.querySelectorAll(".product-minus"),
        productQuantify = document.querySelectorAll(".product-quantify"),
        productPrice = document.querySelectorAll(".basket-price"), // in popup
        deleteProduct = document.querySelectorAll(".delete-product"),
        generalQuantify = document.querySelector(".general-quantify"),
        generalPrice = document.querySelector(".general-price"),
        basketProducts,
        innerString = "",
        totalQuantify = 0,
        totalPrice = 0,
        productNumber


refreshProducts()

// refreshProducts()

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
    if (productQuantify[productNumber].value > 0) {
        productQuantify[productNumber].value = productQuantify[productNumber].value - 1
        productQuantify[productNumber].setAttribute("value", productQuantify[productNumber].value)
        // localStorageAdd()
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
    productQuantify[productNumber].value = parseInt(productQuantify[productNumber].value) + 1
    productQuantify[productNumber].setAttribute("value", productQuantify[productNumber].value)
    // localStorageAdd()
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
    console.log(productPrice)
    productPrice.forEach((elem) => {
        totalPrice += parseInt(elem.getAttribute("data-product-price"))
    })
    generalPrice.innerHTML = `${totalPrice} грн`
    totalPrice = 0
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
                if (event.target.closest(".product-row").getAttribute("data-product-id") == basketProducts[i]) {
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
    for(let i = 0; i < orderProducts.length; i++){
        basketProducts.forEach(basket => {
            if (orderProducts[i].getAttribute("data-product-id") == basket['id']) {
                productQuantify[i].value = parseInt(basket['quantify'])
                productQuantify[i].setAttribute("value", productQuantify[i].value)
                productPrice[i].innerHTML = `${parseInt(productPrice[i].getAttribute("data-product-starting-price")) * parseInt(basket['quantify'])} грн`
                productPrice[i].dataset.productPrice = productPrice[i].textContent.match(/\d+/g)
            }
        })
    }
    // totalPriceCount()
}

// function localStorageAdd() {
//     localStorage.basketContent = basketProducts.innerHTML
//     // localStorage.basketPrice = balance.innerHTML
// }

}
