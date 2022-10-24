//script para leer los settings de la cookie 'usersettings' y aplicar los cambios con DOM

//con document cookies leemos todas las cookies de la web
const cookies = document.cookie;

//funcion que recibe el nombre de la cookie y devuelve los valores
//decodeados separados por punto y coma por un split
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

const usersettingsCookie = getCookie("usersettings");
//lo transformamos en json otra vez
const usersettingsCookieJSON = JSON.parse(usersettingsCookie);
//cokie con el username
const usernameSettings = usersettingsCookieJSON["user"];
//cookie del background color del body
const backgroundColor = usersettingsCookieJSON["backgroundcolor"];
//cookie del background color del header
const backgroundColorHeader = usersettingsCookieJSON["backgroundcolorHeader"];

// if (actualuserCookie == usernameSettings) {
//   document.querySelector("body").style.backgroundColor = backgroundColor;
//   document.querySelector("header").style.backgroundColor =
//     backgroundColorHeader;
// }

//cambios en el DOM con los colores que acabamos de leer de las cookies
document.querySelector("body").style.backgroundColor = backgroundColor;
document.querySelector("header").style.backgroundColor = backgroundColorHeader;
// location.reload(false);
