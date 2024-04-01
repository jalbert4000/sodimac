<?php
class Ajax{

	private $_idioma;

	public function __construct(Idioma $idioma){
		$this->_idioma = $idioma ;
	}

	public function enviarMailAmigoAjax() {

		$email_cliente = $_POST['email_cliente'];
		$email_amigo = $_POST['email_amigo'];
		$url_pagina = $_GET['url_enviar_amigo'];

		$para = $email_amigo;
		//$para =  "develoweb.dw2@gmail.com";

	  	$subject = "Página recomendada por un amigo";
	    $msg = "

	            El Sr(a). con mail ".$email_cliente." te ha recomendado visitar la sgte página:

	            Datos de la Página:
	            --------------------------------------
	            Dirección: ".$url_pagina."

	            Atte
	            ".NOMBRE_SITIO."

	            Telf. ".TELEFONO."
	            ".EMAIL_PEDIDOS."
	            ".URL_WEB."

	        	";
	   @mail($para,$subject,$msg,"from: ".EMAIL_CONTACTENOS);

  }

	function ordenarCategoriasProductosAjax(){
			foreach($_GET['list_item'] as $position => $item){
				$type_val = explode("|",$item);
				if($type_val[1] == 'categorias'){
					$objc  = new Categoria($type_val[0], $this->_idioma);
					$query = new Consulta("UPDATE  categorias SET orden_categoria = $position
												WHERE id_categoria = $type_val[0] AND id_parent = '".$objc->__get("_parent")."'");
				}else{
					$obju  = new Producto($type_val[0], $this->_idioma);
					$query = new Consulta("UPDATE  productos SET orden_producto = $position
												WHERE id_producto = $type_val[0]
												AND id_categoria = '".$obju->__get("_categoria")->__get("_id")."'");

				}
			}
	}

	function ordenarBannersAjax(){
			foreach($_GET['list_item'] as $position => $item){
				$type_val = explode("|",$item);
				if($type_val[1] == 'banner'){
					$query = new Consulta("UPDATE banners SET orden_banner = $position WHERE id_banner = $type_val[0] ");
				}else{
					//$query = new Consulta("UPDATE banners WHERE tipo_banner=1 SET order_banner = '".$position."' WHERE id_banner = '".$type_val[0]."' ");
				}
			}
	}

	function ordenarInformacionClienteAjax(){
			foreach($_GET['list_item'] as $position => $item){
				$type_val = explode("|",$item);
				//echo 'valor: '.$type_val[0].'-'.$type_val[1];
				if($type_val[1] == 'informaciones'){
					$query = new Consulta("UPDATE informaciones SET orden_informacion = $position WHERE id_informacion = $type_val[0] ");
				}else{
					//$query = new Consulta("UPDATE banners WHERE tipo_banner=1 SET order_banner = '".$position."' WHERE id_banner = '".$type_val[0]."' ");
				}
			}
	}

	function ordenarFormasPagosAjax(){
			foreach($_GET['list_item'] as $position => $item){
				$type_val = explode("|",$item);
				//echo 'valor: '.$type_val[0].'-'.$type_val[1];
				if($type_val[1] == 'formaspagos'){
					$query = new Consulta("UPDATE metodo_pago SET orden_metodo_pago = $position WHERE id_metodo_pago = $type_val[0] ");
				}else{
					//$query = new Consulta("UPDATE banners WHERE tipo_banner=1 SET order_banner = '".$position."' WHERE id_banner = '".$type_val[0]."' ");
				}
			}
	}

	function ordenarWidgetsAjax(){
			foreach($_GET['list_item'] as $position => $item){
				$type_val = explode("|",$item);
				if($type_val[1] == 'widgets'){
					$query = new Consulta("UPDATE widgets SET orden_widget = $position WHERE id_widget = $type_val[0] ");
				}else{
					//$query = new Consulta("UPDATE banners WHERE tipo_banner=1 SET order_banner = '".$position."' WHERE id_banner = '".$type_val[0]."' ");
				}
			}
	}

	function ordenarCatProdAjax__(){
		foreach($_GET['list_item'] as $position => $item){
			$type_val = explode("|",$item);

			if($type_val[1] == 'cat'){
				$objc  = new Categoria($type_val[0], $this->_idioma);
				$query = new Consulta("UPDATE  categorias SET orden_categoria = $position
											WHERE id_categoria = $type_val[0] AND id_parent = '".$objc->__get("_parent")."'");
			}else{
				$obju  = new Producto($type_val[0], $this->_idioma);
				$query = new Consulta("UPDATE  productos SET orden_producto = $position
											WHERE id_producto = $type_val[0]
											AND id_categoria = '".$obju->__get("_categoria")->__get("_id")."'");

			}
		}
	}

	public function autocompleteCategoriasAjax(){
		$obj_cat = new Categorias();
		$data =  $obj_cat->getCategoriaXCriterio($_GET['term']);
		if(count($data) != 0){
			echo encode_json($data);
		}else{
			echo "[ ]";
		}
	}

	public function viewUserAjax()
	{
		if($_GET['id']){
			$obj = new Usuario($_GET['id']);
		?>

       	<ul id="datos_usuario">
       		 <li><label>Nombre:</label> <div class="value_field"><?php echo $obj->getNombre(); ?></div></li>
             <li><label>Apellidos:</label> <div class="value_field"><?php echo $obj->getApellidos(); ?></div></li>
             <li><label>Cargo:</label> <div class="value_field"><?php echo $obj->getRol()->getNombre(); ?></div></li>
             <li><label>Email:</label> <div class="value_field"><?php echo $obj->getEmail(); ?></div></li>
             <li><label>Login:</label> <div class="value_field"><?php echo $obj->getLogin(); ?></div></li>
       	</ul>
		<?php
		}
	}

	public function reportePedidosAjax(){
		$where = '';
		if($_POST['numero'] != ""){
			$q 	   = str_replace($espacio, "(.*)", $_POST['numero']);
			$where = "AND codigos_pedido REGEXP '$q' ";
		}
		$where .= ($_POST['estado'] != "") ? " AND id_estado_pedido = '".$_POST['estado']."'" : "";
		$where .= ($_POST['fechai'] != "") ? " AND fecha_pedido BETWEEN   '".formato_date("/",$_POST['fechai'])."' AND  '".formato_date("/",$_POST['fechaf'])."'" : "";

		$queryp = new Consulta("SELECT * FROM pedidos WHERE id_pedido > 0 ".$where);


		$y = 1;
		if($queryp -> NumeroRegistros() > 0){
                    $costo_total_pedidos = 0;
			while($rowp = $queryp->VerRegistro()){
				$cliente = new ClienteAdmin($rowp['id_cliente']);
				$pedidos = new Pedidos();
				?>
                <tr class="row <?php echo ($y % 2 == 0) ? 'odl' : ''; ?>">
		    <td><img src="<?php echo _icons_."ps.gif"?>" /> <?php echo $rowp['codigos_pedido'] ?></td>
                    <td> <?php echo $cliente->__get("_nombre")." ".$cliente->__get("_apellidos") ?></td>
                    <td align="center"> <?php echo number_format($pedidos->PedidosMonto($rowp['id_pedido']),2);?></td>
                    <td align="center"><?php echo formato_slash('-',$rowp['fecha_pedido'])?>  </td>
                    <td align="center"><?php if($rowp['id_estado_pedido'] == "P"){ echo "<font color='#FF0000'>Pendiente</font>";}else{ echo "<font color='#009900'>Finalizado</font>"; } ?></td>
                    <td align="center"> <a href="pedidos.php?action=edit&id=<?php echo $rowp['id_pedido'] ?>"><img src="<?php echo _icons_."zoom.png" ?>" /></a></td>
		</tr>

				<?php
                $y++;
                $costo_total_pedidos = $costo_total_pedidos + $pedidos->PedidosMonto($rowp['id_pedido']);
			}
                        ?>
                 <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr bgcolor="#CCCCCC">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><b>MONTO TOTAL DE PEDIDOS</b></td>
                    <td style="color:darkblue; font: bold 16px Arial;">S/. <?php echo number_format($costo_total_pedidos,2); ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>

		<?php
                }else{
		?><tr class="fila2"><td colspan="6" align="center" style="color:#D04320;">No se encontrarón registros con estos datos!</td></tr><?php
		}
	}

	public function reporteProductosAjax(){
		$where = '';
		if($_POST['nombre'] != ""){
			$q 	   = str_replace($espacio, "(.*)", $_POST['nombre']);
			$where = "AND nombre_producto REGEXP '$q' ";
		}
		$where .= ($_POST['categorias'] != "") ? " AND id_categoria = '".$_POST['categorias']."'" : "";
		$where .= ($_POST['precio'] != "") ? " AND p.precio_publico ".$_POST['signo']." '".$_POST['precio']."'" : "";

		$queryp = new Consulta("SELECT * FROM productos p, productos_idiomas pi WHERE p.id_producto=pi.id_producto AND p.id_producto > 0 ".$where);

		echo "SELECT * FROM productos p, productos_idiomas pi WHERE p.id_producto=pi.id_producto AND p.id_producto > 0 ".$where;

		$y = 1;
		if($queryp -> NumeroRegistros() > 0){
			while($rowp = $queryp->VerRegistro()){
				$cat = new Categoria($rowp['id_categoria'],$this->_idioma);
				$producto = new Producto($rowp['id_producto'], $this->_idioma);

				?>
				<tr class="row <?php echo ($y % 2 == 0) ? 'odl' : ''; ?>">
					<td><img src="<?php echo _icons_."ps.gif"?>" /> <?php echo $rowp['nombre_producto'] ?></td>
                    <td> <?php echo $cat->__get("_nombre") ?></td>
                    <td align="center"> S/. <?php echo $rowp['precio_publico'] ?> &nbsp;-&nbsp; S/. <?php echo $rowp['precio_privado'] ?> &nbsp;-&nbsp; S/. <?php echo $rowp['precio_extranjero'] ?></td>
				</tr>

				<?php
                $y++;
			}
		}else{
		?><tr class="fila2"><td colspan="6" align="center" style="color:#D04320;">No se encontrarón registros con estos datos!</td></tr><?php
		}
	}


	function addRelacionAjax(){

		$query = new Consulta("INSERT INTO productos_relacionados
											VALUES('".$_POST['id_p']."','".$_POST['id']."')");

		$query = new Consulta("INSERT INTO productos_relacionados
											VALUES('".$_POST['id']."','".$_POST['id_p']."')");
	}

	function delRelacionAjax(){


		$query = new Consulta("DELETE FROM productos_relacionados WHERE id_producto = '".$_POST['id_p']."'
											AND id_producto_relacionado = '".$_POST['id']."'");

		$query = new Consulta("DELETE FROM productos_relacionados WHERE id_producto = '".$_POST['id']."'
											AND id_producto_relacionado = '".$_POST['id_p']."'");

	}

}

?>
