function validar_datos_cliente(form) {

    var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    var nombre = form.nombre.value;
    var apellidos = form.apellidos.value;
    var celular = form.celular.value;
    var email = form.email.value;
    var empresa = form.empresa.value;

    if (nombre == "") {
        document.getElementById("nombre").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su Nombre.';
        return false;
    }
    if (celular == "") {
        document.getElementById("celular").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su Celular.';
        return false;
    }
    if (apellidos == "") {
        document.getElementById("apellidos").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su Apellido.';
        return false;
    }
    if (empresa == "") {
        document.getElementById("empresa").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su empresa.';
        return false;
    }
    if (email == "") {
        document.getElementById("email").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su Correo Electrónico.';
        return false;
    }

    form.action = 'index.php?seccion=proveedor';
    form.submit();
    
}

function validar_email(form) {

    var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    var email = form.email.value;

    if (email == "") {
        console.log('registro_correo', 'Usted debe ingresar su Email.');
        return false;
    }
    if (!email.match(emailRegex)) {
        console.log('registro_correo', '<strong>Error</strong><br />Ha introducido una direcci&oacute;n de correo electr&oacute;nico no v&aacute;lida.', 1);
        return false;
    }

    form.action = 'index.php?seccion=validar-sesion';
    form.submit();
    
}

function validar_contacto(form) {

    var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    var nombre = form.nombre.value;
    var apellidos = form.apellidos.value;
    var celular = form.celular.value;
    var email = form.email.value;
    var empresa = form.empresa.value;

    if (nombre == "") {
        document.getElementById("nombre").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su Nombre.';
        return false;
    }
    if (celular == "") {
        document.getElementById("celular").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su Celular.';
        return false;
    }
    if (apellidos == "") {
        document.getElementById("apellidos").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su Apellido.';
        return false;
    }
    if (empresa == "") {
        document.getElementById("empresa").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su empresa.';
        return false;
    }
    if (email == "") {
        document.getElementById("email").focus();
        const mensaje = document.getElementById("mensaje");
        mensaje.classList.add ('alert','alert-danger')
        document.getElementById("mensaje").innerHTML = 'Usted debe ingresar su Correo Electrónico.';
        return false;
    }

    form.action = 'index.php?seccion=validar-contactanos';
    form.submit();
    
}

// INICIO VALIDAR EL INGRESO DE TECLADO (onkeypress="return validarTexto(event)")


        //NUMERO CELULAR - TELEFONO (DEL 0 AL 9 Y CON PARENTESIS Y -)
        function validarTelefono(e) { // 1
            tecla = (document.all) ? e.keyCode : e.which; // 2
            if (tecla==8) return true; // 3
            patron =/[0-9()-\s]/;
            te = String.fromCharCode(tecla); // 5
            return patron.test(te); // 6
        }

        //TEXTO (MINUSCULAS - MAYUSCULAS - TILDES - CARACTERES ñ y Ñ)
        function validarTexto(e) { // 1
            tecla = (document.all) ? e.keyCode : e.which; // 2
            if (tecla==8) return true; // 3
            patron =/[A-Za-zÀ-ÿñÑ\s]/;//patron =/[A-Za-z\s]/;
            te = String.fromCharCode(tecla); // 5
            return patron.test(te); // 6
        }

        //NUMERO CORREO
        function validarCorreo(e) { // 1
            tecla = (document.all) ? e.keyCode : e.which; // 2
            if (tecla==8) return true; // 3
            patron =/[A-Za-zñÑ0-9@-_.-\s]/;//patron =/[A-Za-z]+@[a-z]+\.[a-z]+/;
            te = String.fromCharCode(tecla); // 5
            return patron.test(te); // 6
        }

        //NUMERO PASSWORD (MINUSCULAS - MAYUSCULAS - TILDES - CARACTERES ñ,Ñ,etc - DEL 0 AL 9)
        function validarPassword(e) { // 1
            tecla = (document.all) ? e.keyCode : e.which; // 2
            if (tecla==8) return true; // 3
            patron =/[A-Za-zÀ-ÿñÑ0-9.,:!%&/=¡{}*?#+<$>&(_)-\s]/;//patron =/[A-Za-z\s]/;
            te = String.fromCharCode(tecla); // 5
            return patron.test(te); // 6
        }