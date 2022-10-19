const cookies = document.cookie;

// const backgroundcolor = cookie.get("usersettings");
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
const actualuserCookie = getCookie("username");

const usersettingsCookie = getCookie("usersettings");
const usersettingsCookieJSON = JSON.parse(usersettingsCookie);
const usernameSettings = usersettingsCookieJSON["user"];
const backgroundColor = usersettingsCookieJSON["backgroundcolor"];
const backgroundColorHeader = usersettingsCookieJSON["backgroundcolorHeader"];

// if (actualuserCookie == usernameSettings) {
//   document.querySelector("body").style.backgroundColor = backgroundColor;
//   document.querySelector("header").style.backgroundColor =
//     backgroundColorHeader;
// }
document.querySelector("body").style.backgroundColor = backgroundColor;
document.querySelector("header").style.backgroundColor = backgroundColorHeader;
// location.reload(false);
