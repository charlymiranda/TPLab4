<?php
 //include('Views/header.php');

  ?>

     <main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center">
              
              <img src="Views/img/Lets.png" width="400" height="141" alt=""/>
        
                    <h2 class="text-center" >  Login </h2>
               </header>
                   

               <form action='Home/login' method="post" class="login-form  p-4 bg-none">
              <p><?php if(isset($message)){ echo $message; }?></p>
                   
                    <div class="form-group">
                         <label for="" align="center">E-mail</label>
                         <input type="email" name="email" class="form-control form-control-lg" placeholder="User required" requied>
                    </div>
                   
                    <br>
                    </br>
                    <center>
                    <button class="boton cuatro btn btn-warning btn-block " type="submit">Session Start</button>
                    </center>     
               </form>
          </div>
     </main>

<?php
 //include('Views/footer.php')
?>
