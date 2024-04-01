<div class="homeADE position-relative">
  <div class="hade__objetivo rubik-dirt-regular">
    <p class="hade__objetivo--primario">SIGAMOS CONSTRUYENDO</p>
    <p class="hade__objetivo--secundario">UN PAÍS</p>
    <p class="hade__objetivo--secundario">JUNTOS</p>
  </div>
  <div class="hade__objetivo--proveedores">EVENTO DE PROVEEDORES 2024</div>
  <div class="hade__fecha"> 
    <button class="btn btn-outline-primary main__btn--fecha" type="button">16 <span>DE   </span>NOV</button>
    <p class="hade__hora">9:00 AM</p>
  </div>
  <div class="hade__registro--link">REGÍSTRATE AQUÍ</div><i class="material-icons hade__icon--expand">expand_more</i>
    <a href="<?php echo _url_web_ ?>sesion">
      <button class="btn btn-outline-primary main__btn--sesion position-absolute" type="button">INICIAR SESIÓN</button>
    </a>
    <img class="main__img--top position-absolute" src="https://images.ctfassets.net/efpn4u8cnuye/3NTj78d0I7X4GG5pxHT2A7/3c5496da130fbf97514c06ff43f047c5/head_up.png">
    <img class="main__img--button position-absolute" src="https://images.ctfassets.net/efpn4u8cnuye/3SkUFxzkVlITysNCt8HKgy/acd02a9fd21a0176b64861344d296b3e/head_dowm.png">
</div>
<div class="evento__formulario">
  <div class="row margin-bottom-0">
    <div class="col m2 l2"></div>
    <div class="col s12 m12 l8">
      <div class="evento__formulario--titulo">Únete a nuestro evento virtual</div>
      <div class="evento__formulario--detalle">¡Asiste desde cualquier parte!</div>
      <div class="" id='mensaje'></div>
      <div class="evento__formulario--registro">
        <form class="col s12 form__registro--evento" id="frm_registro" name="frm_registro" method="post" onsubmit="return validar_datos_cliente(this)">
          <div class="row">
            <div class="input-field col s12 m12 l6">
              <input class="input__card--color validate" id="nombre" name="nombre" type="text" onkeypress="return validarTexto(event)">
              <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col s12 m12 l6">
              <input class="input__card--color validate" id="celular" name="celular" type="text" onkeypress="return validarTelefono(event)">
              <label for="celular">Celular</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m12 l6">
              <input class="input__card--color validate" id="apellidos" name="apellidos" type="text" onkeypress="return validarTexto(event)">
              <label for="apellidos">Apellidos</label>
            </div>
            <div class="input-field col s12 m12 l6">
              <input class="input__card--color validate" id="empresa" name="empresa" type="text" onkeypress="return validarTexto(event)">
              <label for="empresa">Nombre de tu empresa</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m12 l6">
              <input class="input__card--color validate" id="email" name="email" type="text" onkeypress="return validarCorreo(event)">
              <label for="email">Correo electrónico</label>
            </div>
            <div class="input-field col s12 m12 l6">
              <input type="submit" class="btn btn-outline-primary evento__btn--registro" value="REGISTRARME" type="button">
            </div>
          </div>
        </form>
      </div>
      <div class="evento__formulario--gracias">Gracias por registrarte</div>
    </div>
    <div class="col m2 l2"></div>
  </div>
</div>