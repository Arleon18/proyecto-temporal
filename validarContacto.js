function validarContacto() {

    const nombre = document.getElementById('nombre').value;
    const telefono = document.getElementById('tel').value;

    //Validacion de nombre (solamente caracteres)
    const nombreRegex = /^[a-zA-Z\s]+$/;
    if(!nombreRegex.test(nombre)){
        alert("El nombre únicamente puede contener letras");
        return false;
    }
    
    //Validacion de telefono (10 digitos)
    const telefonoRegex = /^\d{10}$/;
    if(!telefonoRegex.test(telefono)) {
        alert("El teléfono debe tener 10 dígitos.");
        return false;
    }
    
    //Si todos los datos son correctos
    return alert('¿Enviar datos de contacto?');
}
