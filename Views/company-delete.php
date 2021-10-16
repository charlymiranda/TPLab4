<?php
require_once('nav.php');
include('Views/header.php');
?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Lista de Empresas</h2>
            <div class="container">
                <div class="container">
                    <form action="<?php echo FRONT_ROOT ?>Company/ShowCompaniesViews" method="POST" enctype="multipart/form-data">
                        <input type="text" name="search" class="form-control form-control-ml" required value="">

                        <button type="submit" class="btn btn-dark ml-auto d-block">Buscar</button>
                    </form>
                </div>
                <table class="table bg-light-alpha">
                    <thead>
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>yearFoundation</th>
                        <th>Descripcion</th>
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
                                echo "<td><a href=" . FRONT_ROOT . "Company/deleteCompany/" . $company->getCompanyId() . ">Delete</a></td>";
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