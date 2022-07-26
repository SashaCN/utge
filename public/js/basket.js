window.onload = () => {
    let productPlus = document.querySelectorAll(".product-plus"),
        productMinus = document.querySelectorAll(".product-minus"),
        productQuantify = document.querySelectorAll(".product-quantify"),
        productPrice = document.querySelectorAll(".basket-price"),
        deleteProduct = document.querySelectorAll(".delete-product"),
        generalPrice = document.querySelectorAll(".general-price"),
        generalQuantify = document.querySelector(".general-quantify"),
        productQuantifyOrder = document.querySelectorAll('.product-quantify-order'),
        productId;

    // productPrice = document.querySelectorAll('.basket-price');
    // orderProducts = document.querySelectorAll(".product-row")
    // productPriceOrder = document.querySelectorAll('.product-price-order');
    // productPriceOrder = document.querySelectorAll('.product-price-order');
    // productInputQuantify = document.querySelectorAll('.product_input_quantify');
    // productInputPrice = document.querySelectorAll('.product_input_price');


    productPlus.forEach(element => {
        element.onclick = () => { quantifyCounter(element); }
    });

    productMinus.forEach(element => {
        element.onclick = () => { quantifyCounter(element); }
    });

    productQuantify.forEach(element => {
        element.oninput = () => { quantifyCounter(element); }
    });

    productQuantify.forEach(element => {
        quantifyCounter(element);
    });

    function quantifyCounter (element) 
    {
        event.preventDefault();

        product = element.closest(".product-row");
        productId = product.getAttribute("data-product-id");
        quantifyInput = product.querySelector('.product-quantify');


        if (element.classList.contains('product-minus') && quantifyInput.value != 1) 
        {
            quantifyInput.value --;
        } 
        
        if (element.classList.contains('product-quantify')) 
        {
            quantifyInput.value = quantifyInput.value
        }

        if (element.classList.contains('product-plus')) 
        {
            quantifyInput.value++;
        }
        
        // можливо видалити
        productQuantifyOrder[productId - 1].innerHTML = quantifyInput.value;
        // кінець можливому видаленю

        priceCounter(quantifyInput.value, product);
        generalCounter();
        pushToLocalStorage();   
    }
    
    function priceCounter (productQuantify, parent) 
    {
        defaultPrice = parent.querySelector('.default-price');
        productPrice = parent.querySelector('.basket-price');

        productPrice.innerHTML = defaultPrice.value * productQuantify + ' грн';
    }

    function generalCounter() {
        totalQuantify = 0,
        totalPrice = 0;
       
        document.querySelectorAll('.product-quantify').forEach(e => {
            totalQuantify += Number(e.value);
        });

        document.querySelectorAll('.basket-price').forEach(e => {
            totalPrice += Number(e.textContent.split(' ')[0]);
        });
        
        generalQuantify.innerHTML = totalQuantify + ' шт';

        generalPrice.forEach(element => {
            element.innerHTML = totalPrice + ' грн';
        });
    }
     
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
    });

    function pushToLocalStorage() {
        productsMass = [];
        products = document.querySelectorAll(".product-row");

        products.forEach(element => {
            productsMass.push({
                id: element.getAttribute('data-product-id'), 
                quantify:  element.querySelector('.product-quantify').value, 
                size:  element.querySelector('.default-size').value, 
            });
        });

        localStorageBasket = JSON.parse(localStorage.basketProduct)

        localStorageBasket.forEach((e, i) => {
            if (e['id'] == productsMass[i]['id'] && e['size'] == productsMass[i]['size']) 
            {
                e['quantify'] = productsMass[i]['quantify'];
            }
        });

        localStorage.basketProduct = JSON.stringify(localStorageBasket)
        // openBasket(event, localStorageBasket)
    }
}


document.querySelector('#to-order-btn').onclick = function (){
    document.querySelector('.basket-table').style.display = 'none';
    document.querySelector('.placing-an-order').style.display = 'block';


    
}

// ------------------------
// delivery block
// ------------------------

let selfDelivery = document.querySelector('.self_delivery'),
    adressDelivery = document.querySelectorAll('.adress_delivery'),
    postDelivery = document.querySelectorAll('.post_delivery'),
    selfDeliveryLabel = document.querySelector('.self_delivery_label'),
    postDeliveryLabel = document.querySelector('.post_delivery_label'),
    adressDeliveryLabel = document.querySelector('.adress_delivery_label');

  
    selfDelivery.onclick = () => {
        selfDeliveryLabel.style.display = 'none';
    };

    adressDelivery.forEach(element => {
        element.onclick = () => {
            selfDeliveryLabel.style.display = 'block';
            postDeliveryLabel.style.display = 'none';
            adressDeliveryLabel.style.display = 'block';
        };
    });
    
    postDelivery.forEach(element => {
        
        element.onclick = element.onclick = () => {
            selfDeliveryLabel.style.display = 'block';
            postDeliveryLabel.style.display = 'block';
            adressDeliveryLabel.style.display = 'none';
        };
    });
