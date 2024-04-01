<?php
class Configuration{

	private $data = array();
	private $_msgbox;
	private $_usuario;

	public function __construct(String $msg=null, Usuario $user){
		$this->_msgbox = $msg;
		$this->_usuario = $user;
	}

	public function getData(){
			$sql   = "SELECT * FROM configuracion ORDER BY id_configuracion ASC";
			$query = new Consulta($sql);
			while($row = $query->VerRegistro()){
				$this->data[$row['nombre_configuracion']] = $row['valor_configuracion'];
			}
			return $this->data;
	}

	//INICIO CODIGO PARA EL ADMINISTRADOR
	public function updateConfiguration(){
			foreach($_POST as $nombre => $valor){
				 $sql = "UPDATE configuracion SET valor_configuracion = '".$valor."' WHERE nombre_configuracion = '".$nombre."' ";
				 $query = new Consulta($sql);
			}
			$this->_msgbox->setMsgbox('Se actualizó correctamente',2);
			location("index.php?modulo=configuracion");
	}

	public function getConfiguration(){
			$query = new Consulta("SELECT * FROM configuracion WHERE estado_configuracion='1' ORDER BY id_configuracion ASC");
			$data;
			while($row = $query->VerRegistro()){
				$data[] = array(
					'id'	  	 => $row["id_configuracion"],
					'nombre'   => $row["nombre_configuracion"],
					'valor' 	 => $row["valor_configuracion"]
				);
			}
			return $data;
	}
	//FIN CODIGO PARA EL ADMINISTRADOR

}

?>
