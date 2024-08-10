<?php
    session_start();
    include 'admin/config.php';
    if ( !isset($_POST['username'], $_POST['password']) ) {
        exit('Silahkan isi username dan password lebih dahulu!');
    }
    if ($stmt=$conn->prepare('SELECT id, password FROM tbluser WHERE username=?')){
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            if (password_verify($_POST['password'], $password)) {
                session_regenerate_id();
                $_SESSION['fe_loggedin'] = TRUE;
                $_SESSION['fe_name'] = $_POST['username'];
                $_SESSION['fe_id'] = $id;
                header('Location: profil.php');
            } 
            else {
                echo 'Incorrect username and/or password!';
                header('Location: login.html');
            }
        } 
            else {
                echo '<script> alert ("Incorrect username and/or password!")</script>';
                //die();
                header('Location: login.html');
            }
    } 
    else {
        echo '<script> alert ("Incorrect username and/or password!")</script>';
        //die();
        header('Location: login.html');
    }
    $stmt->close();
    
?>