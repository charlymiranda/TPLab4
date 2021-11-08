<?php
use Utils\Utils;

Utils::checkNav();
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Ver Empresa</h2>
               <form action="<?php echo FRONT_ROOT . "Company/updateCompany" ?>" method="POST" class="bg-light-alpha p-5">
                    <div class="row">
                         <input type="hidden" name="companyId" value="<?php echo $this->company->getCompanyId(); ?>" />
                         <div class="col-lg-4">
                              <label for="">Name</label>
                              <input type="text" name="name" class="form-control" required value="<?php echo $this->company->getName(); ?>" />

                         </div>
                         <div class="col-lg-4">

                              <label for="">Año de Fundacion</label>
                              <input type="date" name="yearFoundation" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>" class="form-control" required value="<?php echo $this->company->getYearFoundation(); ?>" />

                         </div>

                         <div class="col-lg-4">

                              <label for="">Ciudad</label>
                              <input type="text" name="city" class="form-control" required value="<?php echo $this->company->getCity(); ?>" />

                         </div>
                         <div class="col-lg-4">

                              <label for="">Descripcion</label>
                              <textarea type="text" name="description" class="form-control" required value=""><?php echo $this->company->getDescription(); ?></textarea>

                         </div>
                         <div class="col-lg-4">

                              <label for="">Email</label>
                              <input type="email" name="email" class="form-control" required value="<?php echo $this->company->getEmail(); ?>" />

                         </div>
                         <div class="col-lg-4">

                              <label for="">Telefono</label>
                              <input type="number" name="phoneNumber" class="form-control" required value="<?php echo $this->company->getPhoneNumber(); ?>" />

                         </div>
                         <div class="col-lg-4">
                              <labelfor="">Cuit</label>
                                   <input type="text" name="cuit" class="form-control" required value="<?php echo $this->company->getCuit(); ?>" />
                         </div>

                         <div class="col-lg-4">

                              <label for="">Logo</label>
                              <input type="file" name="logo" class="form-control" value="null">

                         </div>
                    </div>
                    <button type="submit" name="" class="btn btn-primary ml-auto d-block">Save</button>
               </form>
          </div>

     </section>

</main>