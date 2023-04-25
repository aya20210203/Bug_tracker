// phone media queries

let menu = document.getElementById("menu");
let nav = document.querySelector("header nav");

menu.onclick = function (){
    if (nav.style.display === "flex")
        nav.style.display = "none";
    else
        nav.style.display = "flex";
};
