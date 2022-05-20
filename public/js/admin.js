let add_button = document.querySelector(".add"),
    add_menu = document.querySelector(".add-menu");

add_button.onclick = toggleAddMenu;

function toggleAddMenu(e)
{
  e.preventDefault();
  add_menu.classList.toggle('hidden');
}