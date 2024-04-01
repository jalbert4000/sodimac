<table width="800"  border="0" bordercolor="#CCCCCC" align="center" cellpadding="5" cellspacing="0"  style="border-collapse:collapse;  font-family:Arial; font-size:12px; color:#4E4E4E; border:1px solid #c1c1c1; border-bottom:none;">
  <tr>
    <td width="122" align="left" style="border:none;"><a href="<?php echo _url_web_?>"><img src="<?//php echo _logo_?>"/></a></td>
    <td width="470" align="right" style="border:none;">&nbsp;</td>
    <td width="176" align="right" style="border:none;" valign="top"><img src="<?//php echo _url_web_._imgs_.'icon_telefono_contacto.png'?>" style="margin-right:10px;"/><span style="font-size:20px; font-weight:bold;"><?//php echo TELEFONOS?></span></td>
  </tr>
  <tr>
    <td colspan="3" valign="top" style="border:none;">BIENVENIDO A <?php echo NOMBRE_SITIO;?><br><br>
      Estimado(a) <?php echo $_POST['nombre']?> <?php echo $_POST['apellidos']?> su cuenta a sido creada:<br><br>
      Tu Cuenta<br>
      -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br>
      Usuario: <?php echo $_POST['email']?> <br>
      Empresa: <?php echo $_POST['empresa']?><br><br>
      Con estos datos de acceso podras ingresar a los servicios como nuestros productos, Boletines, Ofertas de <?php echo NOMBRE_SITIO;?></td>
  </tr>
  <tr>
    <td colspan="3" valign="top" style="border:none;">&nbsp;</td>
  </tr>
</table>
<table width="800" border="0" bordercolor="#CCCCCC" align="center" cellpadding="5" cellspacing="0" style="border-collapse:collapse; font-family:Arial; font-size:12px; color:#4E4E4E; border:1px solid #c1c1c1;" >
  <tfoot>
    <tr>
      <td width="750" align="right" style="border:none;"><br/>
        <?//php echo (TELEFONOS!='')? 'Teléfonos : '.TELEFONOS.'<br/>':''; ?>
        <?php echo (_url_web_!='')? _url_web_.'<br/>':''; ?>
        <?php echo (NOMBRE_SITIO!='')? NOMBRE_SITIO:''; ?>
      </td>
    </tr>
    </tfoot>
</table>