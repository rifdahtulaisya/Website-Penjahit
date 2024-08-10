<?php
    session_start();
   // session_destroy();
    // Redirect to the login page:
    $_SESSION['fe_loggedin'] = FALSE;
    $_SESSION['fe_name'] = FALSE;
    $_SESSION['fe_id'] = FALSE;
    header('Location: login.html');
?>