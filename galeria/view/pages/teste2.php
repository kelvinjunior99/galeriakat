<?php  
include_once "controller/conexao.php";
require_once "view/pages/includes/header.php";

$album = filter_input(INPUT_GET, 'album', FILTER_SANITIZE_SPECIAL_CHARS);
$foto = $pdo->prepare("SELECT imagem FROM imagens where album = 'album'");
$foto->execute();
$img = $foto->fetchAll(PDO::FETCH_ASSOC);


foreach($img as $ft){ ?>

	<img src="imagens/<?php echo $ft['imagem'];?>">
<?php  }
?>