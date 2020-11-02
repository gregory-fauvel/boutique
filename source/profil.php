<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/boutique.css">
    <title>Profil</title>
</head>
  <body class="bodyc">
    <header id="headerindex">
      <div id="logo">
    <img width="200" height="100" src="../upload/logo.png">
    <p style="text-align:center">Greg & Antho</p>
    </div>
      <?php
      session_start();
      include("../include/bar-nav.php");
  if (isset($_SESSION['login']))
  {
    $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    $resultat = $connexion->query("SELECT * FROM `utilisateurs` WHERE login='".$_SESSION['login']."'");
    $data = $resultat->fetch(PDO::FETCH_ASSOC);
      ?>
    </header>
<main id="mainprof">
                <?php
    if(isset($_GET['id']))
    {
      ?>
      <section id="connexion">
        <?php
      // include qui permet de voir les info personel
      include("infoprof.php");?>
      </section>
      <?php
      // include qui permet de rajouter un avis
      include ("avis.php");

    }
    else{
          ?>
          <section id="connexion">
          <?php
          include("../source/infoprof.php");
            ?>
          </section>
          <section id="commandepro">
             <h1>Les commandes de vos produits</h1>
            <div id="encadrcard">
          <?php
          $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
           $resultatcmd = $connexion->query("SELECT produits.prixproduit,nomproduit,quantiteproduit,image,id_produit FROM `commande` inner join produits on commande.id_produit = produits.id  WHERE id_utilisateur = '".$data['id']."' ORDER BY dateajout DESC LIMIT 9")->fetchAll();

          $i=0;

          foreach($resultatcmd as $data6)
          {
            
            $did=$data6[0];
            $img=$data6[3];
            $dnp=$data6[1];
            echo" <div class=\"card\">";
            echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";
            echo "<p><b>Prix: {$data6[0]} €</b></p>";
            echo "<p><b>Quantité: {$data6[2]}</b></p>";
           
            ?>

            <!-- je creer le GET id pour recuperer id pour avis -->
            <form class="form-group" method="post">
            <a href="profil.php?id=<?php echo"$data6[4]"?>" target="_blank"><button class="btn btn-light" type="submit" name="avis<?php echo"[$i]"?>"/>Donnez votre avis</a>
            </form>

            <?php
            echo "</div>";
            
            $i++;

          }
          ?>
          </div>
          </section>
          <?php
      }

    if (isset($_POST['Modifier']))
    {
      $login = $_POST['login'];
      $passe = password_hash($_POST["mdp"], PASSWORD_DEFAULT, array('cost' => 12));
      $requete2 = "UPDATE utilisateurs SET login = '$login', password = '$passe' WHERE login = '".$_SESSION['login']."'";
      $query2=mysqli_query($connexion,$requete2);
      session_unset();
      header("location:connexion.php?reconnect=1");
    }
  }
  else 
  {
  ?>
    <section id="notcon">
      <p>Veuillez vous connecter pour accéder à votre page !</p>
    </section>
        <?php
  }
?>
  </main>
  <?php include("../include/footer.php"); ?>
</body>
</html>

        
