<?php

    session_start();

$bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
if (!isset($_SESSION["login"])) {
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/boutique.css">
</head>
<body id="inscription">
    <header id="headerindex">
    <div id="logo">
    <img width="200" height="100" src="../upload/logo.png">
    <p style="text-align:center">Greg & Antho</p>
    </div>
     <?php  include("../include/bar-nav.php");?>
</header>
    <main id="inscriptionmain">       
      <div id="forminsc" class="form-group">
         <h1 class="titre"><b>Inscription</b></h1>
        <form  method='POST' action='inscription.php'>
                <label><b>Login</b></label>
                <input class="form-control" type="text" name='login' required />
                <label><b>Nom</b></label>
                <input class="form-control" type="text" name='nom' required />
                <label><b>Prénom</b></label>
                <input class="form-control" type="text" name='prenom' required />
                <label><b>Mot de passe</b></label>
                <input class="form-control" type="password" name='mdp1' required />
                <label><b> Confirmation de mot de passe</b></label>
                <input class="form-control" type="password" name='mdp2' required />
                <label><b> Votre adresse</b></label>
                <input class="form-control" type="text" name='adresse' required />
                <label><b> Votre code postal</b></label>
                <input class="form-control" type="number" name='code' required />
                <label><b> Votre Email</b></label>
                <input class="form-control" type="email" name='email' required />
                <br>
                <button class="btn btn-success" name="inscription">Inscription</button>

            <?php

        if (isset($_POST['inscription']))
       {
            $login = htmlspecialchars($_POST['login']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
            $adresse = htmlspecialchars($_POST['adresse']);
            $code = htmlspecialchars($_POST['code']);
            $email = htmlspecialchars($_POST['email']);
            if ($_POST['mdp1']==$_POST['mdp2'])
            {
            $resultat = $bdd->query("SELECT* FROM utilisateurs WHERE login='".$login."'")->fetchAll();
            $trouve=false;
            foreach ($resultat as $key => $value) 
            {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Login déja existant!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
            $sql = $bdd->prepare("INSERT INTO utilisateurs (login,nom,prenom,password,adresse,codepostal,email)
                VALUES ('$login','nom','prenom','$mdp','$adresse','$code','$email')")->execute();
            header('location:connexion.php');
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           }
        }

    ?>
        </form>
    </div>
    <?php
    }
    else 
    {
    ?>
    <section id="notcon">
      <p>Vous êtes déjà connecté impossible de s'inscrire !!</p>
    </section>
        <?php
    }
    ?>


   </main>
<?php include('../include/footer.php');?>

</body>

</html>