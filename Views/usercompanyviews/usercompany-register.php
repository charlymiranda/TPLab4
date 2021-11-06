<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Student Profile</h2>

        </div>
    </section>
    <section>
        <form action='<?php echo FRONT_ROOT ?>UserCompany/userCompanyRegistration' method="post" class="bg-light-alpha p-5">
            <div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4">

                            <label for=""><b>First Name</b></label>
                            <input type="text" name="firstName" class="form-control" required value="">

                        </div>
                        <div class="col-lg-4">

                            <label for=""><b>Last Name</b></label>
                            <input type="text" name="lastName" class="form-control" required value="">

                        </div>
                        <div class="col-lg-4">

                            <label for=""><b>DNI</b></label>
                            <br>
                            <input type="number" name="dni" class="form-control-sm" required value="">
                        </div>

                        <div class="col-lg-4">

                            <label for=""><b>Email</b></label>
                            <input type="mail" name="email" class="form-control" required value="">

                        </div>
                        <div class="col-lg-4">

                            <label for=""><b>Phone Number</b></label>
                            <input type="number" name="phoneNumber" class="form-control" required value="">

                        </div>
                        <div class="col-lg-4">

                            <label for=""><b>Password</b></label>
                            <input type="text" name="password" class="form-control" required value="">

                        </div>
                        <div class="col-lg-4">

                            <label for=""><b>Confirm Password</b></label>
                            <input type="text" name="confirm password" class="form-control" required value="">

                        </div>

                    </div>
                    
                    <center>
                        <button class="btn btn-warning btn-block btn-sm " type="submit">Registration</button>
                    </center>

                </div>

            </div>
        </form>
    </section>
</main>