<?php
    require_once('navcompany.php');
    include('Views/header.php');
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Company</h2>
               <form action="<?php echo FRONT_ROOT ?>Company/AddCompany" method="POST" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="name" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Year Foundation</label>
                                   <input type="date" name="yearFoundation" value="" min= "1960-01-01" max="2021-10-15" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">City</label>
                                   <input type="text" name="city" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Description</label>
                                   <input type="text" name="description" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Email</label>
                                   <input type="mail" name="email" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Phone Number</label>
                                   <input type="number" name="phoneNumber" value="" class="form-control">
                              </div>
                         </div>

                          <!--<div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Logo</label>
                                   <input type="file" name="logo" value="" class="form-control">
                              </div>
                         </div>-->
                    </div>
                    <button type="submit" name="" class="btn btn-dark ml-auto d-block">Add</button>
                    <?php

echo '<script>';
     echo 'alert("Company SUCCESFULLY added)';
     echo 'Company/AddCompany';
echo '</script>';

?>
               </form>
          </div>
     </section>
</main>
