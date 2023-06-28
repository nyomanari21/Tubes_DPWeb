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

        <!-- Profile -->
        <section id="profile">
            <div class="container">
                <div class="d-flex justify-content-center my-3">
                    <div class="col-6">
                        <h2 class="text-center mb-3">Profil Pengguna</h2>
                        <table class="table table-borderless text-center">
                            <tr>
                                <th>Username</th>
                                <td><?= $account['username'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?= $account['nama'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $account['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?= $account['tgllahir'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>