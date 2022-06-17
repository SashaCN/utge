let a = [
    document.querySelector('#title_uk'),
    document.querySelector('#title_ru'),
    document.querySelector('#desc_ru'),
    document.querySelector('#desc_ru'),
];

// a.forEach(e => {
    //     e.onclick = autocompleteSEO;
    // });
    document.querySelector('#title_uk').onclick = autocompleteSEO

function autocompleteSEO()
{
    console.log(1);
    // autocomplete title
    document.querySelectorAll('title_seo_uk').forEach(e => {
        e.value = document.querySelector('#title_uk').value;
    });
    
    document.querySelectorAll('title_seo_ru').forEach(e => {
        e.value = document.querySelector('#title_ru').value;
    });
    
    // autocomplete description
    document.querySelectorAll('desc_seo_uk').forEach(e => {
        e.value = document.querySelector('#desc_uk').value;
    });
    
    document.querySelectorAll('desc_seo_ru').forEach(e => {
        e.value = document.querySelector('#desc_uk').value;
    });
}