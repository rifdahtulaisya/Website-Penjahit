<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER BU TATI JAHIT</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    <style>
        .body-profil {
            background-color: #617f46; /* Light grey background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .profile-table {
            margin-top: 20px;
        }
        .profile-table th {
            width: 30%;
            text-align: left;
            color: #333;
        }
        .profile-table td {
            width: 70%;
        }
        .logout-button {
            text-align: right;
            margin-top: 20px;
        }
        .modal-content {
            padding: 20px;
        }
        .modal-footer {
            border-top: none;
        }
        .button-order {
            color: #617f46;
        }
        .footer {
        background-color: #617f46;
        color: #fff;
        padding: 20px;
        font-size: 14px;
        display: flex;
        flex-direction: column;
    }
    .footer-bottom {
        padding-bottom: 30px;
    }
    .footer-section {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .footer-contact a, .footer-about a, .footer-about p {
        color: #fff;
        text-decoration: none;
        margin: 5px 0;
    }
    .social-links a {
        display: inline-block;
        margin-right: 10px;
    }
    .footer-bottom {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    </style>
</head>
<body class="body-profil">
    <?php
        session_start();
        if (!$_SESSION['fe_loggedin']) {
            header('Location: login.html');
            exit;
        }

        include 'admin/config.php';
        $stmt = $conn->prepare('SELECT email FROM tbluser WHERE id = ?');
        $stmt->bind_param('i', $_SESSION['fe_id']);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->fetch();
        $stmt->close();
    ?>

    <nav class="navbar navbar-expand-lg px-5 py-0">
        <a class="navbar-brand bold mb-3 text-white" href="index.php"><i class="bi bi-arrow-bar-left"></i><small> Kembali...</small></a>
    </nav>
    <div class="container mb-4">
        <h1>Welcome, <?= $_SESSION['fe_name'] ?></h1>
        <table class="table profile-table">
            <tr>
                <th>Username:</th>
                <td><?= $_SESSION['fe_name'] ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?= $email ?></td>
            </tr>
        </table>   
    </div>    
    <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!$_SESSION['fe_loggedin']) {
            header('Location: index.html');
            exit;
        }

        include 'admin/config.php';

        // Pagination Setup
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10; // Set how many records per page
        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM tbldatapesanan  WHERE createby = {$_SESSION['fe_id']} LIMIT {$start}, {$perPage}";
        $result = mysqli_query($conn, $sql);
        $resultTotal = mysqli_query($conn, "SELECT FOUND_ROWS() as total");
        $total = mysqli_fetch_assoc($resultTotal)['total'];
        $pages = ceil($total / $perPage);
    ?>
    <div class="container mb-5">
        <h1 class="text-center">DATA PESANAN SAYA</h1>
        <p class="btn btn-success">
            <a href="#" class="text-decoration-none text-white" data-bs-toggle="modal" data-bs-target="#orderModal">Order di sini <i class="bi bi-arrow-right"></i>
            </a>
        </p>
        <!-- Modal -->
        <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderModalLabel">Formulir Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Link to another page -->
                        <p>
                            <a href="pesanan.php" class="text-decoration-none text-black">
                                Order di Website
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </p>
                        <!-- Link to open a modal -->
                        <p>
                            <a href="https://wa.me/6285174089174" class="social-link" aria-label="WhatsApp">Order di whatsapp<i class="bi bi-arrow-right"></i>
                        </a>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow-x:auto;">
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                   
                    <th>JUMLAH PESANAN</th>
                    <th>JENIS PESANAN</th>
                    <th>STATUS PESANAN</th>
                    <th>PEMBAYARAN</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                          
                            <td><?= $row["jumlah"]; ?></td>
                            <td><?= $row["jenis"]; ?></td>
                            <td><?= $row["status"]; ?></td>
                            <td><?= $row["pembayaran"]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="4">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        </div>
        <nav>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <li class="page-item <?= ($page === $i) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
        <div class="logout-button">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <footer class="footer">
    <div>
        <div class="footer-bottom">
            <div class="col-auto">
                <div class="small m-0 text-white">Copyright &copy; Bu Tati Jahit Website 2024</div>
            </div>
            <div class="col-auto">
                <a class="link-light small" aria-label="WhatsApp" href="https://wa.me/6285174089174">WhatsApp</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" aria-label="Instagram" href="https://www.instagram.com/tati.jahit/">Instagram</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="privacy-policy.php">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="kritik.php">Contact</a>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!-- Bootstrap core JS-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>