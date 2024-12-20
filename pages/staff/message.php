<? session_start(); ?>

<?php
    if(isset($_SESSION['messageCreate'])) :
?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Staff</strong> <?= $_SESSION['messageCreate']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    unset($_SESSION['messageCreate']);
    endif;
?>

<?php
    if(isset($_SESSION['messageUpdate'])) :
?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Staff</strong> <?= $_SESSION['messageUpdate']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    unset($_SESSION['messageUpdate']);
    endif;
?>

<?php
    if(isset($_SESSION['messageDelete'])) :
?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Staff</strong> <?= $_SESSION['messageDelete']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    unset($_SESSION['messageDelete']);
    endif;
?>