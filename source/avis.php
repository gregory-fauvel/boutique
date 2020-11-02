
 <?php
  $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
  $resultat = $connexion->query("SELECT id FROM `utilisateurs` WHERE login='".$_SESSION['login']."'");
  $data = $resultat->fetch(PDO::FETCH_ASSOC);
  	?>
    <div id="formbo"  class="form-group" >
  		<h1>Poster votre avis sur cette article</h1>
  			<?php
        $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
        $resultat2 = $connexion->query("SELECT image FROM produits WHERE id = '".$_GET['id']."'");
        $res2a = $resultat2->fetch(PDO::FETCH_ASSOC);
  			$img=$res2a['image'];
  			echo "<img class=\"imageavis\" src=\"../upload/$img\"></a>";
  			?>
  		
		<form method="post">
			<label class="label1"><b>Ecrire votre avis</b></label>
			<textarea class="form-control"  name="avis" rows="7" cols="114" required></textarea>
      <br>
      <button class="btn btn-dark" type="submit" name="send" value="valider">Donner un avis</button>
		</form>
		<?php 
		 if (isset($_POST['send']))
		 {
      $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
      $req1a = $connexion->prepare("INSERT INTO avis (id_utilisateur,id_produit,commentaires) VALUES ('".$data['id']."','".$_GET['id']."','".$_POST['avis']."')");
       $req1a->execute();
		 }

		?>
   </div>