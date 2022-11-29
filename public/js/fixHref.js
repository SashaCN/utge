brokenHref = document.querySelectorAll('.href-fix a');

brokenHref.forEach(element => {
  element.onclick = ()=>{hrefFix(element)};
});

function hrefFix(element) {
  event.preventDefault();
  location.href = location.href.slice(0, 12) + element.href.slice(20); 
}