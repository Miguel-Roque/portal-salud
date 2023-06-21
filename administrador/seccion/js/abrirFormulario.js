let formulario = document.querySelector(".formulario");
let formulario2 = document.querySelector(".formulario2");
let formulario3 = document.querySelector(".modal-acetar");
function openFormulario() {
    formulario.classList.add("formulario__open")
}
function closeFormulario() {
    formulario.classList.remove("formulario__open")
}
function openFormularioLimpio() {
    formulario2.classList.add("formulario__open")
}
function closeFormulario2() {
    formulario2.classList.remove("formulario__open")
}
function openFormulario3() {
    formulario3.classList.add("modal-acetar2")
}
function closeFormulario3() {
    formulario3.classList.remove("modal-acetar2")
}

let formularioPlatillo = document.querySelector(".Modal-platillo");
function openFormulario4() {
    formularioPlatillo.classList.add("Modal-platillo_open")
}
function closeFormulario4() {
    formularioPlatillo.classList.remove("Modal-platillo_open")
}