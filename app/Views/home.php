<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AcaDemigod</title>
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

        <?php
            if(session()->get('role') == "admin")
            {
                echo "<div class='container text-center my-3'>
                        <h1>Selamat Datang Pengajar " . session()->get('username') . "!" . "</h1>
                    </div>";
            }
        ?>

        <!-- Intro -->
        <section id="header-intro">
            <div class="container my-5">
                <div class="row">
                    <div class="col">
                        <img src="Assets/header-intro-image.jpeg" class="rounded img-fluid">
                    </div>
                    <div class="col-6">
                        <p class="fs-2 py-3">Wujudkan Impianmu Bersama AcaDemigod</p>
                        <p class="fs-5">Kami siap membantu meningkatkan keahlian ke tingkat yang lebih tinggi untuk terus kompetitif di dunia global</p>
                        <?php
                            if(!session()->get('logged_in'))
                            {
                                echo "<a href='". base_url('/signup') . "'>" . 
                                        "<button type='button' class='btn btn-dark btn-lg my-5'>Daftar Sekarang!</button>
                                    </a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Keunggulan -->
        <section id="keunggulan">
            <div class="container mt-5 pt-3">
                <p class="text-center fs-3 fw-bold">Kenapa AcaDemigod Berbeda</p>
                <p class="text-center fs-6">
                    Saatnya bijak memilih sumber belajar. AcaDemigod memberikan materi yang terjamin juga instruktur yang memiliki kompetensi tinggi.
                </p>
            </div>
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <div class="d-flex flex-column bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                                <p class="text-center fs-5 fw-bold">Belajar fleksibel sesuai jadwal anda</p>
                                <p class="text-center fs-6">
                                    Belajar kapan pun, di mana pun, secara mandiri. Bebas memilih kelas sesuai minat belajar. Akses seumur hidup ke kelas dan forum diskusi setelah lulus.
                                </p>
                            </div>
                            <div class="p-2 bd-highlight">
                                <p class="text-center fs-5 fw-bold">Instruktur berpengalaman di dunia industri</p>
                                <p class="text-center fs-6">
                                    Belajar bersama instruktur yang telah berpengalaman di dunia industri sehingga materi yang diajarkan sangat relevan dengan kebutuhan industri terkini.
                                </p>
                            </div>
                            <div class="p-2 bd-highlight">
                                <p class="text-center fs-5 fw-bold">Live teaching interaktif secara rutin</p>
                                <p class="text-center fs-6">
                                    Kamu dapat bertanya secara langsung dengan instruktur handal untuk memudahkanmu memahami setiap materi yang diajarkan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <img src="Assets/keunggulan-image.jpeg" class="rounded img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <!-- Partner -->
        <section id="partner">
            <div class="container">
                <p class="text-center fs-5 fw-bold">Telah dipercaya oleh perusahaan segala ukuran</p>
                <div class="row row-cols-5 mb-5">
                    <div class="col pt-3 pb-5">
                        <img src="Assets/box-dark.svg" class="rounded img-fluid">
                    </div>
                    <div class="col pt-3 pb-5">
                        <img src="Assets/nasdaq-dark.svg" class="rounded img-fluid">
                    </div>
                    <div class="col pt-3 pb-5">
                        <img src="Assets/netapp-dark.svg" class="rounded img-fluid">
                    </div>
                    <div class="col pt-3 pb-5">
                        <img src="Assets/volkswagen-dark.svg" class="rounded img-fluid">
                    </div>
                    <div class="col pt-3 pb-5">
                        <img src="Assets/eventbrite-dark.svg" class="rounded img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <!-- Carousel Kategori Kelas -->
        <section class="carousel-kategori-kelas">
            <div class="container">
                <p class="text-center fs-3 fw-bold">Berbagai macam kategori kelas</p>
            </div>
            <div class="container my-5">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="<?= base_url('/course/TI dan Perangkat Lunak')?>">
                                <img src="Assets/carousel-ti.jpg" class="d-block w-100 rounded" height="auto">
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>TI dan Perangkat Lunak</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="<?= base_url('/course/Fotografi dan Video')?>">
                                <img src="Assets/carousel-photography.jpg" class="d-block w-100 rounded" height="auto">
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Fotografi</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="<?= base_url('/course/Musik')?>">
                                <img src="Assets/carousel-music.jpg" class="d-block w-100 rounded" height="auto">
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Musik</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href="<?= base_url('/course/Bisnis')?>">
                                <img src="Assets/carousel-business.jpg" class="d-block w-100 rounded" height="auto">
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Bisnis</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>