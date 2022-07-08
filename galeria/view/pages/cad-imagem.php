 <?php  
 require_once "view/pages/includes/header.php";
 require_once "controller/conexao.php";
 ?>


 <section class="section" id="projects">
   <div class="container formulario">

    <?php  

    if(isset($_SESSION['msg'])): 

      if($_SESSION['msg'] == "upload da imagem realizado com sucesso")
        { ?>

          <div class="alert alert-success" role="alert">
            <strong><i class="fa fa-check" aria-hidden="true"></i> <?php  echo $_SESSION['msg']; ?> </strong>
          </div>


        <?php  }
        else { ?>

         <div class="alert alert-danger rounded " role="alert">
          <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php  echo $_SESSION['msg']; ?></strong> Tente novamente
        </div>


      <?php    }

    endif;
    session_unset();
    ?>

    <form method="post" action="./controller/processo-cad.php" enctype="multipart/form-data">
      <div class="mb-3">
        <input class="form-control" class="input-ficheiro" type="file" name="imagem"  id="imagem">
      </div>

      <div class="mb-3">
        <input class="form-control borda" type="text" name="nome"  id="nome" placeholder="nome da imagem">
      </div>

      <?php  
      $busca = $pdo->prepare("SELECT * FROM albums");
      $busca->execute();
      $linha=$busca->fetchAll(PDO::FETCH_ASSOC); ?>

        
        <select class="form-select" required="" name="album" id="album" aria-label="Default select example">
          <option>seleciona album</option>
          <?php foreach($linha as $lista){  ?>
          <option value="<?php echo $lista['nome']; ?>"><?php echo $lista['nome']; ?></option>
        <?php } ?>
      </select>

      <br>
      <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-success borda" id="btn_usuario" name="btn" type="submit">ADICIONAR</button>
      </div>


    </form>


  </div>
</section>




<?php  
require_once "view/pages/includes/footer.php";
?>

<script>
  $('#btn_usuario').click( function (){
    var campo_vazio = false;

    if( $('#imagem').val() == ''){
      $('#imagem').css('border-color', '#A94442!important');
      $('#btn_usuario').css('background-color', '#A94442');
      campo_vazio = true;
      $('#texto').html("preencha todos os campos");
    } else {
      $('#imagem').css('border-color', '#ccc');
      $('#texto').html("");
    }

    if($('#nome').val() == ''){
      $('#nome').css('border-color', '#A94442!important');
      campo_vazio = true;
      $('#texto').html("preencha todos os campos");
    } else {
      $('#nome').css('border-color', '#ccc');
      $('#texto').html("");
    }

    if( $('#album').val() == ''){
      $('#album').css('border-color', '#A94442');
      campo_vazio = true;
      $('#texto').html("preencha todos os campos");
    } else {
      $('#album').css('border-color', '#ccc');
      $('#texto').html("");
    }
    if (campo_vazio) 
      return false;

  })
</script>