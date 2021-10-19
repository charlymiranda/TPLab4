<?php
require_once('navcompany.php');
include('Views/header.php');
?>
  <script type="text/javascript">
        function confirmDelete()
        {
            var answer = confirm ("Are you sure of the elimination?");
        }
        if (answer == true) {

            return true;
        }else{

            return false;
        }

    </script>
<main class="py-5">
    <section id="listado" class="mb-5">

  



        <div class="container">
            <h2 class="mb-4">Lista de Empresas</h2>
            <div class="container">
                <div class="container">

                
                    <form action="<?php echo FRONT_ROOT ?>Company/ShowCompaniesViews" method="POST" enctype="multipart/form-data">
                        <input type="text" name="search" class="form-control form-control-ml" required value="">

                        <button type="submit" class="btn btn-dark ml-auto d-block">Search</button>
                    </form>
                </div>
                <table class="table bg-light-alpha">
                    <thead>
                        <th>Name</th>
                        <th>City</th>
                        <th>yearFoundation</th>
                        <th>Description</th>
                        <th>email</th>
                        <th>phoneNumber</th>


                    </thead>
                    <tbody>
                        <?php

                        
                        if (isset($this->companiesList)) {
                            foreach ($this->companiesList as $company) {
                                echo "<tr>";
                                echo  "<td>" . $company->getName() . "</td>";
                                echo  "<td>" . $company->getCity() . "</td>";
                                echo  "<td>" . $company->getYearFoundation() . "</td>";
                                echo  "<td>" . $company->getDescription() . "</td>";
                                echo  "<td>" . $company->getEmail() . "</td>";
                                echo  "<td>" . $company->getPhoneNumber() . "</td>";

                                $companyId = $company->getCompanyId();
                                echo "<div class='row'>";
                               echo  "<div class='button-conteiner'>"; 
                                echo "<td><a href=" . FRONT_ROOT . "Company/deleteCompany/" . $company->getCompanyId().">
                                <button type='button' class= 'btn btn-danger' > Delete</button></a></td>";
                                echo "</div>"; 
                                echo "</div>"; 

                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
    </section>
</main>