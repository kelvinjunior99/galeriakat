<?php

session_start();
include_once 'conexao.php';

if(isset($_POST['btn'])) {
    //Receber os dados do formulário
    $album = filter_input(INPUT_POST, 'album', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome_imagem = $_FILES['imagem']['name'];
    
    //Inserir no BD
    $result_img = "INSERT INTO imagens (album, imagem, nome) VALUES (:album, :imagem, :nome)";
    $insert_msg = $pdo->prepare($result_img);
    $insert_msg->bindParam(':album', $album);
    $insert_msg->bindParam(':imagem', $nome_imagem);
    $insert_msg->bindParam(':nome', $nome);

    //Verificar se os dados foram inseridos com sucesso
    if ($insert_msg->execute()) {
        //Recuperar último ID inserido no banco de dados
        //$ultimo_id = $conn->lastInsertId();

        //Diretório onde o arquivo vai ser salvo
        $diretorio = '../imagens/';

        //Criar a pasta de foto 
        mkdir($diretorio);
        
        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nome_imagem)){
            $_SESSION['msg'] = "upload da imagem realizado com sucesso";
            header('location: ../cad-imagem');
        }
        else{
            $_SESSION['msg'] = "erro ao realizar o upload da imagem";
            header('location: ../cad-imagem');
        } 

    } 
    else {
        $_SESSION['msg'] = "erro ao salvar imagem";
        header('location: ../cad-imagem');
    }
} 

?>