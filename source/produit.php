<?php session_start();?>
<html>
	<head>
		<title>Produit</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/boutique.css">
		<meta charset="utf-8">
	</head>
			<body id="pageproduit">
				<header id="headerindex">
                  <div id="logo">
                  <img width="200" height="100" src="../upload/logo.png">
                  <p style="text-align:center">Greg & Antho</p>
                  </div>
     <?php  include("../include/bar-nav.php");?>
</header>
							
		<main id="mainproduit">
			
						<section id="produit">
								
								<?php
								$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
								$retour=$_GET['p'];
								$id_utilisateurs=$_SESSION['id'];
								$reponse = $connexion->query("SELECT * FROM produits WHERE produits.id=$retour ");
								$rep=$reponse->fetchAll();
						
      										if (!empty($_GET['p'])) 
      										{
													$i = 0;
														foreach ($rep as $val){
															if (!empty($val)){
															echo "<div id='contenueproduit' >";
															echo "<H1 class=\"titre\">Ma Selection</H1>";
															echo "<table class=\"table table-dark\">";
															echo "<tr>";
															echo "<th scope=\"col\">Nom</th>";
															echo "<th scope=\"col\">Description</th>";
															echo "<th scope=\"col\">Image</th>";
															echo "<th scope=\"col\">Prix</th>";
															echo "</tr>";
															echo "<tr>";
															echo "<td>".$val[1]."</td>";
															echo "<td>".$val[3]."</td>";
															echo "<td id='resultnom'><img class='photo' heigh=300px width=300px src=\"../upload/".$val[4]."\"></td>";
															echo "<td>".$val[2]."€</td>";
															echo "</tr>";
															echo "</table>";
															$i ++;
														}
															else
														{
															echo "Veuillez choisir un produit!";
					    								}

					    							}
								    		}
								    		?>
								    
								    			<H2 class="titre">Veuillez entrer une quantité</H2>
								    		<?php
    										if (empty($_POST['quantiteproduit'])) 
    											{
	    									?>
	    									<form class="form-group" method="post" >
	    									<input class="form-control" type="number" name="quantiteproduit" min="1" max="10"/><br>
	    							
	    									<button class="btn btn-dark"  name="valider2" value="valider">Valider</button>
	    									</form>
	    									</div>

	    									<?php
	    									
    											}
    										else
    										{
    											$connexion=mysqli_connect("localhost","root","","boutique");
    											$retour=$_GET['p'];
    											$qtt=$_POST['quantiteproduit'];
    											$quantiteproduit=$val[2];
    											$prixglobal=$qtt*$quantiteproduit;
    											$req2 = $connexion->prepare("INSERT INTO commande (id_utilisateur,id_produit,prixproduit,quantiteproduit,prixglobal,dateajout) VALUES ('$id_utilisateurs','$retour','$quantiteproduit','$qtt','$prixglobal',NOW()) ");
                                                $req2->execute();
    											header("location:panier.php");
    										}
    											?>
    									
    										<div id="contavis">
    										<H2 class="titre">Les Avis sur ce produit</H2>
											<?php
    										
    											$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
												$retour=$_GET['p'];
												$id_utilisateurs=$_SESSION['login'];
												//var_dump($id_utilisateurs);
												$reponse2 = $connexion->query("SELECT utilisateurs.login,commentaires,dateavis FROM avis INNER JOIN utilisateurs ON id_utilisateur = utilisateurs.id WHERE id_produit=$retour ORDER BY dateavis DESC LIMIT 5");
												$rep2=$reponse2->fetchAll();
												
												$j=0;
												foreach ($rep2 as $value) {
																if (!empty($value)) 

														{
															echo "<div id='avisprod'>";
															echo "<table>";
															echo "<tr>";
															echo "<th id='nom'>Nom</th>";
															echo "<th id='nom'>Avis</th>";
															echo "<th id='nom'>Date</th>";
															echo "</tr>";
															echo "<tr>";
															echo "<td id='resultnom'>".$value[0]."</td>";
															echo "<td id='resultnom'>".$value[1]."</td>";
															echo "<td id='resultnom'>".$value[2]."</td>";
															echo "</tr>";
															echo "</table>";
															echo "</div>";

															$i ++;
														}
															else
														{
											
															echo "Pas de commentaires pour cet article";
					    								}

					    							}
												?>
							  </div>
						</section>
						</main>
						<?php include("../include/footer.php");?>
			      </body>
             </html>