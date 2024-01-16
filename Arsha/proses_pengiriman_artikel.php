<?php
// Pastikan session sudah dimulai di halaman sebelumnya
session_start();
include 'koneksi.php';

// Proses pengiriman artikel
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $judul = $_POST["judul"];
    $kategori = $_POST["kategori"];
    $id_user = $_POST["id_user"];
    $isi = $_POST["isi"];
    date_default_timezone_set('Asia/Jakarta');
    $waktu_dibuat = date('Y-m-d H:i:s');
    $kehangatan = $_POST["kehangatan"];

    // Simpan data artikel ke dalam tabel artikel
    $query_artikel = "INSERT INTO artikel (judul, kategori, id_user, isi, waktu_dibuat, kehangatan) VALUES ('$judul', '$kategori', '$id_user', '$isi', '$waktu_dibuat', '$kehangatan')";
    $result_artikel = $conn->query($query_artikel);

    // Ambil id_artikel yang baru saja dimasukkan
    $id_artikel_baru = $conn->insert_id;

    // Proses upload foto
    $nama_foto = $_FILES["foto"]["name"];
    $lokasi_foto = $_FILES["foto"]["tmp_name"];
    $folder_simpan = "img/"; // Ubah sesuai dengan folder penyimpanan Anda

    // Generate nama unik untuk file foto
    $nama_unik_foto = $id_artikel_baru . ".jpg";

    // Pindahkan file foto ke folder penyimpanan
    move_uploaded_file($lokasi_foto, $folder_simpan . $nama_unik_foto);

    // Simpan data foto ke dalam tabel foto_artikel
    $query_foto = "INSERT INTO foto_artikel (nama, id_artikel) VALUES ('$nama_unik_foto', '$id_artikel_baru')";
    $result_foto = $conn->query($query_foto);


    // Redirect atau tampilkan pesan sukses
    if ($result_artikel && $result_foto) {
        header("Location: sukses.php"); // Ganti dengan halaman sukses atau redirect ke halaman lain
        exit();
    } else {
        echo "Gagal menyimpan artikel atau foto.";
    }
} else{
    header("Location: UpKisahSukses.php");
    exit();
}
?>
