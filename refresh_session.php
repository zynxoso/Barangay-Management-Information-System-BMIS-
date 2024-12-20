<?php
session_start();

$timeout_duration = 15 * 60;

if (isset($_SESSION['username'])) {
    $_SESSION['LAST_ACTIVITY'] = time();
    
    if (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: 404notfound.php");
        exit();
    }
} else {
    header("Location: 404notfound.php");
    exit();
}