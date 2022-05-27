// add menu toggle

let add_button = document.querySelector(".add"),
    add_menu = document.querySelector(".add-menu"),
    change_lang = document.querySelector(".lang-select");

document.onclick = (e) => {
  if (e.target == add_button) {
    e.preventDefault();
    add_button.classList.toggle('focus');
    add_menu.classList.toggle('hidden');
    
    document.querySelector(".lang-select").classList.remove('active-select');
  } else if(e.target == change_lang || change_lang.contains(e.target)) {
    if (!document.querySelector(".lang-select").classList.contains('active-select')) {
      e.preventDefault();
    } else if (e.target == document.querySelector(".selected-lang") || document.querySelector(".selected-lang").contains(e.target)) {
      e.preventDefault();
    }

    document.querySelector(".lang-select").classList.toggle('active-select');
    
    add_button.classList.remove('focus');
    add_menu.classList.add('hidden');
  } else {
    document.querySelector(".lang-select").classList.remove('active-select');

    add_button.classList.remove('focus');
    add_menu.classList.add('hidden');
  }
}

// chosen list item 

let list = document.querySelectorAll(".aside-menu li:nth-child(1n+2)"),
    selectedItem;

list.forEach((elem) => {

  if (elem.querySelector("a").href == location.href) {
    elem.classList.add('selected-item');
  }
});