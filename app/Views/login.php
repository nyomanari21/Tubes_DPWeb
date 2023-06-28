<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Masuk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>

        <!-- Authentication -->
        <?php
        
            if(session()->get('logged_in'))
            {
                redirect()->to(base_url('/home'));
            }
        
        ?>

        <!-- Navbar -->
        <?php

            if(session()->get('logged_in')){
                if(session()->get('role') == "admin")
                {
                    include(APPPATH . "Views/Layout/navbar-admin.php");
                }
                else
                {
                    include(APPPATH . "Views/Layout/navbar-loggedin.php");
                }
            }
            else
            {
                include(APPPATH . "Views/Layout/navbar.php");
            }
        
        ?>

        <!-- Form Log In -->
        <section id="login">
            <div class="d-flex justify-content-center">
                <div class="container col-lg-4 col-md-6 col-sm-10 my-5">
                    <h2 class="text-center">Masuk</h2>
                    <?php
                    
                        if(session()->getFlashdata('error'))
                        {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
                                        . session()->getFlashdata('error') .
                                    "</div>";
                        }
                    
                    ?>
                    <form action="<?= base_url('/pengguna/authlogin')?>" method="POST">
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username Anda" required>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password Anda" required>
                        </div>
                        <!-- Submit -->
                        <button type="submit" class="btn btn-dark" name="login">Masuk</button>
                    </form>
                    <p class="mt-3">Belum punya akun? <a href="<?= base_url('/signup')?>">Daftar Sekarang</a></p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>