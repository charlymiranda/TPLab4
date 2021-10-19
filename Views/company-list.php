<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Students List</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Legajo</th>
                         <th>Apellido</th>
                         <th>Nombre</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($companyList as $company)
                              {
                                   ?>
                                        <tr>
                                             
                                             <td><?php echo $company->getLastName() ?></td>
                                             <td><?php echo $company->getFirstName() ?></td>
                                        </tr>
                                   <?php
                              }
                         ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>