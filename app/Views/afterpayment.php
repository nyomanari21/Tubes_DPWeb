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

        <!-- After Payment -->
        <section id="after-payment">
            <div class="container">
                <?php
                
                    if($status == "success")
                    {
                        echo "<img src='/Assets/confetti.png' class='rounded img-fluid mx-auto d-block mb-5' style='width:30%'>
                            <h1 class='text-center'>Pembelian kelas berhasil! Silahkan selesaikan pembayaran di nomor tagihan
                            <br>987654321<br>Lalu kirim bukti pembayaran di halaman daftar transaksi</h1>";
                    }
                    else
                    {
                        echo "<h1 class='text-center'>Kelas yang Anda pilih sudah dibeli. Silahkan kembali ke halaman utama</h1>";
                    }
                
                ?>
                <div class="container">
                    <a href="<?= base_url('/home')?>" class="d-grid gap-2 col-6 mx-auto text-decoration-none">
                        <button type="button" class="btn btn-dark btn-lg my-5">Kembali Ke Halaman Utama</button>
                    </a>
                </div>
            </div>
        </section>
        

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>