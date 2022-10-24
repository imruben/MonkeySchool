//script para abrir y cerrar los modals de login y register con los dos botones del home
//forzamos a definir tipos
"use strict";

const loginmodal = document.querySelector(".loginmodal");
const btnloginmodal = document.querySelector("#loginbutton");
const overlay = document.querySelector(".overlay");

const registeremodal = document.querySelector(".registermodal");
const btnregistermodal = document.querySelector("#registerbutton");
// const btnCloseModal = document.querySelector(".close-modal");

// console.log(loginmodal);
// console.log(btnloginmodal);
// console.log(overlay);

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

btnloginmodal.addEventListener("click", openModalLogin);
btnregistermodal.addEventListener("click", openModalRegister);

// btnloginmodal.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

document.addEventListener("keydown", function (e) {
  // console.log(e.key);

  if (
    e.key === "Escape" &&
    (!loginmodal.classList.contains("hidden") ||
      !registeremodal.classList.contains("hidden"))
  ) {
    closeModal();
  }
});
