
        
      <div id="main" class="container">   
            <form name="loginform" id="loginform" action="#" method="post" class="wpl-track-me"> 
                <p class="login-username">
                    <label for="user_login">Username</label> 
                    <input type="text" id="user_login" class="input" placeholder="New Username" value="<?php echo $data['login']?>" size="20" name="login"/> 
                </p> 
                <p class="login-password"> 
                    <label for="user_pass">Password</label>
                    <input type="password" name="mdp" id="user_pass" class="input" placeholder="New Password" value="<?php echo $data['password']?>" size="20"/> 
                </p>    

                <p class="login-submit"><input type="submit" name="Modifier" id="submit" class="button-primary" value="Modifier" />
                    <input type="hidden" name="redirect_to" value="#"/>
                </p>  
           </form>

      </div>
         <div id="ifp">
            <h1>Info Personel</h1><br>
        </div>

         <div id="info-prof">

           
          
          <p class="profform">Nom: <?php echo $data['nom']?></p>
          <p class="profform">Prenom: <?php echo $data['prenom']?></p>
          <p class="profform">Adress: <?php echo $data['adresse']?></p>
          <p class="profform">Code Postale: <?php echo $data['codepostal']?></p>
          <p class="profform">Email: <?php echo $data['email']?></p>

        </div>