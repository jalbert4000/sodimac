<div class="container background-seccion">

  <section class="container_pedido py-5">

    <?//php include('includes/inc.navegacion_pedido.php'); ?>
    <div class="row mb-40 no-row">
      <div class="col-xl-10">
        <div class="checkout-steps">
          <a class="active cursor-default">
            3. Confirmar Pedido</span>
          </a>
          <a class="cursor-default">
            <span class="angle"></span>
            <span class="steps-d">2. Datos de Pago</span>
            <span class="steps-m">2</span>
          </a>
          <a class="cursor-default">
            <span class="angle"></span>
            <span class="steps-d">1. Datos de entrega</span>
            <span class="steps-m">1</span>
          </a>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2">
      <div class="col form-group">
        <h3 class="pedido-titulo">Detalle de Pedido:</h3>
        <p class="pedido-descripcion mb-30">Revisa tu pedido antes de efectuar la compra. Los Gastos de Envío han sido calculados en base a tus Datos de Envío.</p>

        <div class="pedido-productos-confirmacion row no-row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 position-relative py-2">
          <div class="col">
            <img class="img-responsive carrito-card-items--imagen" src="<?php echo _img_productos_ ?>producto_carrito_1.jpg">
            <div class="pedido-productos-confirmacion--detalle">
              <span class="px-2"><b>Precio Unitario:</b> S/ 45.00</span>
              <span class="px-2"><b>Peso:</b> 7kg</span>
            </div>
          </div>
          <div class="col pedido-productos-confirmacion--detalle">
            <p><span>S/ 45.00</span></p>
          </div>
        </div>
        <div class="pedido-productos-confirmacion row no-row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 position-relative py-2">
          <div class="col">
            <img class="img-responsive carrito-card-items--imagen" src="<?php echo _img_productos_ ?>producto_carrito_1.jpg">
            <div class="pedido-productos-confirmacion--detalle">
              <span class="px-2"><b>Precio Unitario:</b> S/ 45.00</span>
              <span class="px-2"><b>Peso:</b> 7kg</span>
            </div>
          </div>
          <div class="col pedido-productos-confirmacion--detalle">
            <p><span>S/ 45.00</span></p>
          </div>
        </div>
        <div class="productos-confirmacion--precio py-4 row-less-margin">
          <p class="text-right"><span class=""><b>Subtotal:</b></span><span class="margin-left-70 width-80 display-inline-block">S/ 246.80</span></p>
          <p class="text-right"><span class=""><b>Descuento:</b></span><span class="margin-left-70 width-80 display-inline-block">S/ 0.00</span></p>
          <p class="text-right"><span class=""><b>Costo de Envio:</b></span><span class="margin-left-70 width-80 display-inline-block">S/ 17.40</span></p>
          <p class="text-right py-3 position-relative productos-confirmacion--total"><span class=""><b>TOTAL:</b></span><span class="margin-left-70 width-80 display-inline-block">S/ 143.00</span></p>
        </div>

      </div>
      <div class="col form-group">
        <h3 class="pedido-titulo">Datos de Entrega:</h3>
        <div class="mb-30">
          <p class="pedido-descripcion position-relative mb-20 padding-bottom-5"><span class="barra-bottom">Datos del Destinatario:</span></p>
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">
            <div class="col">
              <label class="sub-titulo-pedido">Nombres:</label>
              <span class="sub-descripcion-pedido">Jose</span>
            </div>
            <div class="col">
              <label class="sub-titulo-pedido">Distrito:</label>
              <span class="sub-descripcion-pedido">Lima</span>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">
            <div class="col">
              <label class="sub-titulo-pedido">Apellidos:</label>
              <span class="sub-descripcion-pedido">Perez</span>
            </div>
            <div class="col">
              <label class="sub-titulo-pedido">Dirección:</label>
              <span class="sub-descripcion-pedido">Lima</span>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">
            <div class="col">
              <label class="sub-titulo-pedido">Teléfono:</label>
              <span class="sub-descripcion-pedido">965486255</span>
            </div>
            <div class="col">
              <label class="sub-titulo-pedido">Referencia:</label>
              <span class="sub-descripcion-pedido">Villa el Salvador</span>
            </div>
          </div>
        </div>
        <div class="pago-pedido-card row no-row py-4">
          <div class="col-md-4 col-lg-4 text-center align-self-center">
            <img src="<?php echo _img_pagos_ ?>pago_bcp.png" />
          </div>
          <div class="col col-md-8 col-lg-8">
            <div class="pago-pedido-card-descripcion">
              <p>BANCO DE CREDITO DEL PERU O AGENTE DEL BCP</p>
              <P>Cta. Cte. en soles: xxx xxxxxx xxx</P>
              <P>Titular: Global</P>
              <P>Se debe enviar la constancia de depósito al correo de ventas global@gmail.com</P>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center margin-top-20">
      <a href="<?php echo _url_web_ ?>pagos">
        <span class="px-2"><i class="fa fa-angle-double-left px-1" aria-hidden="true"></i> REGRESAR</span>
      </a>
      <a href="<?php echo _url_web_ ?>pedido-realizado">
        <button class="btn-circle-full-standard" type="submit">CONTINUAR <span class="px-2"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span> </button>
      </a>
    </div>

  </section>

</div>
