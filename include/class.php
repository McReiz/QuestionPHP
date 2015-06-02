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
			$buscar = array('[b]', '[/b]');
			$reemplaza = array('<b>', '</b>');
			$code = str_replace($buscar, $reemplaza, $code);
			// http://php.net/manual/es/regexp.reference.meta.php
			$buscar = array('#\[a link=(.*?)\](.*?)\[/a\]#is');
			$reemplaza = array('<a href="$1" target="_blank">$2</a>');
			$code = preg_replace($buscar, $reemplaza, $code);
			
			echo $code;
		}
		public function getCode($texto){
			$this->setCode($texto);
		}

		private function setLink($url){
			
			$url = html_entity_decode($url);
			$url = trim($url);
			$url = mb_strtolower($url);

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

			$buscar = array('&', '\r\n', '\n', '+'); 
			$url = str_replace($buscar, '-', $url);

			$buscar = array('(',')','¿','?','!','¡','_','´','"','&',',','*',':','=','+','#','.',';','%','@','-','[',']', '/');
			$url = str_replace($buscar, "", $url);

			$url = str_replace("'","",$url);
			$url = str_replace(" ", "-", $url);
			echo $url;
		}
		public function getLink($Link){
			return $this->setLink($Link);
		}
	}
?>