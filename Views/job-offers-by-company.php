<?php

if (isset($_SESSION["admin"])) {
    require_once(ADMIN_VIEWS . 'navcompany.php');
} else {

    require_once(STUDENT_VIEWS . 'nav.php');
}


?>
<main class="py-5">
    <section id="listado" class="mb-5">

        <div class="container">
            <h2 class="mb-4">Job Offers By Company</h2>
            <h2 class="mb-4">Company: <?php $this->company->getName();?></h2>
            <div class="container" style="width: 2000px; height: 400px; overflow-y: scroll;">
                <div class="container" position="fixed">
                    <form action="<?php echo FRONT_ROOT ?>Company/ShowCompaniesViews" method="POST" enctype="multipart/form-data">

                        <input type="text" name="search" class="form-control form-control-ml" required value="">

                        <button type="submit" class="btn btn-dark ml-auto d-block">Search</button>
                    </form>
                </div>
                <table class="table bg-light-alpha">
                    <div class="container" position="fixed">
                    <thead>
                        <th class="header" scope="col" position="sticky">Name</th>
                        <th class="header" scope="col" position="sticky">Start Day</th>
                        <th class="header" scope="col" position="sticky">DeadLine</th>
                        <th class="header" scope="col" position="sticky">Description</th>
                        <th class="header" scope="col" position="sticky">Salary</th>
                        
                        <th class="header" scope="col" position="sticky"></th>
                        <th class="header" scope="col" position="sticky"></th>
                        <th class="header" scope="col" position="sticky"></th>

                        
                    </thead>
                    </div>
                    <tbody>
                   
                        <?php
                                                      
                        if ($this->jobOfferList !=NULL) {
                            foreach ($this->jobOfferList as $jobOffer) {
                                
                                
                                echo "<tr>";
                           
                                echo  "<td>" . $jobOffer->getName() . "</td>";
                                echo  "<td>" . $jobOffer->getCity() . "</td>";
                                echo  "<td>" . $jobOffer->getEmail() . "</td>";
                                echo  "<td>" . $jobOffer->getPhoneNumber() . "</td>";
                            
                        
                                if (isset($_SESSION["admin"])) {
                                    
                                    $companyId = $company->getCompanyId();
                                    echo "<div class='row'>";
                                    echo "<div class='button-conteiner'>";
                                    echo "<td><a href=" . FRONT_ROOT . "Company/deleteCompany/" . $company->getCompanyId() . ">
                                <button type='button' class= 'btn btn-danger' > Delete</button></a></td>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "<div class='row'>";
                                    echo  "<div class='button-conteiner'>";
                                    echo "<td><a href=" . FRONT_ROOT . "Company/ShowModifyCompanyView/" . $company->getCompanyId() . ">
                                 <button type='button' class= 'btn btn-success' > Modify</button></a></td>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                
                                echo "<div class='row'>";
                                echo  "<div class='button-conteiner'>";
                                echo "<td><a href=" . FRONT_ROOT . "JobOffer/showJobsOffersViewByCompany/" . $company->getCompanyId() . ">
                                  <button type='button' class= 'btn btn-info' > Job Offers</button></a></td>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }else{
                            echo "The companies list is empty";
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        </form>
    </section>
    
</main>
<br>
