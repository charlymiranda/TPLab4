<?php
require_once(ADMIN_VIEWS . 'nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Student Profile</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Name</th>
                         <th>Last Name</th>
                         <th>DNI</th>
                         <th>Birthday</th>
                         <th>File Number</th>
                         <th>Email</th>
                         <th>Phone Number</th>
                    </thead>
                    <tbody>

                         <?php
                         if (isset($this->userCompany)) {
                              echo  "<td>" . $this->userCompany->getFirstName() . "</td>";
                              echo  "<td>" . $this->userCompany->getLastName() . "</td>";
                              echo  "<td>" . $this->userCompany->getDni() . "</td>";
                              echo  "<td>" . $this->userCompany->getFileNumber() . "</td>";
                              echo  "<td>" . $this->userCompany->getEmail() . "</td>";
                              echo  "<td>" . $this->userCompany->getPhoneNumber() . "</tdv>";
                         }
                         ?>
                    </tbody>
          </div>

     </section>
</main>