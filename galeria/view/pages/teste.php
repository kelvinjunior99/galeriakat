<?php  
include_once "controller/conexao.php";
require_once "view/pages/includes/header.php";

$album = filter_input(INPUT_GET, 'album', FILTER_SANITIZE_SPECIAL_CHARS);
$foto = $pdo->prepare("SELECT imagem, nome FROM imagens where album = '$album' ");
$foto->execute();
$img = $foto->fetchAll(PDO::FETCH_ASSOC);

?>


<section class="section" id="projects">
	<div class="col-lg-9">
		<div class="filters-content">
			<div class="row grid">
				<?php

				foreach($img as $ft)
					{ ?>
		

						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des">
							<div class="item">
								<a href="imagens/<?php echo $ft['imagem'];?>" data-lightbox="image-1" data-title="<?php echo $ft['nome'] ?>"><img src="imagens/<?php echo $ft['imagem'];?>"></a>
							
						</div>
					</div><?php  }

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