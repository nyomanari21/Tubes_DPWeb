<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand fs-4" href="<?= base_url('/home')?>">AcaDemigod</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/home')?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/about')?>">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/contact')?>">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/profile')?>/<?= session()->get('username')?>">Profil Pengguna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/transaksi')?>/<?= session()->get('username')?>/<?= session()->get('role')?>">Daftar Transaksi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Kategori Kelas
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?= base_url('/course/TI dan Perangkat Lunak')?>">TI dan Perangkat Lunak</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('/course/Fotografi dan Video')?>">Fotografi dan Video</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('/course/Musik')?>">Musik</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('/course/Bisnis')?>">Bisnis</a></li>
                    </ul>
                </li>
            </ul>
            <div class = "d-flex justify-content-center">
                <a href = "<?= base_url('/logout')?>"><button class = "btn btn-outline-light me-2">Keluar</button></a>
            </div>
        </div>
    </div>
</nav>