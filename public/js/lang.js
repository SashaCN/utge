let change_lang = document.querySelector(".lang-select");

document.onclick = (e) => {
  if(e.target == change_lang || change_lang.contains(e.target)) {
    if (!document.querySelector(".lang-select").classList.contains('active-select')) {
      e.preventDefault();
    } else if (e.target == document.querySelector(".selected-lang") || document.querySelector(".selected-lang").contains(e.target)) {
      e.preventDefault();
    }

    document.querySelector(".lang-select").classList.toggle('active-select');
  } else {
    document.querySelector(".lang-select").classList.remove('active-select');
  }
}
