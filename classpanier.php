<?php


   
 
     function creationPanier($id_utilisateurs)
    

      $id=$_GET['id'];      
      $id_utilisateurs=$_SESSION['id'];
      $connexion = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
      $rep= $connexion->query("SELECT * FROM commande WHERE id_utilisateur = ".$_SESSION['id']."");
      var_dump($rep);
   
    //var_dump($tab);


      
      $rep2= $connexion->query("SELECT nomproduit,description,image,categories,souscategories,quantiteproduit,datepanier,prixproduit,prixtotal,id_produit FROM `panier` INNER JOIN `produits`ON id_produit = produits.id  WHERE id_utilisateur = ".$_SESSION['id']."");
      //var_dump($rep2);
      $tab = $rep->fetchAll();
       
          $test = $rep->fetchAll();
     
      
            return $test;
    }





   public function supprimePanier()
  {
   unset($test);
  }


   public function MontantGlobal($quantiteproduit,$id_produit,$prix_total)
   {
   $total=0;
   var_dump($test[1]);
   for($j = 0; $j < count($test[1]); $j++)
   {
      $total = $values[3][$j] * $values[8][$j];
   }
   return $total;
  }


 

 

?>



   	
