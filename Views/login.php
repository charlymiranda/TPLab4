<?php
 include('Views/header.php');

  ?>

     <main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center">

              <img src="Views/img/Lets.png" width="400" height="141" alt=""/>
        
                    <h2>  Login </h2>
               </header>
                   

               <form action='Home/login' method="post" class="login-form  p-4 bg-none">
              <p><?php if(isset($message)){ echo $message; }?></p>
                   
                    <div class="form-group">
                         <label for="" align="center">E-mail</label>
                         <input type="email" name="username" class="form-control form-control-lg" placeholder="User required" requied>
                    </div>
                    <div class="form-group">
                         <label for="">Password</label>
                         <input type="password" name="password" class="form-control form-control-lg" placeholder="Password required" requied>
                    </div>
                    <br>
                    </br>
                    <center>
                    <button class="btn btn-warning btn-block btn-lg " type="submit">Session Start</button>
                    </center>     
               </form>
          </div>
     </main>

<?php
 include('Views/footer.php')
?>
