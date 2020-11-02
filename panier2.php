<?php
session_start();

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p est un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($values[7][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}


 include("bar-nav.php");
 include("classpanier.php");
 	
?>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="boutique.css">
	<title></title>
</head>
<body>


 			<h1>Votre panier</h1>

			<form method="post" action="panier.php">
			<table style="width: 400px">
    
    							<tr>
      								<th>Nom produit</th>
									<th>Prix</th>
									<th>Description</th>
									<th>Image</th>
									<th>Catégories</th>
									<th>Sous Catégories</th>
									<th>Date de la commande</th>
									<th>Quantité du produits</th>
									<th>Prix total</th>
   								 </tr>
   							 <?php
								$test=new Panier();
								$id_utilisateurs=$_SESSION['login'];
								$id=$_GET['id'];
								$test=new Panier();
								
										foreach ($test->creationPanier($id_utilisateurs) as $values)
										{
								//var_dump($test->creationPanier($id_utilisateurs));
								$nbArticles=count($values);
						        if (empty($test->creationPanier($id_utilisateurs))) {
						        echo "<td>Votre panier est vide</td>";
						    	 }
						    	 
						        else {

     
          						for ($i=0 ;$i < $nbArticles ; $i++)

          						{
          	     					 $total = $values[7] * $values[1];
          							echo "<tr>";
          							echo "<td>".$values[0]."</td>";
									echo "<td>".$values[1]."</td>";
									echo "<td>".$values[2]."</td>";
									echo "<td><img heigh=150px width=150px src=\"upload/".$values[3]."\"></td>";
									echo "<td>".$values[4]."</td>";
									echo "<td>".$values[5]."</td>";
									echo "<td>".$values[6]."</td>";
									echo "<td><input type=\"submit\" name=\"plus\" value=\"+\"/>";
									echo "".$values[7]."";
									echo "<input type=\"submit\" name=\"moins\" value=\"-\"/></td>";
									echo "<td>".$total."</td>";
									echo "</tr>";
         						 }
      						 }
    
						    ?>
						</table>
						</form>
						<?php
						}

    							
            		?>	

	</body>
</html>