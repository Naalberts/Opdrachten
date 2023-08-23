<?php include "includes/conn.php"; ?>
<?php include "includes/header.php"; ?>

<div class="d-flex flex-column h-75">
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-md">
            <div class="d-flex">
                <img class="logo" src="logo.png">
            </div>
        </div>
    </nav>

    <div class="container h-100 mt-5">
        <div class="d-flex justify-content-evenly align-items-center h-100">
            <div class="card d-flex justify-content-center align-items-center cardwidth h-50 w-30 bg-body-secondary" style="width: 18rem;">
                <a class="d-block text-decoration-none text-black fs-4 fst-italic" href="http://localhost/gasten-registratie-app-william-nathaniel/login/index.php">
                    Aanmelden
                </a>
            </div>
            <div class="card d-flex justify-content-center align-items-center cardwith h-50 w-30 bg-body-secondary" style="width: 18rem;">
                <a class="d-block text-decoration-none text-black fs-4 fst-italic" href="http://localhost/gasten-registratie-app-william-nathaniel/logout/index.php">
                    Afmelden
                </a>
            </div>
        </div>
    </div>
</div>

<div class="loginbtn">
    <a href="admin/index.php"><button type="button" class="btn bg-body-secondary">Inloggen Receptionist</button></a>
</div>