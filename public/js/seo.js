let inputsName = [
    document.querySelector('#title_uk'),
    document.querySelector('#title_ru'),
    document.querySelector('#editor1'),
    document.querySelector('#editor2'),
];

inputsName.forEach(e => {
    e.oninput = autocompleteSEO;
});

function autocompleteSEO()
{

    document.querySelectorAll('.title_seo_ru').forEach(e => {
        e.value = document.querySelector('#title_ru').value;
    });
    // autocomplete title
    document.querySelectorAll('.title_seo_uk').forEach(e => {
        e.value = document.querySelector('#title_uk').value;
    });
    
    
    // autocomplete description
    document.querySelectorAll('.desc_seo_uk').forEach(e => {
        e.value = document.querySelector('#editor1').textContent;
    });
    
    document.querySelectorAll('.desc_seo_ru').forEach(e => {
        e.value = document.querySelector('#editor2').textContent;
    });
    
    // autocomplete description
    document.querySelectorAll('.desc_seo_other').forEach(e => {
        e.value = "-";
    });
    document.querySelectorAll('.desc_seo_other').forEach(e => {
        e.value = "-";
    });
}