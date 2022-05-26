let add_button = document.querySelector(".add"),
    add_menu = document.querySelector(".add-menu");

document.onclick = (e) => {
  console.log(e.target);
  add_button = document.querySelector(".add"),
  add_menu = document.querySelector(".add-menu");
  if (e.target == add_button) {
    console.log("+");
    e.preventDefault();
    
    add_button.classList.toggle('focus');
    add_menu.classList.toggle('hidden');
  } else {
    console.log("-");
    add_button.classList.remove('focus');
    add_menu.classList.add('hidden');

  }
}