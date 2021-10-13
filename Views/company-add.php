<?php
    require_once('navcompany.php');
    include('Views/header.php');
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Company</h2>
               <form action="<?php echo FRONT_ROOT ?>Company/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="Name" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Year Fundation</label>
                                   <input type="number" name="Year of Fundation" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">City</label>
                                   <input type="text" name="City" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Description</label>
                                   <input type="text" name="Description" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Email</label>
                                   <input type="mail" name="Email" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Phone Number</label>
                                   <input type="number" name="Phone" value="" class="form-control">
                              </div>
                         </div>

                         <!-- <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Logo</label>
                                   <input type="img" name="Logo" value="" class="form-control">
                              </div>
                         </div>-->
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Add</button>
               </form>
          </div>
     </section>
</main>