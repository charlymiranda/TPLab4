<?php
require_once('header.php');
?>
<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <section class="text-center">

          <img src="<?php echo IMG_PATH ?>Lets.png" width="400" height="141" alt="" />

               <h2> STUDENT REGISTRATION </h2>

               <p> Por razones de seguridad se confirmará que su mail este cargado en la Base de Datos de la Universidad  </p>
          </section>
          
          <form action='<?php echo FRONT_ROOT ?>student/studentValidation' method="post" class="login-form  p-4 bg-none">


               <div class="form-group">
                    <label for="" align="center">E-mail</label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email required" required>
               </div>
               
               <center>
                    <button class="btn btn-warning btn-block btn-sm" type="submit">Check Mail</button>
               </center>

               
          </form>
     </div>
</main>