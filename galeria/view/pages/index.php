   <?php  
   require_once "view/pages/includes/header.php";
   require_once "controller/conexao.php";

   $busca = $pdo->prepare("SELECT * FROM albums");
   $busca->execute();
   $linha=$busca->fetchAll(PDO::FETCH_ASSOC); ?>

   <section class="section" id="projects">
     <div class="section-heading text-center" style="margin-top: -120px!important;">
      <h2>Todas imagens</h2>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="section-heading">
            <h6>Album</h6>
          </div>
          <div class="filters">
            <ul>

              <?php 

              foreach($linha as $lista)
              {
               ?>
               <?php echo "<li data-filter='.des'>
               <a href='imagem&album=".$lista['nome']."'>" .$lista['nome']."</li> 
               </a>"; ?>

             <!--  
                <li data-filter=".des">Web Design</li>
              -->

            <?php  } ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="filters-content">
          <div class="row grid">

            <?php   
            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);   
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //Setar a quantidade de itens por pagina
            $qnt_result_pg = 20;

            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            $query=$pdo->prepare("SELECT * FROM imagens LIMIT $inicio, $qnt_result_pg");
            $query->execute();
            $dados = $query->fetchAll(PDO::FETCH_ASSOC);

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
                <?php  }  ?>

                <?php  
                //Paginção - Somar a quantidade de usuários
                $resultado_pg = $pdo->prepare("SELECT COUNT(id) AS num_result FROM imagens");
                $resultado_pg->execute();
                $row_pg = $resultado_pg->fetch(PDO::FETCH_ASSOC);

                //echo $row_pg['num_result'];
                //Quantidade de pagina 
                $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                //Limitar os link antes depois
                $max_links = 1;

                ?>
              </div>
              <?php  

              echo "<nav aria-label='' style='font-size: 10pt!important; margin-top: -40px!important;'>
              <ul class='pagination justify-content-center text-danger'>";
            echo " ";

              for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1){
                  echo " 
                  <li class='page-item'><a href='index&pagina=1' class='page-link' '>Primeira</a></li>
                  <li class='page-item '>
                  <a class='page-link' href='index&pagina=$pag_ant' tabindex='-1'>$pag_ant</a></li>";
                }
              }

              echo "<li class='page-item'><a class='page-link'>$pagina</a></li>";

              for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <= $quantidade_pg){
                  echo "<li class='page-item'> 

                  <a class='page-link' href='index&pagina=$pag_dep'>$pag_dep</a> </li>
                  ";
                }
              }

              echo "<li class='page-item'><a class='page-link' href='index&pagina=$quantidade_pg'>Ultima</a></li>";
              echo "
              </ul>
              </nav>";

              ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    <?php  
    require_once "view/pages/includes/footer.php";
  ?>