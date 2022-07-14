/*Phone Mask*/
let phoneInput1 = document.querySelector("#popup-phone"),
  phoneInput2 = document.querySelector("#registration-phone")

phoneInput1.onkeyup = function(){this.value = this.value.replace(/[^\d]/g,'')}
phoneInput2.onkeyup = function(){this.value = this.value.replace(/[^\d]/g,'')}
