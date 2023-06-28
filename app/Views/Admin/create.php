<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create</title>
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

        <!-- Form Tambah Course -->
        <section id="form-course">
            <div class="container my-5">
                <!-- Form -->
                <h2 class="text-center mb-3">Tambah Course</h2>
                <form action="<?= base_url('/course/save') ?>" method="post" enctype="multipart/form-data">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select mb-3" name="kategori">
                        <option value="TI dan Perangkat Lunak" selected>TI dan Perangkat Lunak</option>
                        <option value="Fotografi dan Video">Fotografi dan Video</option>
                        <option value="Musik">Musik</option>
                        <option value="Bisnis">Bisnis</option>
                    </select>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul course" required>
                    </div>
                    <div class="mb-3">
                        <label for="subjudul" class="form-label">Subjudul</label>
                        <input type="text" class="form-control" name="subjudul" placeholder="Subjudul course" required>
                    </div>
                    <div class="mb-3">
                        <label for="durasivideo" class="form-label">Durasi Video</label>
                        <input type="number" class="form-control" name="durasivideo" min="0" step=".1"
                        placeholder="Total durasi video pelajaran. Tuliskan dalam satuan jam dan gunakan titik untuk pemisah di belakang koma. ex: 10.5" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlahpelajaran" class="form-label">Jumlah Pelajaran</label>
                        <input type="number" class="form-control" name="jumlahpelajaran" min="0"
                        placeholder="Total pelajaran course. Tuliskan hanya dalam angka. ex: 114" required>
                    </div>
                    <label for="level" class="form-label">Tingkat</label>
                    <select class="form-select mb-3" name="level">
                        <option value="Pemula" selected>Pemula</option>
                        <option value="Menengah">Menengah</option>
                        <option value="Ahli">Ahli</option>
                        <option value="Semua Tingkat">Semua Tingkat</option>
                    </select>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" min="0"
                        placeholder="Tuliskan dalam angka tanpa titik dan koma ex: 549000" required>
                    </div>
                    <div class="mb-3">
						<label for="deskripsi" class="form-label">Deskripsi</label>
						<textarea name="deskripsi" class="form-control" placeholder="Deskripsi course" required></textarea>
					</div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" required>
                    </div>
                    <input type="hidden" name="kreator" value="<?= session()->get('username'); ?>">
                    <button type="submit" name="submit" class="btn btn-dark">Tambah</button>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <?php include(APPPATH . "Views/Layout/footer.php"); ?>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>