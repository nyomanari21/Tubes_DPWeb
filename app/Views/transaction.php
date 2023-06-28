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

        <!-- Tabel transaksi -->
        <section id="transaksi">
            <div class="container">
                <h2 class="container text-center">Daftar Transaksi</h2>
                <?php
                    
                    if(session()->get('role') == "admin")
                    {
                        echo "<a href=" . base_url('/export') . "/" . session()->get('username') . ">" .
                                "<button type='button' class='btn btn-dark'>Download PDF</button>
                            </a>";
                    }
                    
                ?>
            </div>
            <div class="container table-responsive my-5">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Judul Kelas</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Status</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <?php
                                if(session()->get('role') == "admin"){
                                    echo "<th scope='col'>Aksi</th>";
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($transaksi as $t) : ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $t['username']; ?></td>
                                <td><?php echo $t['judul_course']; ?></td>
                                <td><?php echo "Rp" . number_format($t['harga']); ?></td>
                                <td><?php echo $t['metode']; ?></td>
                                <td><?php echo $t['tanggal']; ?></td>
                                <td><?php echo $t['status']; ?></td>
                                <td>
                                    <?php
                                        if($t['bukti'] == "none"){
                                            if(session()->get('role') == "user"){
                                                echo "<form action='" . base_url('/transaksi/bukti') . "/" . $t['id'] . "' method='post' enctype='multipart/form-data'>
                                                        <div class='mb-3'>
                                                            <label for='bukti' class='form-label'>Upload Bukti Pembayaran</label>
                                                            <input type='file' class='form-control' name='bukti' required>
                                                        </div>
                                                        <button type='submit' name='submit' class='btn btn-dark'>Upload</button>
                                                    </form>";
                                            }
                                        }
                                        else{
                                            echo "<img src='/Assets/" . $t['bukti'] . "' class='rounded img-fluid'>";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if(session()->get('role') == "admin"){
                                            if($t['status'] == "Belum Bayar"){
                                                echo "<a href='" . base_url('/transaksi/konfirmasi') . "/" . $t['id'] . "' class='d-grid gap-2 col-6 mx-auto text-decoration-none'>
                                                        <button type='button' class='btn btn-success btn-sm my-5'>Konfirmasi</button>
                                                    </a>";
                                            }
                                            else{
                                                echo "<button type='button' class='btn btn-success btn-sm my-5' disabled>Sudah Konfirmasi</button>";
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>