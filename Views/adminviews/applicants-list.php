<?php

use Utils\Utils;

Utils::checkNav();


?>

<main class="py-5">
    <section id="listado" class="mb-5">

        <div class="container">
            <h2 class="mb-4">Applicants List</h2>           
        
            <div class="container" style="width: 2000px; height: 400px; overflow-y: scroll;">


                <div class="container" position="fixed">
                </div>
                <table class="table bg-light-alpha">
                    <thead>
                        <th class="header" scope="col" position="sticky">Name</th>
                        <th class="header" scope="col" position="sticky">Last Name</th>
                        <th class="header" scope="col" position="sticky">DNI</th>
                        <th class="header" scope="col" position="sticky"></th>


                    </thead>
                    <tbody>
                        <?php
                        if ($this->applicants != null) {
                            foreach ($this->applicants as $student) {

                                echo "<tr>";
                                echo  "<td>" . $student->getFirstName() . "</td>";
                                echo  "<td>" . $student->getLastName() . "</td>";
                                echo  "<td>" . $student->getDni() . "</td>";

                                if (isset($_SESSION["admin"])) {

                                    $studentId = $student->getstudentId();
                                    echo "<div class='row'>";
                                    echo "<div class='button-conteiner'>";
                                    echo "<td><a href=" . FRONT_ROOT . "jobOffer/deleteAndMail/" . $this->jobId . "/" . $studentId . ">
                                <button type='button' class= 'btn btn-danger' > Delete Application</button></a></td>";
                                    echo "</div>";
                                    echo "</div>";

                                }
                            }
                        } else {
                            echo "The job Offers list is empty";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
    </section>
    <br>
</main>