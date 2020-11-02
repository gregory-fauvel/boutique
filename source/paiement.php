<?php
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/boutique.css">
	<title>Paiement</title>
</head>
		<body id="paiement">

			<header id="headerindex">
                  <div id="logo">
                  <img width="200" height="100" src="../upload/logo.png">
                  <p style="text-align:center">Greg & Antho</p>
                  </div>
             <?php  include("../include/bar-nav.php");?>
           </header>


			<main id="mainpaiement">
			<?php
			$id_utilisateurs=$_SESSION['id'];
			$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
	        $res = $connexion->query("SELECT prixtotal FROM panier WHERE id_utilisateur=$id_utilisateurs")->fetchAll();
			?>
            <h1 class="titre"><b>Votre paiement</b></h1>
			<h1 id="montant"><b>Le montant total à payer est de:<?php echo  $res[0][0]?> €</b></h1>

			<?php
			
			if (isset($_POST['payer'])) {
				
			$connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
			$req2= $connexion->prepare("DELETE  FROM panier WHERE id_utilisateur=$id_utilisateurs")->execute();
			echo"<p id='validp'><b>Votre paiement a bien été effectué!<br>Merci de votre visite!<br>A bientôt!</b></p>";
				header('Location:boutique.php');
			}
			?>	
			<div class="form-group" id="contpaiement">
 			<form method="post">
 				<img id="logopaiement" height="50" width="150" src="../upload/paiementsecur.jpg">
 				<H2><b>Informations CB</b></H2>
 				<label><b>TYPE CB</b></label>
 				<label><b>Choisir:</b></label>
				<select class="form-control" name="select" required>
			    <option value="">Choisir option</option>
			    <option value="visa">Visa</option>
			    <option value="master">Mastercard</option>
			    <option value="amex">AMEX</option>
				</select>
 				<label><b>Numéro CB</b></label><br>
 				<input class="form-control" type="number" name="codecb" required=""/>
 				<label><b>Code Sécurité</b></label>
 				<input class="form-control" type="number" name="codesec" required=""/>
 				<label><b>Nom du Porteur</b></label>
 				<input class="form-control" type="text" name="nomcb" required /><br>
 				<button class="btn btn-dark" name="payer">Payer</button>	
 			</form>
 			</div>

		
			</main>
		
		<?php include("../include/footer.php");?>
	
	</body>
</html>



								
							
							
