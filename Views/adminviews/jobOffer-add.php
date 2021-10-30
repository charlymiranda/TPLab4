<?php
    require_once(ADMIN_VIEWS.'navcompany.php');
 
?>

<main class="py-5">
     <section id="list" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Job Offer</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/addJobOffer" method="POST" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="name" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Start Day</label>
                                   <input type="date" name="Inital Date" value="" min= "2021-10-25" max="2021-10-30" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Deadline</label>
                                   <input type="date" name="Inital Date" value="" min= "2021-10-30" max="2021-11-15" class="form-control">
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
                                   <label for="">Salary</label>
                                   <input type="number" name="salary" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Career</label>
                                   <input type="text" name="career" value="" class="form-control">
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
     echo 'alert("job Offer SUCCESFULLY added)';
     echo 'jobOffer/ addJobOffer';
echo '</script>';

?>
               </form>
          </div>
     </section>
</main>
