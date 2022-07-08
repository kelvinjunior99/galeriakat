 <?php  
 require_once "view/pages/includes/header.php";
 ?>


 <section class="section" id="projects">
   <div class="container formulario">

    <?php  

    if(isset($_SESSION['msg'])): 

      if($_SESSION['msg'] == "cadastrado com sucesso")
        { ?>

          <div class="alert alert-success" role="alert">
            <strong><i class="fa fa-check" aria-hidden="true"></i> <?php  echo $_SESSION['msg']; ?> </strong>
          </div>


        <?php  }
        else { ?>

         <div class="alert alert-danger" role="alert">
          <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php  echo $_SESSION['msg']; ?></strong> Tente novamente
        </div>


      <?php    }

    endif;
    session_unset();
    ?>

    <?php 
    if(isset($_GET['erro_nome'])){   ?>

     <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>o nome já existe</strong> <?php echo "muda o nome ";  ?> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php   }
  else {


  }

  ?>

  <div class="vstack gap-2 col-md-5 mx-auto" style="display: none;">
    <span class="badge bg-danger" id="texto"></span>
  </div>
  

  <form method="post" action="./controller/processo-alb.php">

    <div class="mb-3">
      <input class="form-control borda" type="text" name="nome"  id="nome" placeholder="nome do album">
    </div>

    <div class="mb-3">
      <input class="form-control borda" type="text" name="criador"  id="criador" placeholder="criado por: ">
    </div>


    <br>
    <div class="d-grid gap-2 col-6 mx-auto">
      <button class="btn btn-success borda" id="btn" name="btn" type="submit">ADICIONAR</button>
    </div>


  </form>


</div>
</section>




<?php  
require_once "view/pages/includes/footer.php";
?>

<script>
  $('#btn').click( function (){
    var campo_vazio = false;

    if( $('#nome').val() == ''){
      $('#btn').css('background-color', '#A94442');
      campo_vazio = true;
      $('#texto').html("preencha todos os campos");
    } else {
      $('#btn').css('background-color', '#198754');
      $('#texto').html("");
    }

      if( $('#criador').val() == ''){
      $('#btn').css('background-color', '#A94442');
      campo_vazio = true;
      $('#texto').html("preencha todos os campos");
    } else {
      $('#btn').css('background-color', '#198754');
      $('#texto').html("");
    }
    if (campo_vazio) 
      return false;

  })
</script>