<?php
include "admin/config.php";
include "header.php";
include "style.php";
include "navbar.php";
?>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <section class="py-5"> 
        <div class="container px-5 my-5">
            <h1 class="fw-bolder text-center">Produk-Produk</h1>
            <p class="lead fw-normal text-muted text-center mb-5">Produk yang sudah pernah dibuat.</p>
            <!-- Search Form -->
            <div class="search text-center mb-5">
                <form action="" method="get">
                    <select class="form-select" name="kategori" aria-label="Default select example" onchange="this.form.submit()">
                        <option selected disabled>Pilih Kategori</option>
                        <?php
                        // Fetch categories from database
                        $kategori_sql = "SELECT * FROM tblkategori";
                        $kategori_result = mysqli_query($conn, $kategori_sql);
                        while ($kategori_row = mysqli_fetch_assoc($kategori_result)) {
                            echo '<option value="'.$kategori_row['id'].'">'.$kategori_row['nama_kategori'].'</option>';
                        }
                        ?>
                    </select>
                </form>
            </div>
            <div class="row gx-5">
                <?php
                $kategori = $_GET['kategori'] ?? '';

                if ($kategori) {
                    // SQL query to fetch products based on selected category
                    $sql = "SELECT * FROM tblproduk WHERE kategori_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $kategori);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0" style="background-color: #617f46; cursor: pointer;" data-toggle="modal" data-target="#modal'.$row['id'].'">
                                    <img src="./assets/'.$row['gambarproduk'].'" class="card-img-top" alt="'.$row['judulproduk'].'">
                                    <div class="card-body p-4">
                                        <h5 class="card-title text-decoration-none link-dark stretched-link text-white">'.$row['judulproduk'].'</h5>
                                    </div>
                                </div>
                            </div>';
                            echo '<div class="modal fade" id="modal'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">'.$row['subjudulproduk'].'</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>'.$row['detailproduk'].'</p>
                                            <img src="./assets/'.$row['subgambarproduk'].'" class="img-fluid mb-5 modal-product-image" alt="'.$row['judulproduk'].'">
                                        </div>
                                        <div class="modal-footer">
                                            <a href="https://wa.me/6285174089174" type="button" class="btn btn-success social-link" aria-label="WhatsApp">Chat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo "No products found.";
                    }
                    $stmt->close();
                } else {
                    echo "Please select a category.";
                }
                ?>
            </div>
        </div>
    </section>
</main>
<?php
include "footer.php";
$conn->close();
?>
