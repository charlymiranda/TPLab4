<?php
//require_once(VIEWS_PATH."header.php");

  ?>

     <main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center">

              <img src="Views/img/Lets.png" width="400" height="141" alt=""/>
        
                    <h2> LOGIN ADMIN </h2>
                    <p><?php if(isset($message)){ echo $message; }?></p>
               </header>
                   

               <form action="<?php echo FRONT_ROOT.'Home/login'?>" method="post" class="login-form  p-4 bg-none">
              
              <center>
                   
                   <nav>
                   <a class="link" href="<?php echo FRONT_ROOT ?>Views/login-student.php">Login Student</a>
                    </nav>    
               </center>
                    
                   
                    <div class="form-group">
                         <label for="" align="center">E-mail</label>
                         <input type="email" name="username" class="form-control form-control-lg" placeholder="User required" required>
                    </div>
                    <div class="form-group">
                         <label for="">Password</label>
                         <input type="password" name="password" class="form-control form-control-lg" placeholder="Password required" required>
                    </div>
                  
                    <center>
                    <button class="btn btn-warning btn-block btn-sm " type="submit">Session Start</button>
                    </center>     
               </form>
          </div>
     </main>
     
