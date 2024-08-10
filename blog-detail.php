<?php
    include "header.php";
    include "style.php";
    include "nav-blog.php";
    include 'admin/config.php';

    // Check if 'id' parameter is set in the URL
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "<p>Invalid blog post ID.</p>";
        exit;
    }

    $id = intval($_GET['id']);

    // Fetch blog data
    $sql = "SELECT * FROM tblbloghome WHERE id = $id";
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
                        <?php if (!empty($blog['profilblog'])): ?>
                            <img class="img-fluid rounded-circle" src="./assets/<?php echo htmlspecialchars($blog['profilblog']); ?>" alt="Profile Image" />
                        <?php endif; ?>
                        <div class="ms-3">
                            <div class="fw-bold"><?php echo htmlspecialchars($blog['adminblog'] ?? 'N/A'); ?></div>
                            <div class="text-muted"><?php echo htmlspecialchars($blog['namablog'] ?? 'N/A'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <article>
                        <header class="mb-4">
                            <h1 class="fw-bolder mb-1"><?php echo htmlspecialchars($blog['judulblog'] ?? 'Blog Title'); ?></h1>
                            <div class="text-muted fst-italic mb-2"><?php echo htmlspecialchars($blog['tanggalblog'] ?? 'Date Unavailable'); ?></div>
                        </header>
                        <?php if (!empty($blog['gambarblog'])): ?>
                            <figure class="mb-4">
                                <img class="img-fluid rounded" src="./assets/<?php echo htmlspecialchars($blog['gambarblog']); ?>" alt="Blog Image" />
                            </figure>
                        <?php endif; ?>
                        <section class="mb-5">
                            <h2 class="fw-bolder mb-4 mt-5"><?php echo htmlspecialchars($blog['subjudul'] ?? 'Subheading'); ?></h2>
                            <p class="fs-5 mb-4"><?php echo nl2br(htmlspecialchars($blog['text'] ?? '')); ?></p>
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