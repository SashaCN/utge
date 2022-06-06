let sizeprice = document.querySelector('.size-price'),
    size_price_add_btn = document.querySelector('#add-size-price'),
    size_price_delete_btn = document.querySelector('#delete-size-price'),
    counter = 0;

addSizePrice();
size_price_add_btn.onclick = addSizePrice;
size_price_delete_btn.onclick = deleteSizePrice;

function addSizePrice(e)
{
    if (e != null) {
        e.preventDefault();
    }

    counter++;
    countSizePrices (counter);
}

function deleteSizePrice(e)
{
    if (e != null) {
        e.preventDefault();
    }

    if (counter <= 1) {
        return false;
    }

    counter--;
    countSizePrices (counter);
}

function countSizePrices (counter)
{
    let text = "";
    for (let i = 1; i <= counter; i++) {
        text += getStructure(i);
    }
    sizeprice.innerHTML = text;
}
