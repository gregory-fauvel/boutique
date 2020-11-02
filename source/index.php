<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil - Boutique </title>
    <link rel="stylesheet" href="../css/boutique.css">
</head>
<header id="headerindex">
    <div id="logo">
    <img width="200" height="100" src="../upload/logo.png">
    <p style="text-align:center">Greg & Antho</p>
    </div>
     <?php  include("../include/bar-nav.php");?>
</header>

<body id="bodind">
                <div id ="photoind">
                <img style="width: 80%;height: 500px;" src="../upload/theindex.jpg">
                </div>
                     <div class="photoind">
                        <div id="encadrindex">
                           <h1 class="titre"> Présentation du site</h1>
                            <p class="text">Bonjour !!<br>Bienvenue sur notre site de vente en ligne sur le thème du thés et téières.<br>Ce site a été imaginé pour vous les fans de thé qui ont pas le temps de chercher en boutique le thé qui vous conviennent</p>

                           <h1 class="titre">Les origines du thé</h1>
                            <p class="text">Le thé appartient à la famille du Camelia Sinensis. La Chine est le berceau de cette plante, c'est également là-bas que naquit l'usage des feuilles comme base de boisson. La première trace écrite du thé remonte à deux cents ans avant Jésus-Christ, où le thé est cité dans un traité de pharmacologie.</p>
                      
                         <h1 class="titre">Ses biens faits</h1>
                            <p class="text">Après l’eau, le thé est de loin la boisson la plus bue dans le monde. On lui prête de nombreuses vertus pour la santé, et ce, depuis des millénaires.
                            Sur ce plan, deux tasses de thé vaudraient sept verres de jus d'orange, trois verres et demi de jus de cassis, ou six pommes. Petite astuce pour bénéficier encore plus des vertus des antioxydants : ajouter du citron ! Pour les scientifiques, c'est une bonne idée, car le citron empêche certains antioxydants du thé, les catéchines, d'être détruits lors de leur passage dans le système digestif. Du coup, ils sont mieux assimilés par l'organisme. Mais, pour les puristes, ça tue le goût. </p>
                            </div>
                        </div>
    <main id="mainindex">
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
         ?>
        <div class="titreI"> 
        <div id="encadrindex">
            <h1 class="titre">Les top 4 des dernières nouveautés</h1>
            <div id="photorec">
                     <?php
                     $requete1 = $bdd->query("SELECT * FROM produits ORDER BY datecreation DESC LIMIT 4");
                    $data1 = $requete1->fetchAll();
                     foreach ($data1 as $data) 
                                     {
                                        $i=0;
                                        $did = $data['id'];
                                        $img = $data['image'];
                                        $dnp = $data['description'];
                                        echo" <div class=\"indexp\">";
                                        echo "<a href=\"produit.php?p=$did\">
                                        <img height='150' width='150' class=\"imagebout\" src=\"../upload/$img\"</img></a>";
                                        echo "</div>";
                                        $i++;                                
                                    }
                            ?>
           </div>
                             <h1 class="titre">Les Stats Du Site</h1>
                            <?php 
                            $requete1 = $bdd->query("SELECT count(id) FROM utilisateurs")->fetchAll();
                            $requete2 = $bdd->query("SELECT count(id) FROM produits")->fetchAll();
                            $requete3 = $bdd->query("SELECT count(*) FROM commande")->fetchAll();?>
                                     <p class="text">Il y a actuellement : <?php echo $requete1[0][0]?> personnes inscrites sur votre site !<br>
                                    <br>Pour un total de : <?php echo $requete2[0][0]?> articles pour vous satisfaire !<br>
                                    <br>Nos utilisateurs ont commandés : <?php echo $requete3[0][0]?> acticles !<br>
                                    <br>Pourquoi pas vous ?</p>
                  
        </div>
        </div>
              <div class="titreI"> 
                <div id="encadrindex">
                    <h1 class="titre">Présentation des produits</h1> 
                    <p class="text">On est fier de vous présenter nos produits de la plus grande qualité à petit prix.</p>
                    <p class="text">Soyez prêts à tout instant avec nos thés frais et nos théières artisanales pour inviter vos amis.</p>
                            <section class="slider">
                                    <div class="slides">
                                        <div class="slide"><img height="300" width="500" class="defilé" src="../upload/theiere1.jpg"></div>
                                        <div class="slide"><img height="300" width="500" class="defilé" src="../upload/thenoir.jpg"></div>
                                        <div class="slide"><img height="300" width="500" class="defilé" src="../upload/theiere1.jpg"></div>
                                        <div class="slide"><img height="300" width="500" class="defilé" src="../upload/the5.jpg"></div>
                                        <div class="slide"><img height="300" width="500" class="defilé" src="../upload/theindex.jpg"></div>
                                    </div>      
                                      
                            </section>
                              </div>
                        </div>

        
            
       </main>
     <?php include("../include/footer.php"); ?>
  </body>
</html>