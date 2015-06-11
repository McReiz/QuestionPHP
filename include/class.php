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
	class filtreoTexto{
		//private $_url;
		//private $_title;

		private function setCode($code){

			// http://php.net/manual/es/regexp.reference.meta.php
			// http://php.net/manual/es/regexp.reference.escape.php

			$buscar = '#\[b\](.+?)\[/b\]#i';
			$reemplaza = '<b>$1</b>';
			$code = preg_replace($buscar, $reemplaza, $code);
			
			$buscar = array('#\[a link=(.*?)\](.*?)\[/a\]#i', '#\[a\](.*?)\[/a\]#i');
			$reemplaza = array('<a href="$1" target="_blank">$2</a>', '<a href="$1" target="_blank">$1</a>');
			$code = preg_replace($buscar, $reemplaza, $code);
			
			echo $code;
		}
		public function getCode($texto){
			return $this->setCode($texto);
		}

		private function setLink($url){
			
			$url = html_entity_decode($url); 
			$url = trim($url); // quita los espacio de al principio y del final
			$url = mb_strtolower($url); // convierte todo los caracteres en minusculas

			//eliminar acentos áäàâãª
			$buscar = array('á','ä','à','â','ã','ª');
			$url = str_replace($buscar, "a", $url);
			//eliminar acentos éëèê
			$buscar = array('é','ë','è','ê');
			$url = str_replace($buscar, "e", $url);
			//eliminar acentos ïíìî
			$buscar = array('ï','í','ì','î');
			$url = str_replace($buscar, "i", $url);
			//eliminar acentos óöòôõº
			$buscar = array('ó','ö','ò','ô','õ','º');
			$url = str_replace($buscar, "o", $url);
			//eliminar acentos úüùû
			$buscar = array('ú','ü','ù','û');
			$url = str_replace($buscar, "u", $url);
			//letras raras çÇñ
			$buscar = array('ç','ñ');
			$reemplazar = array('c','n');
			$url = str_replace($buscar, $reemplazar, $url);

			$buscar = array('(',')','¿','?','!','¡','_','´','"','&',',','*',':','=','+','#','.',';','%','@','-','[',']', '/', '\\', '<', '>');
			$url = str_replace($buscar, "", $url);

			$url = str_replace("'","",$url);

			$buscar = "/[\s,]+/";
			$url = preg_replace($buscar, " ", $url);
			
			$buscar = array('\r\n', '\n'); 
			$url = str_replace($buscar, '-', $url);

			$url = str_replace(" ", "-", $url);
			echo $url;
		}
		public function getLink($Link){
			return $this->setLink($Link);
		}
	}
	class selected{
		private $_query;
		public $_limite;

		public function __construct($query, $limite){
			$this->_query = "SELECT * FROM ". $query;
			$this->_limite = $limite;
		}
		public function conectdb(){
			return new mysqli(server,user,pass,db);
		}
		private function setList(){
			$db = $this->conectdb();
			$resultado = $db->query($this->_query);
			
			return $resultado;
		}
		public function getList(){
			return $this->setList();
		}
	}
?>