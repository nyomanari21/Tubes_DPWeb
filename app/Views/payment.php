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

        <!-- Payment -->
        <section id="payment">
            <h1 class="container text-center">Pembayaran</h1>
            <div class="container my-5">
                <form class="row" action="<?= base_url('/transaksi/payment')?>" method="GET">
                    <!-- Metode pembayaran -->
                    <div class="col-lg-8">
                        <h3>Pilih Metode Pembayaran</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode" id="metode1" value="PayPal" checked>
                            <label class="form-check-label" for="metode1">
                                <strong>PayPal</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode" id="metode2" value="Dana">
                            <label class="form-check-label" for="metode2">
                                <strong>Dana</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode" id="metode3" value="GoPay">
                            <label class="form-check-label" for="metode3">
                                <strong>GoPay</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode" id="metode4" value="OVO">
                            <label class="form-check-label" for="metode4">
                                <strong>OVO</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode" id="metode5" value="BCA">
                            <label class="form-check-label" for="metode5">
                                <strong>BCA</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode" id="metode6" value="BNI">
                            <label class="form-check-label" for="metode6">
                                <strong>BNI</strong>
                            </label>
                        </div>
                    </div>
                    <!-- Summary -->
                    <div class="col-lg-4 border rounded py-2">
                        <h4 class="text-center">Ringkasan</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>Judul Kelas</th>
                                <td><?= $course['judul'] ?></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp<?= number_format($course['harga']); ?></td>
                            </tr>
                        </table>

                        <!-- hidden data -->
                        <input type="hidden" name="username" value="<?= session()->get('username'); ?>">
                        <input type="hidden" name="kreator" value="<?= $course['kreator']; ?>">
                        <input type="hidden" name="id_course" value="<?= $course['id']; ?>">
                        <input type="hidden" name="judul_course" value="<?= $course['judul']; ?>">
                        <input type="hidden" name="harga" value="<?= $course['harga']; ?>">
                        <button type="submit" name="beli" class="btn btn-primary">Beli</button>
                    </div>
                </form>
            </div>
        </section>
        

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>