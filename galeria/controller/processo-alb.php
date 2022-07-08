<?php 
session_start();
include_once 'conexao.php';


if(isset($_POST['btn']))
{
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$criador = filter_input(INPUT_POST, 'criador', FILTER_SANITIZE_SPECIAL_CHARS);

	//verificar se nome já foi cadastrado
	$cmd = $pdo->prepare("SELECT id FROM albums WHERE nome = :nome");
	$cmd->bindValue(":nome",$nome);
	$cmd->execute();

	if($cmd->rowCount() > 0) 
	{
		header('location: ../cad-album&erro_nome');
	}

	else 
	{

		$sql = "INSERT INTO albums (nome, criador) VALUES (:nome, :criador)";
		$inserir = $pdo->prepare($sql);
		$inserir->bindParam(':nome', $nome);
		$inserir->bindParam(':criador', $criador);

		if($inserir->execute()) 
		{
			$_SESSION['msg'] = "cadastrado com sucesso";
			header('location: ../cad-album');
		}
		else 
		{
			$_SESSION['msg'] = "erro ao cadastrar album";
			header('location: ../cad-album');

		}
	}

}

?>