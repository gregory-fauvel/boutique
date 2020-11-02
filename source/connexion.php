<?php
    session_start();
    $ismdpwrong = false;
    $isIDinconnu = false;
    $ischampremplis = false;

    if ( isset($_POST['connexion']) == true && isset($_POST['login']) && strlen($_POST['login']) != 0 && isset($_POST['password']) && strlen($_POST['password']) != 0 ) {
        $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
        $resultat = $bdd->query("SELECT * FROM utilisateurs WHERE login ='".$_POST['login']."'")->fetchAll();
        if ( !empty($resultat) ) {
            if ( password_verify($_POST['password'], $resultat[0][4]) )
                    {
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['rank'] = $resultat[0][5];
                        $_SESSION['id'] = $resultat[0][0];
                        $_SESSION['password'] = $_POST['password'];
                        header('Location:index.php');
                    }
            else {
                $ismdpwrong = true;
            }
        }
        else {
            $isIDinconnu = true;
        }
        mysqli_close($connexion);
    }
    elseif ( isset($_POST['connexion']) == true && isset($_POST['login']) && strlen($_POST['login']) == 0 || isset($_POST['password']) && strlen($_POST['password']) == 0 ) {
        $ischampremplis = true;
    }

?>

<!DOCTYPE html>

<html>
<head>
    <title>boutique - Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/boutique.css">
    <meta charset="utf-8">
</head>
<body id="connexionbody">
    <header id="headerindex">
    <div id="logo">
    <img width="200" height="100" src="../upload/logo.png">
    <p style="text-align:center">Greg & Antho</p>
    </div>
     <?php  include("../include/bar-nav.php");?>
</header>
<main id="maincon">
   
    
  
                <?php
                if ( !isset($_SESSION['login']) ) {
                    ?>
                
                     <section class="form-group" id="forminsc2">
             <h1 class="titre"><b>Connexion</b></h1>
                    <form method="post" action="connexion.php">
                            <label><b>Identifiant</b></label><br>
                            <input type="text" name="login"/><br>
                            <label><b>Mot de passe</b></label><br>
                            <input type="password" name="password"/>
                            <br>
                            <br>
                            <button class="btn btn-success" name="connexion">Connexion</button>
                        
                    </form>
                    <?php
                    if ( $ismdpwrong == true ) {
                    ?>
                        <p class="pincorrect">Identifiant ou mot de passe incorrect.</p>
                    <?php
                    }
                    elseif ( $isIDinconnu == true ) {
                    ?>
                        <p class="pincorrect">Cet identifiant n'exsite pas.</p>
                    <?php
                    }
                    elseif ( $ischampremplis == true ) {
                    ?>
                        <p class="pincorrect">Merci de remplir tous les champs!</p>
                    <?php
                    }
                    ?>
                    
                <?php
                }

                elseif ( isset($_SESSION['login']) ) {
                ?>
                    <center><p>ERREUR<br />
                    Vous êtes déjà connecté !</p></center>
            
                <?php
                }
                ?>
        </section>


         <div class="slider2"> 
   <ul id="slider-list2"> 
      <li> 
          <img src="https://i-reg.unimedias.fr/sites/art-de-vivre/files/styles/large/public/r_tasse-the_istock.jpg?auto=compress%2Cformat&crop=faces%2Cedges&cs=srgb&fit=crop">
      </li> 
      <li> 
          <img src="https://vegan-pratique.fr/wp-content/uploads/2018/08/the-menthe-marocain-580x387.jpg">
      </li> 
      <li> 
         <img src="https://cdn.bioalaune.com/img/article/thumb/900x500/10267-tasse_de_the.jpg">
      </li> 
  </ul>
 </div> 
    
       </main>
        
            <?php include("../include/footer.php"); ?>
               
    </body>
</html>