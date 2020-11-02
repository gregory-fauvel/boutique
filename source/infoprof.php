
        
      <div id="formmodif" class="form-group">   
            <form name="loginform"  action="#" method="post" class="wpl-track-me"> 
                <p class="login-username">
                    <label for="user_login">Username</label> 
                    <input class="form-control" type="text" id="user_login" class="input" placeholder="New Username" value="<?php echo $data['login']?>" size="20" name="login"/> 
                </p> 
                <p class="login-password"> 
                    <label for="user_pass">Password</label>
                    <input class="form-control"  type="password" name="mdp" id="user_pass" class="input" placeholder="New Password" value="<?php echo $data['password']?>" size="20"/> 
                </p>    

                <p class="login-submit"><button class="btn btn-light" type="submit" name="Modifier" id="submit">Modifier</button>
                <input type="hidden" name="redirect_to" value="#"/>
                </p>  
           </form>

      </div>
         
         <div id="info-prof">
          <h1>Infos Personelles</h1><br>
          <p class="profform">Nom: <?php echo $data['nom']?></p>
          <p class="profform">Prénom: <?php echo $data['prenom']?></p>
          <p class="profform">Adresse: <?php echo $data['adresse']?></p>
          <p class="profform">Code Postal: <?php echo $data['codepostal']?></p>
          <p class="profform">Mail: <?php echo $data['email']?></p>

        </div>
