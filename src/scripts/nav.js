//script para mostrar en que pestaña esta el usuario

//leo los botones del nav del usuario (tienen la clase 'navlink')
document.querySelectorAll(".navlink").forEach((link) => {
  //si coincide la url del href del boton del nav con el href actual de la pagina
  if (link.href == window.location.href) {
    //añade el atributo 'aria-current = page' para que el css añada el efecto
    link.setAttribute("aria-current", "page");
  }
});
