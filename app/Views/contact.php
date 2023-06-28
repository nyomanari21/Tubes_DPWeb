<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kontak</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>

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

        <!-- Form Kontak -->
        <section id="kontak">
            <div class="container">
                <h2>Form Pesan</h2>
            </div>
            <div class="container my-5">
                <?php
                    
                    if(session()->getFlashdata('success'))
                    {
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>"
                                    . session()->getFlashdata('success') .
                                "</div>";
                    }
                
                ?>
                <form action="<?= base_url('/kontak/save') ?>" method="POST">
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" aria-describedby="emailHelp" required>
                    </div>
                    <!-- Subjek -->
                    <div class="mb-3">
                        <label for="subjek" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subjek" name="subjek" placeholder="Subjek" aria-describedby="namaHelp" required>
                    </div>
                    <!-- Pesan -->
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Pesan anda" required></textarea>
                    </div>
                    <!-- Submit -->
                    <button type="submit" class="btn btn-dark" name="submit">Daftar</button>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>