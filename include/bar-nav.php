
  <?php

    if (isset($_SESSION['login'])==false)
    {
    ?>
  

  <nav class="menu">
  <ol>
    <li class="menu-item"><a href="index.php">Home</a></li>
    <li class="menu-item"><a href="connexion.php">Connexion</a></li>
    <li class="menu-item"><a href="inscription.php">Inscription</a>
     <li class="menu-item"><a href="boutique.php">Boutique</a></li>
    
  </ol>
</nav>

    
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="admin")
       {
       
    ?>
    <nav class="menu">
      <ol>
        <li class="menu-item"><a href="index.php">Home</a></li>
        <li class="menu-item"><a href="profil.php">Profil</a></li>
        <li class="menu-item"><a href="boutique.php">Boutique</a></li>
        <li class="menu-item"><a href="panier.php">Panier</a></li>
        <li class="menu-item"><a href="index.php?deconnexion=true">Déconnexion</a>
        <li class="menu-item"><a href="admin.php">Administrateur</a></li>
      </ol>
    </nav>
 
     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:index.php");
                   }
                }
     
    }
    else
    {   
    ?>
    <nav class="menu">
      <ol>
        <li class="menu-item"><a href="index.php">Home</a></li>
        <li class="menu-item"><a href="profil.php">Profil</a></li>
        <li class="menu-item"><a href="boutique.php">Boutique</a></li>
        <li class="menu-item"><a href="panier.php">Panier</a></li>
        <li class="menu-item"><a href="index.php?deconnexion=true">Déconnexion</a>
     
      </ol>
    </nav>
 
     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:index.php");
                   }
                }
    
    }
      
  }
             
    ?>