<?php
require_once('navcompany.php');
include('Views/header.php');
?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <form action="<?php echo FRONT_ROOT ?>Company/ListCompanies" method="GET">
            <div class="container">
                <h2 class="mb-4">Lista de Empresas</h2>
                <div class="container">

                    <table class="table bg-light-alpha">
                        <thead>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Descripcion</th>

                        </thead>

                        <tbody>
                            <?php
                            if (isset($companiesList)) {
                                foreach ($companiesList as $company) {
                                    echo  "<tr>";
                                    echo  "<td>" . $company->getName() . "</td>";
                                    echo  "<td>" . $company->getCity() . "</td>";
                                    echo  "<td>" . $company->getDescription() . "</td>";

                                    $companyId = $company->getIdCompany();
                                    // echo "<td><a href=" . FRONT_ROOT . "Company/ShowCompany/" . $companyId . ">Ver</a></td>";
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