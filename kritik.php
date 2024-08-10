<?php
    include "header.php";
    include "style.php";
    include "navbar.php";
    include "admin/config.php";

    // Mengecek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $nama = $_POST['nama'];
        $kritik = $_POST['kritik'];

        // Persiapan query
        $query = $conn->prepare("INSERT INTO tblkritik (nama, kritik) VALUES (?, ?)");
        $query->bind_param("ss", $nama, $kritik);

        // Eksekusi query
        if ($query->execute()) {
            echo "<script>alert('Pesan telah berhasil dikirim.'); window.location.href='kritik.php';</script>";
            exit; // Menambahkan exit setelah redirect
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengirim pesan.'); window.location.href='kritik.php';</script>";
            exit; // Menambahkan exit setelah redirect
        }

        $query->close();
        $conn->close();
    }
?>
            <!-- Page content-->
            <section class="py-2">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                        <div class="feature text-success rounded-3 mb-1"><i class="bi bi-back"></i></div>
                            <h1 class="fw-bolder">Pesan</h1>
                            <p class="lead fw-normal text-muted mb-0">Bila ada Keluhan atau saran, silahkan kirim pesan.</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form id="contactForm" method="post">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                    <input class="form-control" name="nama" id="nama" type="text" placeholder="Ketik Nama anda..." required />
                                        <label for="nama">Nama Lengkap</label>
                                        <div class="invalid-feedback" data-sb-feedback="nama:required">Isi nama lengkap anda</div>
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                    <textarea class="form-control" name="kritik" id="kritik" type="text" placeholder="Ketik Pesan anda..." style="height: 10rem" required></textarea>
                                        <label for="kritik">Kritik dan Saran</label>
                                        <div class="invalid-feedback" data-sb-feedback="kritik:required">Isi Pesan</div>
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