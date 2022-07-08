   <?php  
   require_once "view/pages/includes/header.php";
   require_once "controller/conexao.php";

   $busca = $pdo->prepare("SELECT * FROM albums");
   $busca->execute();
   $linha=$busca->fetchAll(PDO::FETCH_ASSOC); ?>


   <section class="section" id="projects">
     <div class="section-heading text-center" style="margin-top: -90px!important; display: none;">
      <h2>...</h2>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="section-heading">
            <h6>Album</h6>
          </div>
          <div class="filters">
            <ul>
              <a href="index"><li class="active" data-filter="*">Ver todas imagens</li></a>


              <?php 

              foreach($linha as $lista)
              {
               ?>
               <?php echo "<li data-filter='.des'>
               <a href='imagem&album=".$lista['nome']." '>" .$lista['nome']."</li> 
               </a>"; ?>

             <!--   <li class="active" data-filter="*">Ver todas imagens</li>
                <li data-filter=".des">Web Design</li>
                <li data-filter=".dev">Web Development</li>
                <li data-filter=".gra">Graphics</li>
                <li data-filter=".tsh">Artworks</li> -->

              <?php  } ?>
            </ul>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="filters-content">
            <div class="row grid">

              <?php   

              $pesquisar = isset($_POST["pesquisar"]) ? $_POST["pesquisar"] : "";
              $query=$pdo->prepare("SELECT * FROM imagens WHERE nome LIKE '%$pesquisar%' LIMIT 10");
              $query->execute();

              if ($pesquisar !="" || $pesquisar !="") 
              {
                $dados = $query->fetchAll(PDO::FETCH_ASSOC);

                if($dados) {
                  foreach($dados as $dado)
                    { ?>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des">
                        <div class="item">
                          <a href="imagens/<?php echo $dado['imagem']; ?>" data-lightbox="image-1" data-title="<?php echo $dado['nome']; ?>"><img src="imagens/<?php echo $dado['imagem']; ?>" alt=""></a>
                        </div>
                        <span class="badge bg-success"><?php echo $dado['nome'];  ?></span>
                        <span class="badge bg-light text-dark">Album: <a class="text-secondary" href="imagem&album=<?php echo $dado['album']; ?>"><strong><?php echo $dado['album']; ?></strong></a></span>
                        <br><br>

                        <div class="position-relative">
                          <a href="gostar&id=<?php echo $dado['id'];?>">
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="position-absolute bottom-10 top-10 start-10 end-10 translate-middle badge rounded-pill bg-danger">
                              <?php echo $dado['qnt_like']; ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                            </span></a>
                          </div>

                        </div>
                        <?php  
                        break;
                      }  
                    }

                    else 
                      { ?>
                        <div class="alert alert-light text-center" role="alert">
                         <h3><?php echo "nenhum resultado"; ?></h3>
                       </div>
                       
                     <?php     }
                   }
                   ?>

                 </div>
               </div>
             </div>
           </div>
         </div>
       </section>


       <?php  
       require_once "view/pages/includes/footer.php";
     ?>