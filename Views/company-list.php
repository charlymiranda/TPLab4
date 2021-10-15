<?php
require_once('navcompany.php');
include('Views/header.php');
?>

<main class="py-5">
    <section id="listado" class="mb-5">
            <div class="container">
                <h2 class="mb-4">Lista de Empresas</h2>
                <div class="container">
                    <table class="table bg-light-alpha">
                        <thead>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Descripcion</th>
                            <th>yearFoundation</th>
                            <th>email</th>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($companiesList)) {
                                foreach ($companiesList as $company) {
                                    ?>
                                      <tr>
                                      <td>  <?php $company->getName(); ?></td>
                                      <td>  <?php $company->getCity(); ?></td>
                                      <td>  <?php $company->getDescription();?></td>
                                      <td>  <?php $company->getYearFoundation();?></td>
                                      <td>  <?php $company->getEmail(); ?></td>
                                      <td>  <?php $company->getDescription(); ?></td>

                                    <?php $companyId = $company->getIdCompany();?>
                                    <td><a href="<?php FRONT_ROOT ?>Company/ShowCompany/<?php $companyId ?>">Ver</a></td>

                               <?php }
                            }?>
                             
                           
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </section>
</main>