<?php
session_start();

if(!isset($_SESSION["user"])){
    header("Location: ./login.php");
    exit;
}

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel & Resort",
    "page_title" => "Admin Panel - Grand Atma Hotel & Resort",
    "logo" => "./assets/images/crown.png"
];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $detail["page_title"]; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Icon tab -->
    <link rel="icon" href="
    <?php echo $detail["logo"]; ?>
    " type="image/x-icon" />

    <!-- Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <!-- Poppins dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="./assets/css/poppins.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>


<body>
    <header class="fixed-top scrolled" id="navbar">
        <nav class="container nav-top py-2">
            <a href="./" class="rounded bg-white py-2 px-3 d-flex align-items-center nav-home-btn">
                <img src="<?php echo $detail["logo"]; ?>" class="crown-logo" />
                <div>
                    <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                    <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                </div>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin Panel</a></li>
                <li class="nav-item"><a href="./processLogout.php" class="nav-link text-danger">Logout</a></li>
            </ul>
        </nav>
    </header>
    
    <main style="padding-top: 84px;" class="container">
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Tambah Layanan</h1>
        <form action="./processTambahLayanan.php" method="POST">
            <div class="row mb-3">
                <!-- Nama Layanan -->
                <div class="col">
                    <p class="mb-0"><label for="nama-layanan">Nama Layanan</label></p>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="namaLayanan" id="nama-layanan" required>
                </div>
                <!-- end of Nama Layanan -->
            </div>

            <div class="row mb-3">
                <!-- Deskripsi -->
                <div class="col">
                    <p class="mb-0"><label for="deskripsi">Deskripsi</label></p>
                </div>
                <div class="col">
                    <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" required></textarea>
                </div>
                <!-- end of Deskripsi -->
            </div>

            <div class="row mb-3">
                <!-- Satuan Pemesanan -->
                <div class="col">
                    <p class="mb-0"><label for="satuan-pemesanan">Satuan Pemesanan</label></p>
                </div>
                <div class="col">
                    <select name="satuanPemesanan" id="satuan-pemesanan" class="form-select" required>
                        <option value="">Pilih Satuan</option>
                        <option value="per pcs">per pcs</option>
                        <option value="per jam">per jam</option>
                        <option value="per pax">per pax</option>
                    </select>
                </div>
                <!-- end of Satuan Pemesanan -->
            </div>

            <div class="row mb-3">
                <!-- Harga Layanan -->
                <div class="col">
                    <p class="mb-0"><label for="harga">Harga Layanan (Rp)</label></p>
                </div>
                <div class="col">
                    <input type="number" class="form-control" id="harga" name="hargaLayanan" required>
                </div>
                <!-- end of Harga Layanan -->
            </div>

            <button class="btn btn-primary" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="mb-1"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                Simpan
            </button>

            <input type="hidden" name="tambahLayanan">
        </form>
    </main>

    <!-- Bootstrap 5.3 JS -->
    <script src="./assets/js/bootstrap.min.js"></script>

    
</body>
</html>