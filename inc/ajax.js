const formularios_ajax=document.querySelectorAll(".FormularioAjax");

// Función para verificar cambios en la base de datos
function verificarCambios() {
    fetch('ruta/a/tu/api') // Cambia esto a la ruta de tu API
        .then(respuesta => respuesta.json())
        .then(data => {
            let contenedor=document.querySelector(".form-rest");
            // Aquí puedes comparar los datos y actualizar el contenedor si hay cambios
            contenedor.innerHTML = data.nuevaContenido; // Asegúrate de que 'nuevaContenido' sea el campo correcto
        });
}

// Llama a verificarCambios cada 5 segundos
setInterval(verificarCambios, 5000);

function enviar_formulario_ajax(e){
    e.preventDefault();

    let enviar=confirm("¿Desea enviar el formulario?");

    if(enviar==true){
        let data= new FormData(this);
        let method=this.getAttribute("method");
        let action=this.getAttribute("action");

        let encabezados= new Headers();

        let config={
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };

        fetch(action,config)
        .then(respuesta => respuesta.text())
        .then(respuesta =>{ 
            let contenedor=document.querySelector(".form-rest");
            contenedor.innerHTML = respuesta;
        });
    }
}

formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit",enviar_formulario_ajax);
});