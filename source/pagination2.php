<?php

// bdd
$arpage = 6;
$requete1 = ('SELECT count(id) FROM commande');
$query=mysqli_query($connexion,$requete1);
$resu=mysqli_fetch_all($query);

$pagetotal= ceil($resu[0][0]/$arpage);

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0)
{
    $_GET['page'] = intval($_GET['page']);
    $pagecourante = $_GET['page'];

}
else {
   $pagecourante = 1;
}

$depart = ($pagecourante-1)*$arpage;

?>