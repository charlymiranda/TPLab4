<?php

if (isset($_SESSION["admin"])) {
    require_once(ADMIN_VIEWS . 'navcompany.php');
} else {

    require_once(VIEWS_PATH . 'nav.php');
}

include('Views/header.php');
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
    <section id="listado" class="mb-5">

        <div class="container">
            <h2 class="mb-4">Companies List</h2>
            <div class="container" style="width: 2000px; height: 400px; overflow-y: scroll;">


                <div class="container" position="fixed">


                    <form action="<?php echo FRONT_ROOT ?>Company/ShowCompaniesViews" method="POST" enctype="multipart/form-data">

                        <input type="text" name="search" class="form-control form-control-ml" required value="">

                        <button type="submit" class="btn btn-dark ml-auto d-block">Search</button>
                    </form>
                </div>
                <table class="table bg-light-alpha">
                    <thead>
                        <th class="header" scope="col" position="sticky">Name</th>
                        <th class="header" scope="col" position="sticky">City</th>
                        <!-- <th>yearFoundation</th> -->
                        <!-- <th>Description</th>   -->
                        <th class="header" scope="col" position="sticky">Email</th>
                        <th class="header" scope="col" position="sticky">PhoneNumber</th>
                        <th class="header" scope="col" position="sticky">-</th>
                        <th class="header" scope="col" position="sticky">-</th>
                        <th class="header" scope="col" position="sticky">-</th>
                        <th class="header" scope="col" position="sticky">-</th>


                    </thead>
                    <tbody>
                        <?php


                        if (isset($this->companiesList)) {
                            foreach ($this->companiesList as $company) {
                                echo "<tr>";
                                echo  "<td>" . $company->getName() . "</td>";
                                echo  "<td>" . $company->getCity() . "</td>";
                                // echo  "<td>" . $company->getYearFoundation() . "</td>";
                                // echo  "<td>" . $company->getDescription() . "</td>";
                                echo  "<td>" . $company->getEmail() . "</td>";
                                echo  "<td>" . $company->getPhoneNumber() . "</td>";

                                if (isset($_SESSION["admin"])) {

                                    $companyId = $company->getCompanyId();
                                    echo "<div class='row'>";
                                    echo  "<div class='button-conteiner'>";
                                    echo "<td><a href=" . FRONT_ROOT . "Company/deleteCompany/" . $company->getCompanyId() . ">
                                <button type='button' class= 'btn btn-danger' > Delete</button></a></td>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "<div class='row'>";
                                    echo  "<div class='button-conteiner'>";
                                    echo "<td><a href=" . FRONT_ROOT . "Company/updateCompany/" . $company->getCompanyId() . ">
                                 <button type='button' class= 'btn btn-success' > Modify</button></a></td>";
                                    echo "</div>";
                                    echo "</div>";
                                }

                                echo "<div class='row'>";
                                echo  "<div class='button-conteiner'>";
                                echo "<td><a href=" . FRONT_ROOT . "Company/updateCompany/" . $company->getCompanyId() . ">
                                  <button type='button' class= 'btn btn-info' > Jobs Offer</button></a></td>";
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