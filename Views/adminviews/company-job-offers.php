<?php

if (isset($_SESSION["admin"])) {
    require_once(ADMIN_VIEWS . 'navcompany.php');
} else {

    require_once(VIEWS_PATH . 'nav.php');
}


?>

<main class="py-5">
    <section id="listado" class="mb-5">

        <div class="container">
            <h2 class="mb-4">Job Offers</h2>           
        
            <div class="container" style="width: 2000px; height: 400px; overflow-y: scroll;">


                <div class="container" position="fixed">


                    <form action="<?php echo FRONT_ROOT ?>JobOffer/ShowJobsViews" method="POST" enctype="multipart/form-data">

                        <input type="text" name="search" class="form-control form-control-ml" required value="">

                        <button type="submit" class="btn btn-dark ml-auto d-block">Search</button>
                    </form>
                </div>
                <table class="table bg-light-alpha">
                    <thead>
                        <th class="header" scope="col" position="sticky">name</th>
                        <th class="header" scope="col" position="sticky">Start Date</th>
                        <th class="header" scope="col" position="sticky">Limit Date</th>
                        <!-- <th>yearFoundation</th> -->
                        <!-- <th>Description</th>   -->                               
                        <th class="header" scope="col" position="sticky">Salary</th>
                        <th class="header" scope="col" position="sticky">Career</th>                 
                        
                        <th class="header" scope="col" position="sticky">Description</th> 
                        <th class="header" scope="col" position="sticky">-</th>


                    </thead>
                    <tbody>
                        <?php


                        if ($this->jobOfferList !=null) {
                            foreach ($this->jobOfferList as $jobOffer) {
                                echo "<tr>";
                                echo  "<td>" . $jobOffer->getName() . "</td>";
                                echo  "<td>" . $jobOffer->getStartDay() . "</td>";
                                echo  "<td>" . $jobOffer->getDeadline() . "</td>";                                
                                echo  "<td>" . $jobOffer->getSalary() . "</td>";                                
                                echo  "<td>" . $jobOffer->getDescription() . "</td>";

                                foreach($this->careerList as $career){
                                    if($career->getCareerId() == $jobOffer->getCareerId()){

                                        echo  "<td>" . $career->getDescription() . "</td>";
                                    }
                                }
                                

                                if (isset($_SESSION["admin"])) {

                                    $jobOfferId = $jobOffer->getjobOfferId();
                                    echo "<div class='row'>";
                                    echo "<div class='button-conteiner'>";
                                    echo "<td><a href=" . FRONT_ROOT . "JobOffer/deleteJobOffer/" . $jobOfferId . ">
                                <button type='button' class= 'btn btn-danger' > Delete</button></a></td>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "<div class='row'>";
                                    echo  "<div class='button-conteiner'>";
                                    echo "<td><a href=" . FRONT_ROOT . "JobOffer/showModifyJobOfferView/" . $jobOfferId . ">
                                 <button type='button' class= 'btn btn-success' > Modify</button></a></td>";
                                    echo "</div>";
                                    echo "</div>";
                                }

                              
                            }
                        }else{
                            echo "The job Offers list is empty";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
    </section>
</main>