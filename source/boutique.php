<?php session_start();

?>
<html>
<head>
    <title>Boutique</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href= "../css/boutique.css">
</head>
<body id="boutique">
    <header id="headerindex">
    <div id="logo">
    <img width="200" height="100" src="../upload/logo.png">
    <p style="text-align:center">Greg & Antho</p>
    </div>
     <?php  include("../include/bar-nav.php");?>
</header>
        <main id="corpboutique">
      
            <!-- RECHERCHE PRODUITS -->
            <br><br>
            <section id="formulaire">
                <div id="form-group">
                    <form name="recherche" method="get">
                        <h1 style="color: white;">Rechercher votre produit</h1>
                        <input class="form-control" id="rech" type="search"  name="bs"
                        aria-label="rechercher par titre">
                        <br><button class="btn btn-success" name="recheb">Recherche</button> 
                    </form>
                
            <?php
            if (isset($_GET['recheb']))
            {
                $bs=$_GET['bs'];
                 $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', );
                 $resultatb = $bdd->query("SELECT * FROM produits WHERE nomproduit LIKE '$bs'")->fetchAll();

                if (!empty($bs) and !empty($bs) == (isset($resultatb[0][1])))
                    {
                        echo "<h1 style='color:white;'>Voici résultat de votre recherche !!</h1>";
                        foreach($resultatb as $data6)
                            {
                                $j=0;
                                $did=$data6[0];
                                $img=$data6[4];
                                $dnp=$data6[1];
                                echo" <div class=\"card\">";
                                echo "<h1><b>$dnp</b></h1>";
                                echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";
                                echo "<p class=\"p_b\">{$data6[3]}</p>";
                                echo "<p class=\"p_b\">{$data6[2]}</p>";
                                echo "</div>";
                                $j++;
                    }
                }
            else    {
                        echo "Aucun résultat !!";
                    }
            }
            ?>
            </div>

            <!-- SOUS-CATEGORIE -->


           
         
    </section>
    <section id="contboutique">
        <h1>Notre boutique</h1>
          <?php echo "<div id='pag'>";
                include("../source/pagination.php");
            $pagetotal= ceil($resu[0][0]/$arpage);
            for ($i=1;$i <=$pagetotal;$i++){
                echo '<a id=lien href="boutique.php?page='.$i.'">'.$i.'/</a> ';
            }
                echo "</div>";
                ?>
        <div id="contcard">
                 <?php
            include("../source/pagination.php");
            $bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', );
            $requete6 = $bdd->query('SELECT * FROM produits ORDER BY id DESC limit '.$depart.','.$arpage.'')->fetchAll();
            foreach ($requete6 as $data)
           {
                $p=0;
                $did=$data['id'];
                $img=$data['image'];
                $dnp=$data['nomproduit'];
                echo" <div class=\"card\">";
                echo "<h1><b>$dnp</b></h1>";
                echo "<a href=\"produit.php?p=$did\"><img class=\"imagebout\" src=\"../upload/$img\"></a>";
                echo "<p><b>{$data['description']}</b></p>";
                echo "<p><b>Prix:{$data['prixproduit']}€</b></p>";
                echo "</div>";
                $p++;

            }
// categoerie
            ?>
            </div>
        </section>
            </main>
<?php include("../include/footer.php");?>
</body>
</html>