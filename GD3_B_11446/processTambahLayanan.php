<?php 
session_start();

if (isset($_POST["tambahLayanan"])) {
    $namaLayanan = $_POST["namaLayanan"];
    $deskripsi = $_POST["deskripsi"];
    $satuanPemesanan = $_POST["satuanPemesanan"];
    $hargaLayanan = $_POST["hargaLayanan"];

    $dataLayanan = [
        "namaLayanan" => $namaLayanan,
        "deskripsi" => $deskripsi,
        "satuanPemesanan" => $satuanPemesanan,
        "hargaLayanan" => number_format($hargaLayanan, 0, '.', '.')
    ];

    array_push($_SESSION["list_fasilitas"], $dataLayanan);

    $_SESSION["info"] = "Berhasil menyimpan data $namaLayanan";

    header("Location: ./dashboard.php");
}
?>