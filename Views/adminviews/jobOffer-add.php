<?php
require_once(ADMIN_VIEWS . 'navcompany.php');

?>

<main class="py-5">
     <section id="list" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Job Offer</h2>
               <h3>Company Selected: <?php echo $this->company->getName();?></h3>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/addJobOffer" method="POST" class="bg-light-alpha p-5">
                    <div class="row">
                    <input type="hidden" name="companyId" value="<?php echo $this->company->getCompanyId(); ?>" />
                       
                         <div class="col-lg-4">
                              <label for="">Name</label>
                              <input type="text" name="name" value="" class="form-control">
                         </div>

                         <div class="col-lg-4">

                              <label for="">Start Day</label>
                              <input type="date" name="startDay" value=""  class="form-control">

                         </div>
                         <div class="col-lg-4">

                              <label for="">Deadline</label>
                              <input type="date" name="deadline" value=""  class="form-control">

                         </div>

                         <div class="col-lg-4">

                              <label for="">Description</label>
                              <input type="text" name="description" value="" class="form-control">

                         </div>
                         <div class="col-lg-4">

                              <label for="">Salary</label>
                              <input type="number" name="salary" value="" class="form-control">

                         </div>

                         <div class="col-lg-10">
                              <?php
                              echo "<select name='careerId' autofocus class='form-control'>";
                              if (isset($this->careerList)) {
                                   foreach ($this->careerList as $career) {
                                        echo "<option value=" . $career->getCareerId() . ">" . $career->getDescription() . "</option>";
                                   }
                              }
                              echo "</select>";

                              ?>
                         </div>

                         <div class="col-lg-10">
                              <?php
                              echo "<select name='jobPositionId' autofocus class='form-control'>";
                              if (isset($this->jobPositionList)) {
                                   foreach ($this->jobPositionList as $jobPosition) {
                                        echo "<option value=" . $jobPosition->getJobPositionId() . ">" . $jobPosition->getDescription() . "</option>";
                                   }

                                   echo "</select>";
                              } ?>
                         </div>
                    </div>
                    <button type="submit" name="" class="btn btn-dark ml-auto d-block">Add</button>

               </form>
          </div>
     </section>
</main>
<br><br><br><br><br><br>