const navToggle = document.querySelector(".nav-toggle")
const navMenu = document.querySelector(".nav-menu")
const asignarDocenteSeleccionado = document.getElementById("profesorId")

navToggle.addEventListener("click",btnBars);
// asignarDocenteSeleccionado.addEventListener()

// Se encarga de mostrar el menu u ocultarlo cuando está en dispositivos media.
function btnBars(){
    navMenu.classList.toggle("nav-menu_visible");
}

// var select = document.querySelector("profesorId");

asignarDocenteSeleccionado.addEventListener('change', capturarValor);

function capturarValor(){
    var idDcente = asignarDocenteSeleccionado.value;
    var cursoId = "37";
    // console.log(idDcente);
    var href = "<a href=\"/docente/asignar?id="+idDcente+"&idCurso="+cursoId+"\""+"class=\"btn\">Asignar</a>";
    // <a href=\"?accion=eliminar&id=" + dr["NumeroDocumento"].ToString() + "\">Eliminar</a>
    // /docente/asignar?id="+"javascript:capturarValor()"+"?>&idCurso=<?php echo $cursoId?>
    console.log(href);
    return href;
}


