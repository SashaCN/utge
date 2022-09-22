let filterCheckboxes = document.querySelectorAll(".filter-item-checkbox")
filterCheckboxes.forEach(el => {
    el.oninput = ()=>{ajaxSubmit.click()}
})