// add menu toggle


let add_button = document.querySelector(".add"),
add_menu = document.querySelector(".add-menu");

document.onclick = (e) => {
  changeLang(e);
  if (e.target == add_button) {
    add_button.classList.toggle('focus');
    add_menu.classList.toggle('hidden');
  } else {
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


