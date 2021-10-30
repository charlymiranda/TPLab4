<?php
require_once('navcompany.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Ver Empresa</h2>
               <form action="<?php echo FRONT_ROOT . "Company/updateCompany" ?>" method="POST" class="bg-light-alpha p-5">
                    <div class="row">
                         <div class="col-lg-4">

                              <label for="">Name</label>
                              <input type="text" name="name" class="form-control" value="<?php echo $this->company->getName(); ?>"/>

                         </div>
                         <div class="col-lg-4">

                              <label for="">Año de Fundacion</label>
                              <input type="date" name="yearFoundation" class="form-control" value="<?php echo $this->company->getYearFoundation(); ?>"/>

                         </div>

                         <div class="col-lg-4">

                              <label for="">Ciudad</label>
                              <input type="text" name="city" class="form-control" value="<?php echo $this->company->getCity(); ?>"/>

                         </div>
                         <div class="col-lg-4">

                              <label for="">Descripcion</label>
                              <textarea type="text" name="description" class="form-control" value=""><?php echo $this->company->getDescription(); ?></textarea>

                         </div>
                         <div class="col-lg-4">

                              <label for="">Email</label>
                              <input type="email" name="email" class="form-control" value="<?php echo $this->company->getEmail(); ?>"/>

                         </div>
                         <div class="col-lg-4">

                              <label for="">Telefono</label>
                              <input type="number" name="phoneNumber" class="form-control" value="<?php echo $this->company->getPhoneNumber(); ?>"/>

                         </div>
                    </div>
                    <button type="submit" name="modify-company-button" class="btn btn-primary ml-auto d-block">Guardar</button>
               </form>
          </div>

     </section>

</main>