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
                                        <div class="form-group">
                                             <label for="">Name</label>
                                             <input type="text" name="name" value ="<?php echo $this->company->getName(); ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="form-group">
                                             <label for="">Año de Fundacion</label>
                                             <input type="text" name="yearFoundation" value="<?php echo $company->getYearFoundantion(); ?>">
                                        </div>
                                   </div>

                                   <div class="col-lg-4">
                                        <div class="form-group">
                                             <label for="">Ciudad</label>
                                             <input type="text" name="city" value="<?php echo $company->getCity(); ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="form-group">
                                             <label for="">Descripcion</label>
                                             <textarea type="text" name="description" value="<?php echo $company->getDescription(); ?>"></textarea>
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="form-group">
                                             <label for="">Email</label>
                                             <input type="email" name="email" value="<?php echo $company->getEmail(); ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="form-group">
                                             <label for="">Telefono</label>
                                             <input type="number" name="phoneNumber" value="<?php echo $company->getPhoneNumber(); ?>">
                                        </div>
                                   </div>
                              </div>
                              <button type="submit" name="modify-company-button" class="btn btn-primary ml-auto d-block">Guardar</button>
                         </form>
                    </div>

     </section>

</main>