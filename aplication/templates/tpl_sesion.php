<div class="main__container position-relative">
    <div class="main__sesion lato">
        <p class="main__sesion--titulo">INICIA SESIÓN</p>
    </div>
    <div class="main__sesion--descripcion"> 
        <p>para unirte a nuestro</p>
        <p>evento virtual</p>
    </div>
    <form class="form__sesion col s12" id="frm_sesion" name="frm_sesion" method="post" onsubmit="return validar_email(this)">
        <div class="row">
          <div class="input-field col s12">
            <input class="form__sesion--input input__card--color validate" id="email" name="email" type="text" onkeypress="return validarCorreo(event)">
            <label for="email">Correo electrónico</label>
          </div>
          <div class="form__sesion--button col s12">
            <input type="submit" class="btn btn-outline-primary btn--continuar" value="CONTINUAR" type="button">
          </div>
        </div>
    </form>
    <div class="sesion__link--registro">
        <p>¿Aún no te has registrado? <span class="sesion__link--informacion"><a class="position-relative" href="<?php echo _url_web_ ?>">Hazlo aquí</a></span></p>
    </div>
    <a href="<?php echo _url_web_ ?>">
        <p class="main__link--return position-absolute"> <i class="tiny material-icons main__icon--direccion">arrow_back</i> Volver</p>
    </a>
    <img class="main__img--top position-absolute" src="https://images.ctfassets.net/efpn4u8cnuye/3NTj78d0I7X4GG5pxHT2A7/3c5496da130fbf97514c06ff43f047c5/head_up.png">
    <img class="main__img--button position-absolute" src="https://images.ctfassets.net/efpn4u8cnuye/3SkUFxzkVlITysNCt8HKgy/acd02a9fd21a0176b64861344d296b3e/head_dowm.png">
</div>