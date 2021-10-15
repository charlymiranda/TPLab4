<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Student Profile</h2>

               <?php
                    if(isset($student))
                    {
                         echo  "<h4> Name: " . $student->getFirstName() . "</h4>";
                         echo  "<h4> Surname: " . $student->getLastName() . "</h4>";
                         echo  "<h4> DNI: " . $student->getDni() . "</h4>";
                         echo  "<h4> Gender: " . $student->getGender() . "</h4>";
                         echo  "<h4> Birthday: " . $student->getBirthDate() . "</h4>";
                         echo  "<h4> ID: " . $student->getFileNumber() . "</h4>";
                         echo  "<h4> Carreer: " . $student->getCareerId() . "</h4>";
                         echo  "<h4> Email: " . $student->getEmail() . "</h4>";
                         echo  "<h4> Phone Number: " . $student->getPhoneNumber() . "</h4>";
                    }
               ?>               
          </div>
     </section>
</main>