<?php
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/boutique.css">
	<title>Panier</title>
</head>
		<body id="pagepanier">
			<header id="headerindex">
                  <div id="logo">
                  <img width="200" height="100" src="../upload/logo.png">
                  <p style="text-align:center">Greg & Antho</p>
                  </div>
             <?php  include("../include/bar-nav.php");?>
           </header>
			<main id="mainpanier">
				<a href="../source/boutique.php"><button style="margin: 3%;" type="submit" class="btn btn-dark btn-lg">Boutique</button></a>
							<section id="contpanier">

 								<h1 class="titre"><b>Votre Panier</b></h1>
  				<?php
 							
                                $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$id_utilisateurs=$_SESSION['id'];
								$rep= $connexion->query("SELECT * FROM commande INNER JOIN produits ON commande.id_produit=produits.id  WHERE id_utilisateur = $id_utilisateurs");
								$test = $rep->fetchAll();
								$i=0;
	            				foreach ($test as $values)
								{
						        		if (!empty($values)) {
						        				          
											echo "<table class=\"table table-dark\"width=600px>";
											echo "<tr>";
											echo "<th>Nom produit</th>";
											echo "<th>Image</th>";
											echo "<th>Prix unitaire</th>";
											echo "<th>Quantité</th>";
											echo "<th>Prix total</th>";
											echo "</tr>";
											echo "<tr>";
											echo "<td>".$values[8]."</td>";
											echo "<td><img heigh=150px width=150px src=\"../upload/".$values[11]."\"></td>";
											echo "<td>".$values[9]."</td>";
											echo "<td>".$values[4]."</td>";
											echo "<td>".$values[5]."€</td>";
											echo "</tr>";
											echo "</table>";
											include("../include/quantite.php");						
											$i++;
																  
										}
									?>
									<?php

									$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
									$req=$connexion->query("SELECT SUM(prixglobal) FROM `commande` WHERE id_utilisateur=$id_utilisateurs");
									$total = $req->fetchAll();
													   			
									?>
									<h1 class="titre"><b>Le montant total est :<?php echo "".$total[0][0].""?>€</b></h1>
									<?php

									if (isset($_POST['ajoutpanier'])) 
									{

									$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
									$id_utilisateurs=$values[1];
									$id_produits=$values[2];
									$prixtotal=$total[0][0];
									$req2 = $connexion->prepare("INSERT INTO panier (id_utilisateur,id_produit,datepanier,prixtotal) VALUES ('$id_utilisateurs','$id_produits',NOW(),'$prixtotal')")->execute();
									$req3 = $connexion->prepare("DELETE FROM commande WHERE id_utilisateur=$id_utilisateurs")->execute();
									header("location:paiement.php")
									?>	
								
									<?php
									}
										}
														
							?>
							<form method="post">
								<button class="btn btn-dark" type="submit" name="ajoutpanier">Commander</button>
							</form>
						</section>
						</main>
								<?php include("../include/footer.php");?>
					
	
			</body>
</html>
