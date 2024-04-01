<?php

class Secciones{

	

	private $carritoCatalogo;

	

	public function __construct( $carrito = NULL ){

		$this->carritoCatalogo = $carrito;

	}

	

	public function sendNotificarTransferencia($acliente , $aid){			

		

		ob_start();

		$id = $aid;

		$cliente = $acliente;

		include(_tpl_ . 'tplNotificarTransferencia.php');  

		$message = ob_get_contents();			

		ob_end_clean();		

		

		$to = $acliente->__get("_email");

		$toname = $acliente->__get("_usuario");

		

		echo Mail::send(SERVER_EMAIL_USER,'',EMAIL_PEDIDOS,NOMBRE_SITIO,"Notificacion de Transferencia Bancaria",$message);	

		

	}

	

	public function sendRegistroBienvenida( $_aPOST ){

				

		ob_start();

		$_POST = $_aPOST;

		include(_templates_ . 'tpl_registro_bienvenida.php');  

		$message = ob_get_contents();			

		ob_end_clean();

		$to = $_POST['email'];

		$toname = $_POST['nombre']." ".$_POST['apellidos'];


		//if($_POST['tipo_registro']=='1'){
		//	return Mail::send(SERVER_EMAIL_USER,'',$to,$toname,"Registro en ".NOMBRE_SITIO,$message);	
        //}
		return Mail::send(SERVER_EMAIL_USER,'',$to,$toname,"Registro en ".NOMBRE_SITIO,$message);

	}

	

	public function sendMandarContrasenia( $arow ){

		

		ob_start();

		$row = $arow;

		include(_tpl_ . 'tplMandarContrasenia.php');  

		$message = ob_get_contents();			

		ob_end_clean();

		

		$to = $row['email_cliente'];

		$toname = $row['nombre_cliente']." ".$row['apellidos_cliente'];

		

		return Mail::send(SERVER_EMAIL_USER,'',$to,$toname,"Datos de Cuenta - ".NOMBRE_SITIO,$message);			

			

	}

	

	public function sendCancelarOrden($acliente , $aid){

		

		ob_start();

		$id = $aid;

		$cliente = $acliente;

		include(_tpl_ . 'tplCancelarOrden.php');  

		$message = ob_get_contents();			

		ob_end_clean();

		$to = $cliente->__get("_email");

		$toname = $cliente->__get("_usuario");

		echo Mail::send(SERVER_EMAIL_USER,'',$to,$toname,"Cancelación de pedido Nro: ". $id,$message);
		//echo Mail::send(EMAIL_PEDIDOS,'',$to,$toname,"Cancelación de pedido Nro: ". $id,$message);						

		

	}

	

	

	public function sendContactenos(){		

		
		$message = $this->getTemplate($_POST , _tpl_ . 'tplContactenosMail.php');		

		$to = 	EMAIL_CONTACTENOS;

		$toname = "Contactenos - ".NOMBRE_SITIO;		

		echo Mail::send(SERVER_EMAIL_USER,'',$to,$toname,"Contactenos - ".NOMBRE_SITIO,$message);		

				

	}

	

	public function sendPedidoTienda( $pedido , $status = TRUE ){

		

		echo '<div style="display:none;">';

		$message = $this->getTemplate($_POST, _tpl_ . 'tplPedidoTiendaMail.php' , $pedido , $status);	

		$to = EMAIL_PEDIDOS .','.$pedido->getCliente()->__get("_email");
		//$to = 'jparedes@develoweb.net';
		//$to = 'develoweb.dw2@gmail.com';
		//$to = 'develoweb.dw2@gmail.com';aaaa

		$toname = 'Administrador '.NOMBRE_SITIO .', '.$pedido->getCliente()->__get("_usuario");		

		echo Mail::send(SERVER_EMAIL_USER,'Win',$to,$toname,"Gracias por comprar en Win",$message);	
		//echo Mail::send(EMAIL_PEDIDOS,'',$to,$toname,"Gracias por comprar en Win",$message);	

		echo '</div>';

	}

	

	public function sendCompartirEmail( $url_tpl ){

		

		$message = $this->getTemplate($_POST , $url_tpl);	

		$array_emails = explode(',',$_POST['emails_destinatarios']);

		

		if( is_array($array_emails) && count($array_emails)>0 ){

			foreach ( $array_emails as $maildest ):

				$mailto .= $maildest . ',';

				$nameto .= 'para,';

			endforeach;

		}

		else{

			$mailto = $mailto;

			$nameto = 'para';

		}

		

		$mailto=trim(trim($mailto,','));

		$nameto=trim(trim($nameto,','));

		

		echo Mail::send(SERVER_EMAIL_USER,$_POST['tu_nombre'],$mailto,$nameto,$_POST['tu_nombre'] . " quiere que veas este producto en ".NOMBRE_SITIO,$message);

		

	}

	

	public function sendPedido(){	

		

		echo '<div style="display:none;">';

		$message = $this->getTemplate($_POST , _tpl_.'tplPedidoMail.php');

		$to = 	EMAIL_PEDIDOS .','.$_POST['email'];

		$toname = 'Administrador '.NOMBRE_SITIO .', '.$_POST['nombre'];		

		echo Mail::send(SERVER_EMAIL_USER,'',$to,$toname,"Pedido - ".NOMBRE_SITIO,$message);

		$this->carritoCatalogo->reset(TRUE);

		unset($_SESSION['sisdw_catalogo']);

		echo '</div>';

		

	}

	

	public function getTemplate($_post , $name_link_tpl , $opedido = 0, $ostatus = TRUE){

		ob_start();

		$pedido = $opedido; 

		$status = $ostatus;

		include($name_link_tpl);  

		$html = ob_get_contents();	

		ob_end_clean();

		return $html;

	} 


}
?>