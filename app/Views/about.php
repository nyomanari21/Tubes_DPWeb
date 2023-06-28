<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tentang Kami</title>
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

        <!-- Tentang Kami -->
        <section id="perkenalan">
            <div class="container">
                <h1>Siapa AcaDemigod?</h1>
                <p class="fs-5">
                    Visi Academigod adalah menjadi platform edukasi berbasis teknologi terdepan yang mendorong akses literasi
                    digital yang lebih luas untuk semua. Academigod memiliki misi untuk mengakselerasi transisi Indonesia
                    menuju dunia digital melalui pendidikan berbasis teknologi yang mentransformasi kehidupan.
                    <br><br>
                    Kini semua bangsa bergerak menuju dunia digital yang bertumpu pada inovasi teknologi di semua sendi
                    kehidupan. Kami yakin pendidikan berbasis teknologi adalah fondasi bagi setiap bangsa agar menjadi
                    yang terdepan dalam menghadapi dunia digital.
                    <br><br>
                    Academigod hadir sebagai platform pendidikan berbasis teknologi yang membantu menghasilkan talenta
                    di berbagai bidang berstandar global. Semua demi mengakselerasi Indonesia agar menjadi yang terdepan.
                </p>
            </div>
        </section>

        <!-- Partner -->
        <section id="partner">
            <div class="container mt-5">
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

        <!-- Anggota Tim -->
        <section id="anggota-tim">
            <div class="container my-5">
                <h1 class="text-center">Tim AcaDemigod</h1>
        
                <div class="py-5 border-bottom" id="features">
                    <div class="container px-0 mb-5">
                        <div class="row row-cols-3 gx-5">
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <img src="Assets/blank-male.png" class="img-fluid">
                                <h2 class="h4 fw-bolder">Rudus Tabutus</h2>
                                <p>Chief Executive Officer</p>
                            </div>
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <img src="Assets/blank-male.png" class="img-fluid">
                                <h2 class="h4 fw-bolder">Hjalmar an Craite</h2>
                                <p>Chief Operating Officer</p>
                            </div>
                            <div class="col-lg-3 mb-5 mb-lg-0">
                                <img src="Assets/blank-female.webp" class="img-fluid">
                                <h2 class="h4 fw-bolder">Cerys an Craite</h2>
                                <p>Chief Technology Officer</p>
                            </div>
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <img src="Assets/blank-male.png" class="img-fluid">
                                <h2 class="h4 fw-bolder">Emhyr var Emreis</h2>
                                <p>Managing Editor</p>
                            </div>
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <img src="Assets/blank-male.png" class="img-fluid">
                                <h2 class="h4 fw-bolder">Zoltan Chivay</h2>
                                <p>Chief Learning Officer</p>
                            </div>
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <img src="Assets/blank-male.png" class="img-fluid">
                                <h2 class="h4 fw-bolder">Gaunter O'Dimm</h2>
                                <p>Chief Product Officer</p>
                            </div>
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <img src="Assets/blank-male.png" class="img-fluid">
                                <h2 class="h4 fw-bolder">Vernon Roche</h2>
                                <p>Engineer</p>
                            </div>
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <img src="Assets/blank-male.png" class="img-fluid">
                                <h2 class="h4 fw-bolder">Emiel Regis Rohellec Terzieff-Godefroy</h2>
                                <p>Technical Advisor</p>
                            </div>
                            <div class="col-lg-3 mb-5 mb-lg-0">
                                <img src="Assets/blank-female.webp" class="img-fluid">
                                <h2 class="h4 fw-bolder">Keira Metz</h2>
                                <p>Business Development Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>