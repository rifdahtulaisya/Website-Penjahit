<?php
    session_start();
    include 'admin/config.php';

    if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        exit('Silakan isi username, password, dan email!');
    }

    if ($stmt = $conn->prepare('SELECT id FROM tbluser WHERE username = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        
        // Cek jika username sudah ada
        if ($stmt->num_rows > 0) {
            echo 'Username sudah digunakan, silakan pilih username lain!';
            header('Location: register.html');
        } else {
            // Username belum ada, lanjutkan proses registrasi
            if ($insert = $conn->prepare('INSERT INTO tbluser (username, password, email) VALUES (?, ?, ?)')) {
                // Gunakan password_hash untuk mengamankan password
                $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $insert->bind_param('sss', $_POST['username'], $passwordHash, $_POST['email']);
                $insert->execute();
                $insert->close();
                
                // Login user setelah pendaftaran berhasil
                $_SESSION['fe_loggedin'] = TRUE;
                $_SESSION['fe_name'] = $_POST['username'];
                $_SESSION['fe_id'] = $conn->insert_id;  // Dapatkan ID yang baru dibuat
                
                // Tampilkan pemberitahuan dan alihkan ke halaman profil
                echo '<script>
                        alert("Pendaftaran berhasil! Anda akan diarahkan ke halaman profil.");
                        window.location.href="profil.php";
                      </script>';
            } else {
                echo 'Tidak dapat menjalankan query!';
            }
        }
        $stmt->close();
    } else {
        echo 'Tidak dapat menjalankan query!';
    }
    $conn->close();
?>