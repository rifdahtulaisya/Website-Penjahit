<?php
    include "header.php";
    include "style.php";
    include "nav-blog.php";
    include 'admin/config.php'; // Include your database configuration file

    // Fetch blog data
    $sql = "SELECT * FROM tblblog WHERE id=1"; // Example: Fetching the first blog entry
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $blog = $result->fetch_assoc();
    } else {
        echo "<p>No blog post found.</p>";
        exit;
    }
?>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <section class="py-2">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center mt-lg-5 mb-4">
                        <img class="img-fluid rounded-circle" src="./assets/<?php echo $blog['profilblog']; ?>" alt="Profile Image" />
                        <div class="ms-3">
                            <div class="fw-bold"><?php echo $blog['adminblog']; ?></div>
                            <div class="text-muted"><?php echo $blog['namablog']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <article>
                        <header class="mb-4">
                            <h1 class="fw-bolder mb-1"><?php echo $blog['judulblog']; ?></h1>
                            <div class="text-muted fst-italic mb-2"><?php echo $blog['tanggalblog']; ?></div>   
                        </header>
                        <figure class="mb-4">
                            <img class="img-fluid rounded mb-2" src="./assets/<?php echo $blog['gambarblog']; ?>" alt="Blog Image" />
                        </figure>
                        <section class="mb-5">
                            <h3 class="fw-bolder mb-4 mt-5"><?php echo $blog['subjudul']; ?></h3>
                            <p class="fs-5 mb-4"><?php echo nl2br($blog['text']); ?></p>
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
    include "footer.php";
    $conn->close();
?>