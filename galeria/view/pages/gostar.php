<?php  
include_once "controller/conexao.php";

if(isset($_GET['id'])){

	if(isset($_COOKIE['like_cont'])){
		$_SESSION['msg'] = "<span style='color: red'>Você já curtiu!</span>";
		header('Location: index');
	}
	else { 
		setcookie('like_cont', $_SERVER['REMOTE_ADDR'], time() + 5);
		$sql = $pdo->prepare("UPDATE imagens SET qnt_like=qnt_like + 1
		WHERE id ='".$_GET['id']."'");

		if($sql->execute())
		{
			header('Location: index');
		}

		else {
			header('Location: index&erro');
		}

	}

}

?>