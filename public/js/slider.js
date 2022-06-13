function changeSlide (section)
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

}

changeSlide(document.querySelector('.feed'));
changeSlide(document.querySelector('.fish'));
changeSlide(document.querySelector('.water'));
changeSlide(document.querySelector('.service'));
