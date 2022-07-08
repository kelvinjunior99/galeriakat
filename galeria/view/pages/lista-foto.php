<style type="text/css">
	
	img {
		
		width: 200px;
		height: 200px;
		border: 2px solid #dddddd;
		border-top-right-radius: 20px;
	}
</style>


<?php  
	
	require_once('conexao.php');

	$busca=$conn-> prepare("SELECT * FROM tabimagem");
	$busca->execute();

	$linha=$busca->fetchAll(PDO::FETCH_ASSOC);

	  foreach ($linha as $listar)
	  {
	  	echo "Nome: ".$listar["nome"]."<br>";
	  	echo "Classe ".$listar["classe"]."<br>"; 	
	  
?>
 <img src="imagens/<?php echo $listar["imagem"]?>"/> <?php echo "<br>"."<br>";  ?> 
<?php } 



?>



