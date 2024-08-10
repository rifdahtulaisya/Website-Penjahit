<?php
    include "header.php";
    include "style.php";
    include "navbar.php";
    include 'admin/config.php';

    // Fetch blog data
    $sql = "SELECT * FROM tblbloghome";
    $result = $conn->query($sql);
?>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <section class="py-5">
        <div class="container px-5 my-5">
            <h1 class="fw-bolder text-center">Blog Informasi</h1>
            <p class="lead fw-normal text-muted text-center mb-5">Kumpulan Informasi.</p>
            <?php 
            if ($result->num_rows > 0) {
                while ($data = $result->fetch_assoc()) {
                    $controlTarget = htmlspecialchars($data['kontrol1'], ENT_QUOTES);
                    $controlExpanded = htmlspecialchars($data['kontrol2'], ENT_QUOTES);
                    $controlId = htmlspecialchars($data['kontrol3'], ENT_QUOTES);
                    $status = ($data['statusblogh'] === 'true') ? 'true' : 'false'; // Ensure this is a string 'true' or 'false'

                    echo '<div class="container px-5">';
                    echo '<div class="accordion" id="accordionPanelsStayOpenExample">';
                    echo '<div class="accordion-item">';
                    echo '<h2 class="accordion-header" id="heading' . $controlId . '">';
                    echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse' . $controlTarget . '" aria-expanded="' . $status . '" aria-controls="panelsStayOpen-collapse' . $controlExpanded . '">' . $data['judulblogh'] . '</button>';
                    echo '</h2>';
                    echo '<div id="panelsStayOpen-collapse' . $controlId . '" class="accordion-collapse collapse ' . ($status === 'true' ? 'show' : '') . '" aria-labelledby="heading' . $controlId . '">';
                    echo '<div class="accordion-body">' . $data['deskripblogh'] . '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No blog posts found.</p>";
            }
            ?>
        </div>
    </section>
</main>
<?php
    include "footer.php";
    $conn->close();
?>