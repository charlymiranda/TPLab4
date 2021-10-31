<?php

if (isset($_SESSION["admin"])) {
    require_once(ADMIN_VIEWS . 'navcompany.php');
} else {

    require_once(VIEWS_PATH . 'nav.php');
}


?>
<script type="text/javascript">
    function confirmDelete() {
        var answer = confirm("Are you sure of the elimination?");
    }
    if (answer == true) {

        return true;
    } else {

        return false;
    }
</script>
<main class="py-5">
    <section id="list" class="mb-5">

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
                        <th class="header" scope="col" position="sticky">Start Date</th>
                        <th class="header" scope="col" position="sticky">Limit Date</th>
                        <!-- <th>yearFoundation</th> -->
                        <!-- <th>Description</th>   -->
                        <th class="header" scope="col" position="sticky">Description</th>
                        <th class="header" scope="col" position="sticky">Hours</th>
                        <th class="header" scope="col" position="sticky">Salary</th>
                        <th class="header" scope="col" position="sticky">Career</th>
                        <th class="header" scope="col" position="sticky">Job Position ID</th>
                        <th class="header" scope="col" position="sticky">-</th>


                    </thead>
                    <tbody>
                        <?php


                        if ($this->jobOfferList !=NULL) {
                            foreach ($this->jobOfferList as $jobOffer) {
                                echo "<tr>";
                                echo  "<td>" . $jobOffer->getStartDay() . "</td>";
                                echo  "<td>" . $jobOffer->getDeadline() . "</td>";
                                echo  "<td>" . $jobOffer->getDescription() . "</td>";
                                echo  "<td>" . $jobOffer->getSalary() . "</td>";
                                echo  "<td>" . $jobOffer->getJobPossitionId() . "</td>";
                                

                                if (isset($_SESSION["admin"])) {

                                    $jobOfferId = $jobOffer->getjobOfferId();
                                    echo "<div class='row'>";
                                    echo "<div class='button-conteiner'>";
                                    echo "<td><a href=" . FRONT_ROOT . "JobOffer/deleteJobOffer/" . $jobOffer->getjobOfferId() . ">
                                <button type='button' class= 'btn btn-danger' > Delete</button></a></td>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "<div class='row'>";
                                    echo  "<div class='button-conteiner'>";
                                    echo "<td><a href=" . FRONT_ROOT . "JobOffer/updateJobOffer/" . $jobOffer->getjobOfferId() . ">
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