<?php
		$connexion = mysqli_connect("localhost","root","","boutique");
      	$id=$_SESSION['id'];
      	$id_commande=$values[0];
      	$id_produits=$values[2];
		if (isset($_POST["supp$i"])) 
		{
		
				$eff= ("DELETE FROM `commande` WHERE id=$id_commande AND  id_produit =$id_produits AND id_utilisateur=$id ");
				$query2=mysqli_query($connexion,$eff);
				header("Location:panier.php");
				
				
	
		}
	
		?>
	<form method="post" >
	<button class="btn btn-dark" type="submit" id="suppprod" name="supp<?php echo $i ?>">Supprimer</button>
	</form>	
	
																  

	
	
	




		
	

			




	

