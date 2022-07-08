   <?php  
   require_once "view/pages/includes/header.php";
   require_once "controller/conexao.php";
   $album = filter_input(INPUT_GET, 'album', FILTER_SANITIZE_SPECIAL_CHARS);

   $qt = $pdo->prepare("SELECT * FROM imagens WHERE album = '$album'");
   $qt->execute();
   $qnt=$qt->fetchAll(PDO::FETCH_ASSOC); 


   $cr = $pdo->prepare("SELECT * FROM albums WHERE nome = '$album'");
   $cr->execute();
   $cri=$cr->fetchAll(PDO::FETCH_ASSOC); 

   $busca = $pdo->prepare("SELECT * FROM albums");
   $busca->execute();
   $linha=$busca->fetchAll(PDO::FETCH_ASSOC); ?>

   <style>
     .infor {
        font: 10px!important;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 10px;
     }

     .infor:focus, .infor:active {
      outline: none!important;
      box-shadow: none!important;
     }
   </style>

   <div class="container">

    <div class="float-end">

      <div class="section-heading" style="margin-top: 0px!important;">
        <h2 style="font-size: 17px!important;">album: <span><?php echo $_GET['album'];  ?></span>  <a class="btn btn-success infor" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa fa-info" aria-hidden="true"></i>
      </a></h2> 
      </div> 

      <div class="collapse" id="collapseExample">
        <div class="card card-body">
         <p class="fw-bolder text-dark">criador: <?php foreach($cri as $criador) { echo $criador['criador']; } ?></p>

         <p class="fw-bolder text-dark">este album contém: <?php echo count($qnt);  ?> imagens</p>

         
        </div>
      </div>
    </div> 

  </div>
  <br>
</div>

<section class="section" id="projects">

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
        { ?>
         <?php echo "<li data-filter='.des'> <a href='imagem&album=".$lista['nome']." '>" .$lista['nome']."</a> </li>"; ?>

             <!--   <li class="active" data-filter="*">Ver todas imagens</li>
                <li data-filter=".des">Web Design</li>
                <li data-filter=".dev">Web Development</li>
                <li data-filter=".gra">Graphics</li>
                <li data-filter=".tsh">Artworks</li> -->

              <?php  } 



              ?>
            </ul>
          </div>
        </div>

        <div class="col-lg-9">
         <div class="filters-content">
          <div class="row grid">
           <?php  

           $foto = $pdo->prepare("SELECT * FROM imagens where album = '$album' ORDER BY RAND() ");
           $foto->execute();
           $img = $foto->fetchAll(PDO::FETCH_ASSOC);

           if(count($img) > 0)
           {

            foreach($img as $ft)
              { ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des">
                  <div class="item">
                    <a href="imagens/<?php echo $ft['imagem']; ?>" data-lightbox="image-1" data-title="<?php echo $ft['nome']; ?>"><img src="imagens/<?php echo $ft['imagem']; ?>" alt=""></a>
                  </div>
                  <span class="badge bg-success"><?php echo $ft['nome'];  ?></span>
                  <span class="badge bg-light text-dark">Album: <a class="text-secondary" href="imagem&album=<?php echo $ft['album']; ?>"><strong><?php echo $ft['album']; ?></strong></a></span>
                  <br><br>

                  <div class="position-relative">
                    <a href="gostar&id=<?php echo $ft['id'];?>">
                      &nbsp;&nbsp;&nbsp;&nbsp;<span class="position-absolute bottom-10 top-10 start-10 end-10 translate-middle badge rounded-pill bg-danger">
                        <?php echo $ft['qnt_like']; ?> <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                      </span></a>
                    </div>

                  </div>
                <?php  
              }
            }

            else {  ?>


             <span><?php echo "Ainda não contem imagem neste album";  ?></span>


           <?php  }

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


