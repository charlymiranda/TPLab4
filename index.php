<?php
 include('header.php');
  ?>

     <main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <header class="text-center">
                    <h2>Lets Work</h2>
               </header>
               <form action="index_action.php" method="post" class="login-form bg-dark-alpha p-5 bg-light">
               <p><?php if(isset($message)){ echo $message; }?></p>
                    <div class="form-group">
                         <label for="">Usuario</label>
                         <input type="email" name="username" class="form-control form-control-lg" placeholder="Ingresar usuario" requied>
                    </div>
                    <div class="form-group">
                         <label for="">Contraseña</label>
                         <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña" requied>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
               </form>
          </div>
     </main>

<?php
 include('footer.php')
?>
