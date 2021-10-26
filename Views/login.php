<main class="d-flex align-items-center justify-content-center height-100">


     <section >
          <div class=" content">
          <header class="text-center">

               <img src="<?php echo IMG_PATH ?>Lets.png" width="400" height="141" alt="" />

               <h2 class="text-center"> Login </h2>
          </header>


          <form action='<?php echo FRONT_ROOT ?>Home/login' method="post" class="login-form  p-4 bg-none">
               <p><?php if (isset($message)) {
                         echo $message;
                    } ?></p>

               <div class="form-group">
                    <label for="" align="center">E-mail</label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="User required" required>
               </div>

               <div class="form-group">
                    <label for="" align="center">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password required" required>
               </div>

               <center>
                    <button class="btn btn-warning btn-block " type="submit">Session Start</button>
               </center>
              
          </form>

          <div>
               <form action="<?php echo FRONT_ROOT ?>Student/ShowStudentRegistration" method="get" class="login-form  p-2 bg-none">
                    <center>
                         <button class="btn btn-info" type="submit">Registration</button>
                    </center>
               </form>
          </div>

          </div>
     </section>
    

</main>