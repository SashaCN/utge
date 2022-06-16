window.onload = () => {
    changeSlide(document.querySelector('.feed'), 0);
    changeSlide(document.querySelector('.fish'), 500);
    changeSlide(document.querySelector('.water'), 1000);
    changeSlide(document.querySelector('.service'), 1500);
}

function changeSlide (section, time)
{
    let current_slide = section.querySelector('.current-slide'),
        current_slide_btn = section.querySelector('.current-slide-btn'),
        slides = section.querySelectorAll('.slide'),
        controll_btns = section.querySelectorAll('.slider-control span');

    for (i = 0; i < controll_btns.length; i++) {
        slides[i].dataset.number = i
        controll_btns[i].dataset.number = i
    }

    controll_btns.forEach(elem => {
        elem.onclick = (e) => {
            if (current_slide_btn.getAttribute("data-number") == e.target.getAttribute("data-number")) {
                return false;
            }
            current_slide_btn.classList.remove('current-slide-btn');
            current_slide.classList.add('prev-slide');

            let next_slide = section.querySelector(`.slide[data-number='${e.target.getAttribute("data-number")}']`);
            current_slide_btn = e.target;
            current_slide_btn.classList.add('current-slide-btn');
            next_slide.classList.add('current-slide');

            window.setTimeout(()=>{
                current_slide.classList.remove('current-slide');
                current_slide.classList.remove('prev-slide');
                current_slide = next_slide;
            }, 500);
        }
    });

    setTimeout(() => {
        let interval = setInterval(()=>{
            current_slide_btn.classList.remove('current-slide-btn');
            current_slide.classList.add('prev-slide');

            if (parseInt(current_slide.getAttribute('data-number'))+1 < slides.length) {
                slides[parseInt(current_slide.getAttribute('data-number'))+1].classList.add('current-slide');
                controll_btns[parseInt(current_slide.getAttribute('data-number'))+1].classList.add('current-slide-btn');
                current_slide_btn = section.querySelector('.current-slide-btn');
            } else {
                slides[0].classList.add('current-slide');
                controll_btns[0].classList.add('current-slide-btn');
                current_slide_btn = section.querySelector('.current-slide-btn');
            }
            window.setTimeout(()=>{
                current_slide.classList.remove('current-slide');
                current_slide.classList.remove('prev-slide');
                current_slide = section.querySelector('.current-slide');
            }, 500);
        }, 4000);
    }, time);
}

let slider = document.querySelector('.goods-list'),
    slides = slider.querySelectorAll('a'),
    slide_right_btn = document.querySelector('.page-link-next'),
    slide_left_btn = document.querySelector('.page-link-previous'),
    slider_nav = document.querySelector('.slider-nav'),
    slider_nav_links,
    active_slide = 0;

(function addPages ()
{
    let text = "";
    for (let i = 0; i < Math.ceil(slides.length/4); i++) {
        text += `<p class="page-count" data-number="${i}"><span class="page-link"></span></p>`;
    }
    slider_nav.innerHTML = text;
    slider_nav_links = slider_nav.querySelectorAll('.page-count');
    slider_nav_links[active_slide].classList.add('active');
}())

function changeActivBtn ()
{
    document.querySelector('.page-count.active').classList.remove('active');
    slider_nav_links[active_slide].classList.add('active');
}

slider_nav_links.forEach(element => {
    element.onclick = (e) => {
        active_slide = e.target.getAttribute('data-number');
        slider.scroll(slider.getBoundingClientRect().width*active_slide, 0)

        changeActivBtn();
    }
});

slide_right_btn.onclick = slideRight;

function slideRight ()
{
    if (slider.scrollWidth - slider.scrollLeft > slider.getBoundingClientRect().width) {
        active_slide++;
    }
    changeActivBtn();

    slider.scroll(slider.scrollLeft+slider.getBoundingClientRect().width, 0)
}
slide_left_btn.onclick = slideLeft;

function slideLeft ()
{
    if (slider.scrollLeft > 0) {
        active_slide--;
    }
    changeActivBtn();

    slider.scroll(slider.scrollLeft-slider.getBoundingClientRect().width, 0)
}
