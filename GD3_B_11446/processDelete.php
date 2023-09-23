<?php 
session_start();

if(isset($_GET["id"])){
    $idDelete = $_GET["id"];
    $namaLayanan = $_SESSION["list_fasilitas"][$idDelete]["namaLayanan"];

    unset($_SESSION["list_fasilitas"][$idDelete]);

    $_SESSION["list_fasilitas"] = array_values($_SESSION["list_fasilitas"]);

    $_SESSION["info"] = "Berhasil menghapus data $namaLayanan";

    header("Location: ./dashboard.php");
}
?>