<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daftar Akun</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>

        <!-- Authentication -->
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

        <!-- Form Sign In -->
        <section id="signin">
            <div class="d-flex justify-content-center">
                <div class="container col-lg-4 col-md-6 col-sm-10 my-5">
                    <h2 class="text-center">Daftar Akun Pengajar</h2>
                    <?php
                    
                        if(session()->getFlashdata('error'))
                        {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
                                        . session()->getFlashdata('error') .
                                    "</div>";
                        }
                        else if(session()->getFlashdata('success'))
                        {
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>"
                                        . session()->getFlashdata('success') .
                                    "</div>";
                        }
                    
                    ?>
                    <form action="<?= base_url('/pengguna/save')?>" method="POST">
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username akun Anda" required>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password akun Anda" required>
                        </div>
                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Tuliskan nama lengkap Anda" required>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email Anda" required>
                        </div>
                        <!-- Tanggal Lahir -->
                        <div class="mb-3">
                            <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgllahir" required>
                        </div>
                        <!-- Role -->
                        <input type="hidden" name="role" value="admin">
                        <!-- Submit -->
                        <button type="submit" class="btn btn-dark" name="daftar">Daftar Menjadi Pengajar</button>
                    </form>
                    <p class="mt-3">Sudah punya akun? <a href="<?= base_url('/login')?>">Masuk Sekarang</a></p>
                    <p class="mt-3">Ingin belajar di AcaDemigod? <a href="<?= base_url('/signup-user')?>">Daftar menjadi pengguna!</a></p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>