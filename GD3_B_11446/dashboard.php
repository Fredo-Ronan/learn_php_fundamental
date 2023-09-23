<?php
session_start();

if (!isset($_SESSION["user"])) {
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

    <style>
        .img-bukti-ngantor {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
        }
    </style>
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
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Dashboard</h1>

        <!-- code UGD mulai -->
        <?php if(isset($_SESSION["info"])) { ?>

            <div class="alert alert-success mb-4">
                <strong>Berhasil!</strong> <?php echo $_SESSION["info"] ?>
            </div>

        <?php 
            unset($_SESSION["info"]);
        } ?>
        <!-- code UGD berakhir -->

        <div class="row">
            <div class="col-lg-10">
                <div class="card card-body h-100 justify-content-center">
                    <h4>Selamat datang,</h4>
                    <h1 class="fw-bold display-6 mb-3"><?php echo $_SESSION["user"]["username"]; ?></h1>

                    <p class="mb-0">Kamu sudah login sejak:</p>
                    <p class="fw-bold lead mb-0"><?php echo $_SESSION["user"]["login_at"]; ?></p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card card-body">
                    <p>Bukti sedang ngantor:</p>
                    <img src="<?php echo $_SESSION["user"]["bukti_ngantor"]; ?>" class="img-fluid rounded img-bukti-ngantor" alt="Bukti ngantor (sudah dihapus)" />
                </div>
            </div>
        </div>

        <!-- code UGD Mulai -->
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Daftar Layanan</h1>
        <p class="mb-0">
            Grand Atma memiliki <strong> <?php echo count($_SESSION["list_fasilitas"]); ?> </strong>
            fasilitas dan layanan yang dapat digunakan customer.
        </p>

        <button class="btn btn-success mt-4">
            <a href="./tambahLayanan.php" style="text-decoration: none; color: #ffffff;">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="mb-1"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <style>
                        svg {
                            fill: #ffffff
                        }
                    </style>
                    <path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H384c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                </svg>
                Tambah Layanan
            </a>
        </button>

        <?php if (count($_SESSION["list_fasilitas"]) != 0) {  ?>

            <?php foreach ($_SESSION["list_fasilitas"] as $index=>$fasilitas) { ?>

                <div class="card mb-3 mt-3 p-3 h-100" style="width: 100%;">
                    <div class="row">
                        <img src="https://img.freepik.com/premium-photo/contemporary-spotless-fitness-gym-center-interiorgenerative-ai_391052-10889.jpg" alt="" class="col-3" style="border-radius: 15px;">

                        <div class="col">
                            <h4><?php echo $fasilitas["namaLayanan"]; ?></h4>
                            <p><?php echo $fasilitas["deskripsi"]; ?></p>
                            <hr>

                            <p>
                                Satuan: <strong><?php echo $fasilitas["satuanPemesanan"]; ?></strong> . Price: <strong>Rp <?php echo $fasilitas["hargaLayanan"]; ?></strong>
                            </p>

                            <button class="btn btn-danger">
                                <a href="processDelete.php?id=<?php echo $index; ?>" style="text-decoration: none; color: white;">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="mb-1"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            svg {
                                                fill: #ffffff
                                            }
                                        </style>
                                        <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                    Hapus
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

            <?php } ?>

        <?php } ?>
        <!-- code UGD berakhir -->
    </main>

    <!-- Bootstrap 5.3 JS -->
    <script src="./assets/js/bootstrap.min.js"></script>


</body>

</html>