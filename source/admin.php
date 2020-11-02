<?php
session_start();
date_default_timezone_set('europe/paris');
?>

<html lang="fr">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Espace Administrateur - Boutique </title>
    <link rel="stylesheet" href="../css/boutique.css">
</head>
<body id="pageadmin">

<header>
<?php include "../include/bar-nav.php" ;?>
</header>
<?php
if (isset($_SESSION['login'])==false)
    	{
       echo "<h3>Connectez vous et achetez maintenant";
    	}
    	elseif(isset($_SESSION['login'])==true)

    	{
       if($_SESSION['login'] =="admin")
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour $user,<br> vous êtes connecté.</b></h3>";
       }
       else
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour $user, vous êtes connecté.</b></h3>"; 
       }
    	}
    ?>
<main id='mainadmin'>

		<section id="formadmin">
                 <h1 class="titre"><b>Créer vos Produits</b></h1>
                    <div id="groupform">
						<div class="form-group">
						<?php	
							
								
								if (isset($_POST['valider'])) {

									if (!empty($_POST['titre'])&& !empty($_POST['prix'])&& !empty($_POST['description'])&& !empty($_POST['photo'])&& !empty($_POST['souscategories'])) {
													$titre = addslashes(($_POST['titre']));
									                $prix = htmlspecialchars($_POST['prix']);
									                $description =htmlspecialchars ($_POST['description']);
									                $photo = htmlspecialchars($_POST['photo']);
									                $categories = htmlspecialchars($_POST['categories']);
									                $souscategories =htmlspecialchars($_POST['souscategories']);
									                $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
													$requete = $connexion->prepare("INSERT INTO produits (nomproduit, prixproduit, description, image,categories,souscategories) VALUES ('$titre', '$prix', '$description','$photo','$categories','$souscategories')");
													$requete->execute();
												
									}
								
								}
							  ?>
							  
							  <form class="formulaire" method="post" >
							  	 <p class="titre">Créer des Articles</p>
							                    <label>Titre</label></br>
							                    <input class="form-control" type="text" name="titre" required></br>
							                    <label>Prix</label></br>
							                    <input class="form-control" type="text" name="prix"></br>
							                    <label>Description</label></br>
							                    <input class="form-control" type="text" name="description" required></br>
							                   	<label>Photo</label></br>	    
							                   	<input class="form-control-file" type="file" name="photo" required></br>
							                   	<label>Catégories</label></br>
							                    <input class="form-control" type="text" name="categories" required></br>
							                   	<label>Sous Catégories</label><br>
							                    <input class="form-control" type="text" name="souscategories" required><br>
							                    <br>
							                    <button class="btn btn-success" type="submit" value="Envoyer" name="valider">Valider</button>
							   </form>
							</div>

							<div class="form-group">
							   	<?php

								if (isset($_POST['modifier'])) {
									echo "string";
									if (!empty($_POST['titre3']) && !empty($_POST['titre2']) && !empty($_POST['description']) && !empty($_POST['photo']) && !empty($_POST['categories']) && !empty($_POST['souscategories'])) {
										echo "connexion";
													$titre3 = htmlspecialchars($_POST['titre3']);
													$titre2 = htmlspecialchars($_POST['titre2']);
									                $prix2 = htmlspecialchars($_POST['prix2']);
									                $description = htmlspecialchars($_POST['description']);
									                $photo = htmlspecialchars($_POST['photo']);
									                $id = $_SESSION['id'];
									                $categories =htmlspecialchars($_POST['categories']);
									                $souscategories = htmlspecialchars($_POST['souscategories']);
									                $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
													$requete2 = $connexion->prepare("UPDATE produits SET nomproduit= '$titre2', prixproduit= '$prix2', description= '$description' ,image = '$photo' ,categories = '$categories' ,souscategories ='$souscategories' WHERE nomproduit = '$titre3'");
													$requete2->execute();
													
									}
								
								}
							  ?>
							   
							  	  <form  class="formulaire" method="post">
							  	  	<p class="titre">Modifier des Articles</p>
								  				<label>Recherche Articles</label></br>
							                    <input class="form-control" type="text" name="titre3" required></br>
							                    <label>Modifier Articles</label></br>
							                    <input class="form-control" type="text" name="titre2" required></br>
							                    <label>Prix</label></br>
							                    <input class="form-control" type="text" name="prix2"></br>
							                    <label>Description</label></br>
							                    <input class="form-control" type="text" name="description" required></br>
							                    <label>Photo</label></br>         
							                   	<input class="form-control-file"  type="file" name="photo" required></br>
							                   	<label>Catégories</label></br>
							                    <input class="form-control" type="text" name="categories" required></br>
							                   	<label>Sous Catégories</label></br>
							                    <input class="form-control" type="text" name="souscategories" required>
							                    </br>
							                    <br>
							                    <button class="btn btn-success" type="submit" value="modifier" name="modifier">Modifier</button>
							      </form>
							   </div>
							   <div class="form-group">
							   <?php

							   if (isset($_POST['effacer'])) {
							   		if (!empty($_POST['titre4']))
											 			{
											 			$titre4 = htmlspecialchars($_POST['titre4']); 
										                $id = $_SESSION['id'];
										                $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
									        			$requete3 = $connexion->prepare("DELETE FROM produits WHERE nomproduit = '$titre4'");
									        			$requete3->execute();
									        			
				   										}						   	
							  					}	
		
							   ?>
							    				<form class="formulaire" method="post">
							    				<p class="titre">Effacer des Articles</p>
							                    <label>Titre</label></br>
							                    <input class="form-control" type="text" name="titre4" required>
							                    <br>
							                    <br>
							                    <button class="btn btn-success" type="submit" value="effacer" name="effacer">Effacer</button>
							    				</form>
							    </div>
							    </div>



						
</section>
</main>
<?php include "../include/footer.php" ;?>
</body>
</html>