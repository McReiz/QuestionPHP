<?php
	include('config.php');
	
	/**
	* configuracion global
	*/
	class configGlobal {
		
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
	/* reemplazamos caracteres para hacer url amigables */
	class permanLink{
		private $_title;

		public function __construct($title){
			$this->_title = $title;
		}
		private function setLink($url){
			$url = strtolower($url);
			//buscar para reemplazar
			$buscar = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
			$reemplazar = array('a', 'e', 'i', 'o', 'u', 'n'); 
			$url = str_replace($buscar, $reemplazar, $url);

			$url = str_replace('/[äàâãª]/', 'a', $url);
			$url = str_replace("/[ëèê]/","e",$url);
			$url = str_replace("/[ïíìî]/","i",$url);
			$url = str_replace("/[öòôõº]/","o",$url);
			$url = str_replace('/[üùû]/', 'u', $url);
			$url = str_replace("/[çÇ]/","c",$url);

			$buscar = array('&', '\r\n', '\n', '+'); 
			$url = str_replace($buscar, '-', $url);

			$buscar = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>*]>/'); 
			$reemplazar = array('', '-', ''); 

			$url = str_replace($buscar, $reemplazar, $url);

			$buscar = array('(',')','¿','?','!','¡','_','´','"','&',',','*',':','=','+','#','.',';','%','@','-','[',']', '/');
			$url = str_replace($buscar, "", $url);

			$url = str_replace("'","",$url);
			$url = str_replace(" ", "-", $url);
			echo $url;
		}
		public function getLink(){
			return $this->setLink($this->_title);
		}
		public function __destruct(){

		}
	}
	class shortCodes{
		private $_texto;

		public function __construct($texto){
			$this->_texto = $texto;
		}
		private function setCode($code){
			$buscar = array('[b]', '[/b]');
			$reemplaza = array('<b>', '</b>');
			$code = str_replace($buscar, $reemplaza, $code);

			$buscar = array('[a link=$1]', '[a]');
			$reemplaza = array('<a href="$1" target="_blank">', '</a>');
			$code = str_replace($buscar, $reemplaza, $code);
			
			echo $code;
		}
		public function getCode(){
			$this->setCode($this->_texto);
		}
	}
?>