<?php
       require_once('header.php');
        ?>
     <main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center">
               
              <img src= VIEWS_PATH/img/Lets.png width="400" height="141" alt=""/>
        
                    <h2>  STUDENT LOGIN </h2>
                    <p><?php if(isset($message)){ echo $message; }?></p>
               </header>
                   

               <form action="Student/getStudent" method="get" class="login-form  p-4 bg-none">
                                         
                   
                    <div class="form-group">
                         <label for="" align="center">E-mail</label>
                         <input type="email" name="username" class="form-control form-control-lg" placeholder="User required" required>
                    </div>
                                    
                    <center>
                    <button class="btn btn-warning btn-block btn-sm " type="submit">Session Start</button>
                    </center>     
               </form>
          </div>
     </main>
     
   