<?php
	include('config.php');
	
	/**
	* configuracion global
	*/
	class configGlobal {
		private $_config;

		public function __construct($config){
			$this->_config = $config;
		}
		private function conectdb(){
			return new mysqli(server,user,pass,db);
		}
		public function getConfig($configS){
			$db = $this->conectdb();
			$resultado = $db->query("SELECT * FROM config WHERE id=1");
			$dato = $resultado->fetch_array(MYSQLI_ASSOC);

			if($configS == 'titulo'){
				return $dato['titulo'];
			}elseif ($configS == 'eslogan') {
				return $dato['eslogan'];
			}elseif ($configS == "tags") {
				return $dato['tags'];
			}
		}
	}
?>