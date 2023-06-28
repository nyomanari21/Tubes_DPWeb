<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kelas</title>
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

        <!-- Course Lists -->
        <section id="ti-dan-pl">
            <div class="container">
                <h1 class="text-center"><?= $kategori ?></h1>
            </div>
            <div class="container my-3">
                <?php
                
                    if(session()->get('role') == "admin")
                    {
                        echo "<a href=" . base_url('/create') . ">" .
                                "<button type='button' class='btn btn-dark'>Tambah Kelas</button>
                            </a>";
                    }
                
                ?>
            </div>
            <div class="container my-5">
                <?php if(!$course){echo "<h2 class='container text-center'>Belum ada kelas yang terdaftar</h2>";} ?>
                <?php foreach ($course as $c) : ?>
                    <div class="container border p-3 my-3">
                        <div class="row">
                            <div class="col">
                                <img src="/Assets/<?php echo $c['foto']; ?>" class="rounded img-fluid">
                            </div>
                            <div class="col-lg-7">
                                <h2><?= $c['judul']; ?></h2>
                                <p><?= $c['subjudul']; ?></p>
                                <p><?= floatval($c['durasivideo']); ?> jam total ∙ <?= $c['jumlahpelajaran']; ?> pelajaran ∙ <?= $c['level']; ?></p>
                                <p class="fw-bold">Rp<?= number_format($c['harga']); ?></p>
                                <a href="<?= base_url('/course')?>/<?= $c['kategori']?>/detail/<?= $c['id']?>">
                                    <button type="button" class="btn btn-dark btn">Detail Kelas</button>
                                </a>
                                <?php
                                    if(session()->get('role') == "admin")
                                    {
                                        echo "<a href='". base_url('/course') . "/" . $c['kategori'] . "/update/" . $c['id'] . "'>" . 
                                            "<button type='button' class='btn btn-success my-5'>Update Kelas</button>
                                        </a>";
                                        echo "<a href='". base_url('/course') . "/" . $c['kategori'] . "/delete/" . $c['id'] . "'>" . 
                                                "<button type='button' class='btn btn-danger my-5'>Hapus Kelas</button>
                                            </a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>