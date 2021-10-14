<?php
require_once('nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
    
          <div class="container">
               <h2 class="mb-4">Listado de Alumnos</h2>
               
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Apellido</th>
                         <th>Legajo</th>
                         <th>Carrera</th>
                         <th>Ver</th>

                    </thead>
                    <tbody>
                         <?php
                         if (isset($this->studentList)) {
                              foreach ($this->studentList as $student) {
                                   echo  "<tr>";
                                   echo  "<td>" . $student->getFirstName() . "</td>";
                                   echo  "<td>" . $student->getLastName() . "</td>";
                                   echo  "<td>" . $student->getFileNumber() . "</td>";
                                   if(isset($this->careerList)){
                                        foreach($this->careerList as $career){
                                             if($career->getCareerId() == $student->getCarrerId()){
                                                  echo  "<td>" . $career->getDescription()  . "</td>";
                                                  $careerName = $career->getDescription();
                                             }
                                        }
                                   } 
                                   $studentId = $student->getStudentId();
                                   $careerName = $career->getDescription();
                                   
                                   echo "<td><a href=" . FRONT_ROOT . "Student/ShowStudent/". $studentId . ">+ info</a></td>";
                              }
                         }
                         ?>
                    </tbody>
          </div>
          </table>
     </section>
</main>