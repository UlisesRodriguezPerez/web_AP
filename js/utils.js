
// Esta función se encarga de mostrar una alerta para eliminar algún elemento.
// Recibe una vocal y un nombre elemento para redacción correcta.
function confirmDelete($vocal,$element){
    var response = confirm("¿Seguro de eliminar est"+$vocal+ " " +$element+ "?");
    return response;
}

