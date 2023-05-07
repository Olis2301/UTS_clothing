<?php
require_once "templates/navbar.php";
?>
<section class="d-flex justify-content-center" style="max-width: 500px; margin: 12rem auto;">
    <form class="text-light w-100" action="login.php">
        <h1 class="my-3 text-center">Register Form</h1>

        <div class="form-outline mb-4">
            <label class="form-label" for="form1Example3">Username</label>
            <input type="input" id="form1Example3" class="form-control" required />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form1Example1">Email address</label>
            <input type="email" id="form1Example1" class="form-control" required />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form1Example2">Password</label>
            <input type="password" id="form1Example2" class="form-control" required />
        </div>

        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                </div>
            </div>

            <div class="col text-center ">
                <a href="login.php">Login</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100  ">Register</button>
    </form>
</section>

<?php require_once "templates/footer.php" ?>