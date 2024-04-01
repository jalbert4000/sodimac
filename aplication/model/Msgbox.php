<?php
class Msgbox{

	private $_text, $_type;

	public function setMsgbox($text, $type){
		$this->_text = $text;
		$this->_type = $type;
	}

	public function getMsgbox(){

		switch($this->_type){
			case 1:
				$msg = '<div class="alert alert-warning alert-message">
      							<button class="close" data-dismiss="alert"><span>&times;</span></button>
        						<strong>Alerta !!! '.$this->_text.'</strong>
    						</div> ';
			break;
			case 2:
				$msg = '<div class="alert alert-success alert-message">
      							<button class="close" data-dismiss="alert"><span>&times;</span></button>
        						<strong>'.$this->_text.' !!!</strong>
    						</div> ';
			break;
		}
		$this->clearMsgbox();
		return $msg;
	}

	public function clearMsgbox(){
		$this->_text = '';
		$this->_type = '';
	}
}
?>
