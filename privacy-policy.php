<?php
include "header.php"; // Menyertakan header
include "style.php";
include "navbar.php"; // Menyertakan navbar
include "admin/config.php"; // Menyertakan file konfigurasi untuk koneksi database
include "koneksi.php";
?>

<main class="container my-5">
    <h1>Kebijakan Privasi</h1>
    <div class="text-justify mb-4">
        <p><?php echo $konten1;?></p>
    </div>
    <h2 class="mb-2">Pengumpulan dan Penggunaan Informasi Pribadi</h2>
    <div class="text-justify">
        <h4>Pendaftaran Akun:</h4>
        <p class="mb-3"><?php echo $konten2;?></p>
        <h4>Pemesanan:</h4>
        <p class="mb-3"><?php echo $konten3;?></p>
        <h4>Komunikasi: </h4>
        <p class="mb-3"><?php echo $konten4;?></p>
        <h4>Penggunaan WhatsApp: </h4>
        <p class="mb-3"><?php echo $konten5;?></p>
    </div>
</main>
<?php 
    include "footer.php";
?>