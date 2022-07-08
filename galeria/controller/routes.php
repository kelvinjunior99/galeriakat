<?php 

function routesURL()
{
	
	if(isset($_GET['url']))
	{	

		$url = $_GET['url'] ? $_GET['url'] : "index";
	}
	else 
	{
		$url = "index";
	}

	switch ($url) {
		case 'index':
		include_once "view/pages/index.php";
		break;

		case 'lista-foto':
		include_once "view/pages/lista-foto.php";
		break;

		case 'cad-imagem':
		include_once "view/pages/cad-imagem.php";
		break;

		case 'cad-album':
		include_once "view/pages/cad-album.php";
		break;

		case 'imagem':
		include_once "view/pages/imagem.php";
		break;

		case 'gostar':
		include_once "view/pages/gostar.php";
		break;

		case 'resultado':
		include_once "view/pages/resultado.php";
		break;

		case 'teste':
		include_once "view/pages/teste.php";
		break;

		case 'sobre':
		include_once "view/pages/sobre.php";
		break;


		
		
		default:
		include_once "view/pages/404.php";
		
		break; 
	}
	



}

?>