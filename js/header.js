const navToggle = document.querySelector(".nav-toggle")
const navMenu = document.querySelector(".nav-menu")

navToggle.addEventListener("click",btnBars);

// Se encarga de mostrar el menu u ocultarlo cuando está en dispositivos media.
function btnBars(){
    navMenu.classList.toggle("nav-menu_visible");
}




