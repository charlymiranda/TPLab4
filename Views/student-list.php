<?php
require_once(VIEWS_PATH . 'nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <form action="<?php echo FRONT_ROOT ?>Student/getAllStudents" method="GET" class="bg-light-alpha p-5">
               <div class="container">
               <?php if(isset($message)){ ?>
                    <label class="text-white" for=""> <strong> <?php echo $message ?> </strong> </label>
               <?php } ?>
                    <h2 class="mb-4">Students List</h2>
                    <table class="table bg-light-alpha">
                         <thead>
                              <th>Legajo</th>
                              <th>Apellido</th>
                              <th>Nombre</th>
                         </thead>
                         <tbody>
                              <?php
                              foreach ($studentList as $student) {
                              ?>
                                   <tr>
                                        <td><?php echo $student->getstudentId()?></td>
                                        <td><?php echo $student->getLastName() ?></td>
                                        <td><?php echo $student->getFirstName() ?></td>
                                   </tr>
                              <?php
                              }
                              ?>
                              </tr>
                         </tbody>
                    </table>
               </div>
          </form>
     </section>
</main>