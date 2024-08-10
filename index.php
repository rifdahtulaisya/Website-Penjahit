<?php
    include "header.php";
    include "style.php";
    include "koneksi.php";
?>
    <body class="loggedin d-flex flex-column h-100">
        <main class="flex-shrink-0">
        <?php
    include "navbar.php";
?>
            <!-- Header-->
            <header class="py-3" style="background-color: #617f46;">
                <div class="container px-3">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2"><?php echo $judul1;?></h1>
                                <p class="lead fw-normal text-white-50 mb-4"><?php echo $deskrip1;?></p>
                                <a class="text-decoration-none text-white" href="#profil1">
                                    selengkapnya
                                    <i class="bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="./assets/<?php echo $logo1;?>" alt="logo" /></div>
                    </div>
                </div>
            </header>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill=" #617f46" fill-opacity="1" d="M0,192L48,213.3C96,235,192,277,288,293.3C384,309,480,299,576,261.3C672,224,768,160,864,154.7C960,149,1056,203,1152,213.3C1248,224,1344,192,1392,176L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
            
            <!-- profil section -->
            <section class="py-5" id="profil1">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <img class="img-fluid rounded-circle mb-4 px-4" src="./assets/<?php echo $profil2;?>" alt="profil1" />
            </div>
            <div class="col-lg-6">
                <h1 class="fw-bolder"><?php echo $nama2;?></h1>
                <p class="lead fw-normal text-muted mb-0">
                    Bu tati jahit atau yang bernama asli Rohati adalah seorang ibu rumah tangga. Beliau pertama kali menjahit pada usia 13 Tahun.
                    <span id="teksSelengkapnya" style="display: none;">
                    Bu tati awalnya mencoba menjahit dengan satu mesin yang ada di rumahnya pada saat itu. Bu tati pertama kali bekerja pada usia 16 Tahun di Konfeksi pabrik baju, yang berlokasi di Dramaga. Beliau bekerja disana selama 5 tahun dan di bekali ilmu tentang menjahit setelah berheti bekerja.Bu tati memulai usahanya saat baru menikah. Dahulu tempatnya menjahit berada di area dapur, dan sekarang berpindah ke lantai 2 rumahnya.
                    </span>
                </p>
                <button class="btn btn-success mt-3" onclick="bacaSelengkapnya()">Baca Selengkapnya</button>
            </div>
        </div>
    </div>
</section>
<script>
    function bacaSelengkapnya() {
        var teks = document.getElementById("teksSelengkapnya");
        var tombol = document.querySelector("button");

        if (teks.style.display === "none") {
            teks.style.display = "inline";
            tombol.innerHTML = "Tutup";
        } else {
            teks.style.display = "none";
            tombol.innerHTML = "Baca Selengkapnya";
        }
    }
</script>


            
            <!-- Team members section-->
            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h1 class="fw-bolder mb-5"><?php echo $judul3;?></h1>
                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                    <?php
                        $records = mysqli_query($sambung, 'select * from tblteam');
                        foreach ($records as $key => $value) {
                    ?> 
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="./assets/<?= $value['profil'];?>" alt="profil" />
                                <h5 class="fw-bolder"><?= $value['nama'];?></h5>
                                <div class="fst-italic text-muted"><?= $value['deskrip'];?></div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </section>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h1 class="fw-bolder mb-0"><?php echo $judul4;?></h1></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <?php
                                    $records = mysqli_query($sambung, 'select * from tblcarapesan');
                                    foreach ($records as $key => $value) {
                                ?> 
                            <div class="col mb-5 h-100">
                                <div class="feature text-success rounded-3 mb-3"><i class="bi bi-back"></i></div>
                                <h2 class="h5"><?= $value['subjudul'];?></h2>
                                <p class="mb-0"><?= $value['deskrip'];?></p>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Blog preview section-->
            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h1 class="fw-bolder mb-3"><?php echo $judul5;?></h1>
                                <img src="./assets/<?php echo $gambar5;?>" class="img-fluid mb-1" alt="produksi">
                                <figcaption class="figure-caption mb-2"><?php echo $deskrip5;?></figcaption>
                                <p class="lead fw-normal text-muted mb-0">Bu Tati jahit menyediakan Alat dan bahan yang tepat untuk pembuatan baju, terdapat 4 mesin jahit, alat pembuatan kancing, benang-benang, setrikaan, Dan banyak lagi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        
<?php
    include "footer.php";
?>