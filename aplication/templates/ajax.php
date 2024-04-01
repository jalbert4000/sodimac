<?php
include("inc.aplication_top.php");
if (isset( $_POST['seccion'] ) && isset( $_POST['action'] )){
	switch ( $_POST['seccion'] ){
		case 'cesta':
			switch ( $_POST['action'] ){
				case 'delete':
					if ( class_exists ( 'Cliente' ) && class_exists ( 'Pedido' ) ){
						for ( $i=0 ; $i < sizeof($_POST['delete_producto']); $i++ )
							$cuenta->getCliente()->getCarrito()->DeleteProducto($_POST['delete_producto'][$i]);
					}
					else{
						for ( $i=0 ; $i < sizeof($_POST['delete_producto']); $i++ )
							$carritoCatalogo->DeleteProducto($_POST['delete_producto'][$i]);
					}
				break;
				case 'update':
					if ( class_exists ( 'Cliente' ) && class_exists ( 'Pedido' ) ){
						for ( $i=0 ; $i < sizeof($_POST['cantidad']); $i++ ) {
						   $textura = $_POST['textura'][$i] >0 ? $_POST['textura'][$i] : 0;
						   $cantidad = $_POST['cantidad'][$i] ;
						   $opciones=($_POST['opciones'][$_POST['id_producto'][$i]])? $_POST['opciones'][$_POST['id_producto'][$i]]:'';
						   $cuenta->getCliente()->getCarrito()->AddProducto($_POST['id_producto'][$i],  $opciones, $textura, $cantidad);

						   //$opciones=($_POST['opciones'][$_POST['id_producto'][$i]])? $_POST['opciones'][$_POST['id_producto'][$i]]:'';
						   //$textura = $_POST['textura'][$i] >0 ? $_POST['textura'][$i] : 0;
						   //$cuenta->getCliente()->getCarrito()->AddProducto($_POST['id_producto'][$i], $opciones, $textura, $_POST['cantidad'][$i] );
						}
					}else{
						//for ( $i=0 ; $i < sizeof($_POST['cantidad']); $i++ ) {
							//$opciones=($_POST['opciones'][$_POST['id_producto'][$i]])? $_POST['opciones'][$_POST['id_producto'][$i]]:'';
							//$textura = $_POST['textura'][$i] >0 ? $_POST['textura'][$i] : 0;
							//$carritoCatalogo->AddProducto($_POST['id_producto'][$i], $opciones, $textura, $_POST['cantidad'][$i] );
						//}
					}
				break;
			}
		break;
		case 'actualizar_estado':
			switch ( $_POST['action'] ){
				case 'actualizarEstadoVisa':
					$action = $_POST['action'];
					$cuenta->$action($_POST['id_pedido']);
				break;
			}
		break;
		case 'contactenos':
			$secciones = new Secciones();
			switch ( $_POST['action'] ){
				case 'send':
					$secciones->sendContactenos();
				break;
			}
		break;
		case 'pedido':
			$secciones = new Secciones( $carritoCatalogo );
			switch ( $_POST['action'] ){
				case 'send':
					$secciones->sendPedido();
				break;
			}
		case 'cupon':
			$cupones = new Cupones();
			switch ( $_POST['action'] ){
				case 'validar':
					$cupones->validarCupon($_POST['codigo']);
				break;
			}
		break;
		case 'ubigeo':
			$ubigeo = new Ubigeos();
			$accion = 'get'.$_POST['action'];
			echo json_encode($ubigeo->$accion( $_POST['id'] ));
		break;
		case 'cuenta':
			$action = $_POST['action'];
			$cuenta->$action( $_POST['idp'] );
		break;
		case 'boletin':
			$obj = new Boletines();
			$accion = $_POST['action']."Ajax";
			$obj->$accion();
		break;
	}
}
if($_GET['action']){
	$obj = new Cuenta;
	$accion = $_GET['action'];
	$obj->$accion();
}
include("inc.aplication_bottom.php");
?>
