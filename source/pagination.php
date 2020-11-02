<?php
$bdd = new PDO('mysql:host=localhost;dbname=boutique', 'root', );
$resu = $bdd->query('SELECT count(id) FROM produits')->fetchAll();
$arpage = 8;
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