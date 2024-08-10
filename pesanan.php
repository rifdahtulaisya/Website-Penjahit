<?php
    include "header.php";
    include "style.php";
    include "navbar.php";
    include "admin/config.php";

    // Mengecek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $telepon = $_POST['telepon'];
        $lainnya = $_POST['lainnya'];

        // Persiapan query
        $query = $conn->prepare("INSERT INTO tblpesanan (nama, jumlah, telepon, lainnya) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssss", $nama, $jumlah, $telepon, $lainnya);

        // Eksekusi query
        if ($query->execute()) {
            echo "<script>alert('Pesan telah berhasil dikirim.'); window.location.href='profil.php';</script>";
            exit; // Menambahkan exit setelah redirect
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengirim pesan.'); window.location.href='pesanan.php';</script>";
            exit; // Menambahkan exit setelah redirect
        }

        $query->close();
        $conn->close();
    }
?>

            <!-- Page content-->
            <section class="py-2">
                <div class="container px-5">
                <div class="rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                        <div class="feature text-success rounded-3 mb-1"><i class="bi bi-back"></i></div>
                            <h1 class="fw-bolder">Tempat Pemesanan</h1>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form id="contactForm" method="post">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                    <input class="form-control" name="nama" id="nama" type="text" placeholder="Ketik nama lengkap..." required />
                                        <label for="nama">Nama Lengkap</label>
                                        <div class="invalid-feedback" data-sb-feedback="nama:required">Nama Lengkap</div>
                                    </div>
                                    <!-- jumlah input-->
                                    <div class="form-floating mb-3">
                                    <input class="form-control" name="jumlah" id="jumlah" type="text" placeholder="Ketik Jumlah Pesanan..." required />
                                        <label for="jumlah">Jumlah Pesanan</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Jumlah Pesanan</div>
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                    <input class="form-control" name="telepon" id="telepon" type="tel" placeholder="(123) 456-7890" required />
                                        <label for="telepon">Nomor Telepon</label>
                                        <div class="invalid-feedback" data-sb-feedback="telepon:required">Nomor Telepon</div>
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                    <textarea class="form-control" name="lainnya" id="lainnya" type="text" placeholder="lainnya..." style="height: 10rem" required></textarea>
                                        <label for="lainnya">Lainnya</label>
                                        <div class="invalid-feedback" data-sb-feedback="lainnya:required">lainnya</div>
                                    </div>
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                    <!-- Submit Button-->
                                    <div class="d-grid">
                                    <button type="submit" name="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php
    include "footer.php";
?>