<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cupones
 *
 * @author deweloweb3
 */
class Proveedores {

    private $_msgbox;

    public function __construct($msg = '') {
        $this->_msgbox = $msg;
    }

    public function addProveedor() {

        $fecha_actual = $_SESSION['fecha_actual'];
        $fechaLimite = $_SESSION['fechaLimite'];
        
        $link = mysqli_connect('localhost', 'root','root', 'sodimac') or die(mysql_error() ."error al conectarse al servidor");

        $email = $_POST['email'];
        $sql = "SELECT * FROM proveedores WHERE email = '" . $email . "' AND estado=1";

        $result = mysqli_query($link, $sql);
        $row = $result->fetch_object();
        $id = $row->id;
        
        if ($id > 0) {

            $sqlEvento = "SELECT * FROM proveedores_evento WHERE email = '" . $email . "' AND estado=1";
            $resultEvento = mysqli_query($link, $sqlEvento);
            $rowEvento = $resultEvento->fetch_object();
            $id_proveedor = $rowEvento->id_proveedor;

            if ($id_proveedor > 0) {

            }else{

                $sqlInsert = "INSERT INTO proveedores_evento VALUES(NULL,
                                                    '".$id."',
                                                    '".$_POST['nombre']."',
                                                    '".$_POST['apellidos']."',
                                                    '".$_POST['celular']."',
                                                    '".$_POST['empresa']."',
                                                    '".$_POST['email']."',
                                                    '" . date('Y-m-d') . "',
                                                    '1'
                                                    )";
                $resultInsert = mysqli_query($link, $sqlInsert);

            }

            $seccion = new Secciones();
            $seccion->sendRegistroBienvenida($_POST);         
            //if($seccion->sendRegistroBienvenida($_POST)){
                //$this->setNotificacion("BIENVENIDO A ".NOMBRE_SITIO,2);
            //}
            //die();
            if ($fecha_actual < $fechaLimite) {
                location("registro-exitoso");
            }else{
                location("registro-exitoso-de");
            }
            
        }else{

            location("registro-no-exitoso");
        }

    }

    public function addProveedor_original() {

        $fecha_actual = $_SESSION['fecha_actual'];
        $fechaLimite = $_SESSION['fechaLimite'];
        
        $link = mysqli_connect('localhost', 'root','root', 'sodimac') or die(mysql_error() ."error al conectarse al servidor");

        $email = $_POST['email'];
        $sql = "SELECT * FROM proveedores WHERE email = '" . $email . "' AND estado=1";

        $result = mysqli_query($link, $sql);
        $row = $result->fetch_object();
        $id = $row->id;
        
        if ($id > 0) {

            $sqlInsert = "INSERT INTO proveedores_evento VALUES(NULL,
                                                '".$id."',
                                                '".$_POST['nombre']."',
                                                '".$_POST['apellidos']."',
                                                '".$_POST['celular']."',
                                                '".$_POST['empresa']."',
                                                '".$_POST['email']."',
                                                '" . date('Y-m-d') . "',
                                                '1'
                                                )";
            $resultInsert = mysqli_query($link, $sqlInsert);

            $seccion = new Secciones();
            $seccion->sendRegistroBienvenida($_POST);         
            //if($seccion->sendRegistroBienvenida($_POST)){
                //$this->setNotificacion("BIENVENIDO A ".NOMBRE_SITIO,2);
            //}
            die();
            if ($fecha_actual < $fechaLimite) {
                location("registro-exitoso");
            }else{
                location("registro-exitoso-de");
            }
            
        }else{

            location("registro-no-exitoso");
        }

    }

    public function validarProveedor(){

        $fecha_actual = $_SESSION['fecha_actual'];
        $fechaLimite = $_SESSION['fechaLimite'];

        $link = mysqli_connect('localhost', 'root','root', 'sodimac') or die(mysql_error() ."error al conectarse al servidor");

        $email = $_POST['email'];
        $sql = "SELECT * FROM proveedores_evento WHERE email = '" . $email . "' AND estado=1";
        $result = mysqli_query($link, $sql);
        if ($result->fetch_object() > 0) {

            if ($fecha_actual < $fechaLimite) {
                location("evento-conteo");
            }else{
                location("registro-exitoso-de");
            }

        }else{

            location("/tiendaGlobal");
        }

    }

    public function validarContactanos(){

        $link = mysqli_connect('localhost', 'root','root', 'sodimac') or die(mysql_error() ."error al conectarse al servidor");

        $sqlInsert = "INSERT INTO contactos VALUES(NULL,
                                                '".$_POST['nombre']."',
                                                '".$_POST['apellidos']."',
                                                '".$_POST['celular']."',
                                                '".$_POST['empresa']."',
                                                '".$_POST['email']."',
                                                '" . date('Y-m-d') . "'
                                                )";
            $resultInsert = mysqli_query($link, $sqlInsert);

            location("contactanos-exitoso");

    }

}
