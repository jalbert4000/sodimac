<div class="unhappy__registro--mensaje">
  <div class="evento__formulario">
    <div class="row margin-bottom-0">
      <div class="col m2 l2"></div>
      <div class="col s12 m12 l8">
        <div class="uregm--titulo text-center">Envíanos un mensaje</div>
        <div class="uregm__mensaje--detalle">Si no te has podido registrar y si eres nuestro proveedor, te pedimos disculpas.</div>
        <div class="" id='mensaje'></div>
        <div class="evento__formulario--registro">
          <form class="col s12 form__registro--evento" id="frm_registro_contacto" name="frm_registro_contacto" method="post" onsubmit="return validar_contacto(this)">
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
                <input type="submit" class="btn btn-outline-primary btn--registro" value="ENVIAR" type="button">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <a href="<?php echo _url_web_ ?>registro-no-exitoso">
    <p class="uregm__link--return position-absolute"> <i class="tiny material-icons main__icon--direccion">arrow_back</i> Volver</p>
  </a>
</div>