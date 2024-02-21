const prev = document.querySelector('.cont_boton_prev');
const next = document.querySelector('.cont_boton_next');
const slider = document.querySelector('.contenedor_secciones_videos');

prev.addEventListener('click', () => {
    slider.scrollLeft -= 300;
})

next.addEventListener('click', () => {
    slider.scrollLeft += 300;
})

console.log("Hola")