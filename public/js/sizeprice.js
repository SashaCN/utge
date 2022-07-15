let sizeprice = document.querySelector('.size-price'),
    size_price_add_btn = document.querySelector('#add-size-price'),
    size_price_delete_btn = document.querySelector('#delete-size-price'),
    counter_input = document.querySelector('#product-counter'),
    auto_value_inuts = [],
    auto_selects = [],
    new_auto_value_inuts,
    new_auto_selects,
    options,
    counter = 1;

size_price_add_btn.onclick = addSizePrice;
size_price_delete_btn.onclick = deleteSizePrice;

function addSizePrice(e)
{
    if (e != null) {
        e.preventDefault();
    }

    countSizePrices (counter);

    counter++;

    counter_input.value = counter;

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

    auto_value_inuts = document.querySelectorAll('.auto-value');
    auto_selects = document.querySelectorAll('.auto-select');
    sizeprice.innerHTML = text;
    new_auto_value_inuts = document.querySelectorAll('.auto-value');
    new_auto_selects = document.querySelectorAll('.auto-select');

    for (let i = 0; i < auto_value_inuts.length; i++) {
        if (auto_value_inuts[i].value != "") {
            if (i > new_auto_value_inuts.length-1) {
                break;
            }
            new_auto_value_inuts[i].value = auto_value_inuts[i].value;
            auto_value_inuts[i].name = 2;

            if (auto_value_inuts[i].hasChildNodes()) {
                console.log(new_auto_value_inuts[i]+auto_value_inuts[i]);
                options = auto_value_inuts[i].querySelectorAll('option');
                options.forEach(elem => {
                    if (elem.value == auto_value_inuts[i].value) {
                        elem.setAttribute('selected', 'selected');
                    }
                });
            }
        }
    }
    for (let i = 0; i < auto_selects.length; i++) {
        if (auto_value_inuts[i].value != "") {
            if (i > new_auto_value_inuts.length-1) {
                break;
            }
            new_auto_value_inuts[i].value = auto_value_inuts[i].value;
        }
    }
}

console.log(auto_value_inuts);

auto_value_inuts.forEach(elem => {
    elem.oninput = (e) => {
        e.target.setAttribute('value', elem.value);
    }
});

