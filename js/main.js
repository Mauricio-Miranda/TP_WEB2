
let btn_filtrar = document.querySelector("#btn-filtrar");

let lista = document.querySelector(".lista");

btn_filtrar.addEventListener('click', () => mostrarLista(lista));


function mostrarLista(lista){
    lista.classList.toggle("showLista");
}