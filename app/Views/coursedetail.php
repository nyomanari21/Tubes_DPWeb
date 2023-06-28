<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profil</title>
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

        <!-- Detail Course -->
        <section id="detail-course">
            <div class="container p-3 my-3">
                <!-- Grid -->
                <div class="row">
                    <div class="col">
                        <img src="/Assets/<?php echo $course['foto']; ?>" class="rounded img-fluid">
                    </div>
                    <div class="col-7">
                        <h2><?= $course['judul']; ?></h2>
                        <p><?= $course['subjudul']; ?></p>
                        <p><?= floatval($course['durasivideo']); ?> jam total ∙ <?= $course['jumlahpelajaran']; ?> pelajaran ∙ <?= $course['level']; ?></p>
                        <p class="fw-bold">Rp<?= number_format($course['harga']); ?></p>
                        <?php
                            if(!session()->get('logged_in'))
                            {
                                echo "<a href='". base_url('/signup') . "'>" . 
                                        "<button type='button' class='btn btn-dark btn-lg my-5'>Beli Kelas</button>
                                    </a>";
                            }
                            else
                            {
                                if(session()->get('role') != "admin")
                                {
                                    echo "<a href='". base_url('/course') . "/" . $course['kategori'] . "/detail/" . $course['id'] . "/beli" . "'>" . 
                                            "<button type='button' class='btn btn-dark btn-lg my-5'>Beli Kelas</button>
                                        </a>";
                                }
                            }
                        ?>
                    </div>
                </div>
                <!-- Detail Kelas -->
                <div class="container my-3">
                    <h2>Deskripsi</h2>
                    <p><?= $course['deskripsi']; ?></p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>