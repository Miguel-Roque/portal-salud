function sidedarOpen() {
  let openRow = document.querySelector(".sidebar");
  let backg = document.querySelector(".home-section");
  openRow.classList.add("sidebar-open");
  backg.classList.add("home-section-open");
}
function sidedarclose() {
  let openRow = document.querySelector(".sidebar");
  let backg = document.querySelector(".home-section");
  openRow.classList.remove("sidebar-open");
  backg.classList.remove("home-section-open");
}

function submenuOpen0() {
  let openRow = document.querySelector(".sb0");
  let openARow = document.querySelector(".saw0");
  openRow.classList.toggle("activeSubMenu");
  openARow.classList.toggle("active-arrow");
}
function submenuOpen1() {
  let openRow = document.querySelector(".sb1");
  let openARow = document.querySelector(".saw1");
  openRow.classList.toggle("activeSubMenu");
  openARow.classList.toggle("active-arrow");
}
function submenuOpen2() {
  let openRow = document.querySelector(".sb2");
  let openARow = document.querySelector(".saw2");
  openRow.classList.toggle("activeSubMenu");
  openARow.classList.toggle("active-arrow");
}
function submenuOpen3() {
  let openRow = document.querySelector(".sb3");
  let openARow = document.querySelector(".saw3");
  openRow.classList.toggle("activeSubMenu");
  openARow.classList.toggle("active-arrow");
}
function submenuOpen4() {
  let openRow = document.querySelector(".sb4");
  let openARow = document.querySelector(".saw4");
  openRow.classList.toggle("activeSubMenu");
  openARow.classList.toggle("active-arrow");
}
function submenuOpen5() {
  let openRow = document.querySelector(".sb5");
  let openARow = document.querySelector(".saw5");
  openRow.classList.toggle("activeSubMenu");
  openARow.classList.toggle("active-arrow");
}