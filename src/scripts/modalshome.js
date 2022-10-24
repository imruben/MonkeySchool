//script para abrir y cerrar los modals de login y register con los dos botones del home

"use strict";

const loginmodal = document.querySelector(".loginmodal");
const btnloginmodal = document.querySelector("#loginbutton");
const overlay = document.querySelector(".overlay");

const registeremodal = document.querySelector(".registermodal");
const btnregistermodal = document.querySelector("#registerbutton");

//funciones para abrir y cerrar el modal
//->añaden o quitan la clase 'hidden' de css
const openModalLogin = function () {
  loginmodal.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const openModalRegister = function () {
  registeremodal.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const closeModal = function () {
  loginmodal.classList.add("hidden");
  registeremodal.classList.add("hidden");
  overlay.classList.add("hidden");
};

//añade las funciones a los botones con eventlisteners
btnloginmodal.addEventListener("click", openModalLogin);
btnregistermodal.addEventListener("click", openModalRegister);

overlay.addEventListener("click", closeModal);

//con escape tambien se puede salir del modal a parte de clickando fuera
document.addEventListener("keydown", function (e) {
  if (
    e.key === "Escape" &&
    (!loginmodal.classList.contains("hidden") ||
      !registeremodal.classList.contains("hidden"))
  ) {
    closeModal();
  }
});
