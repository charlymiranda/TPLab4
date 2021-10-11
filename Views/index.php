<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">index</h2>
               <?php
               
                    $apiStudent = curl_init('https://utn-students-api.herokuapp.com/api/Student');
                    curl_setopt($apiStudent, CURLOPT_HTTPHEADER, array(API_KEY));
                    curl_setopt($apiStudent, CURLOPT_RETURNTRANSFER, true);

                    $response = curl_exec($apiStudent);

                    $arrayToDecode = json_decode($response, true);
                
                /*$opciones = array(
                    'http'=>array(
                        'method'=>'GET',
                        'header'=>API_KEY)
                    );
                    $response1=file_get_contents('https://utn-students-api.herokuapp.com/api/Student');*/

               ?>
            
          </div>
     </section>
</main>