<?php
require_once('navcompany.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Job Offer</h2>               
               <form action="<?php echo FRONT_ROOT . "JobOffer/updateJobOffer" ?>" method="POST" class="bg-light-alpha p-5">
                    <div class="row">
                         <input type="hidden" name="jobOfferId" value="<?php echo $this->jobOffer->getJobOfferId(); ?>" />
                         <div class="col-lg-4">
                              <label for="">Name</label>
                              <input type="text" name="name" class="form-control" required value="<?php echo $this->jobOffer->getName(); ?>" />

                         </div>
                         <div class="col-lg-4">

                              <label for="">Start Day</label>
                              <input type="date" name="startDay" class="form-control" required value="<?php echo $this->jobOffer->getStartDay(); ?>" />

                         </div>

                         <div class="col-lg-4">

                              <label for="">Deadline</label>
                              <input type="date" name="deadline" class="form-control" required value="<?php echo $this->jobOffer->getDeadline(); ?>" />

                         </div>
                         <div class="col-lg-4">

                              <label for="">Description</label>
                              <textarea type="text" name="description" class="form-control" required value=""><?php echo $this->jobOffer->getDescription(); ?></textarea>

                         </div>
                         <div class="col-lg-4">

                              <label for="">Salary</label>
                              <input type="text" name="salary" class="form-control" required value="<?php echo $this->jobOffer->getSalary(); ?>" />

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
                    <button type="submit" name="" class="btn btn-primary ml-auto d-block">Save</button>
               </form>
          </div>

     </section>

</main>