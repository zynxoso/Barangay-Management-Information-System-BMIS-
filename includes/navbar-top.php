<?php
   session_start();

   $timeout_duration = 15 * 60;

   if (!isset($_SESSION['username'])) {
       header('location:../../login.php');
       exit();
   }

   // The code logs the user out and redirects them to the login page if their session has been inactive for too long.
   if (isset($_SESSION['LAST_ACTIVITY'])) {
       if (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration) {
           session_unset(); 
           session_destroy(); 
           header('location:../../login.php'); 
           exit();
       }
   }
   $_SESSION['LAST_ACTIVITY'] = time();   

?>

<head>
   <meta charset="utf=8">
   <title>Home</title
   <link rel="icon" href="assets/image/logo.png" type="image/icon type">
</head>

<!-- NAVBAR -->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-color-nav" style="background-color: #4CAF50;">
   <!-- Navbar Brand-->
   <a class="navbar-brand ps-2 text-center" style="color: #fff; font-weight: bold;" href="#">San Agustin</a>
   <!-- Sidebar Toggle-->
   <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" style="color: #fff; font-weight: bold;" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
   <!-- Navbar -->
   <span class="ms-auto">
      <ul class="navbar-nav ms-md-0 me-3 me-lg-4">
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: #fff;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="fas fa-user fa-fw"></i> <?php echo $_SESSION['username']; ?> 
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item logout-link" href="#">Logout <i class="float-end bi bi-box-arrow-right text-danger"></i></a></li>
            </ul>
         </li>
      </ul>
   </span>
</nav>

<!-- This script handles logout confirmation with a SweetAlert prompt and resets the session timer on user activity to prevent session timeout. -->
<script>
   document.querySelector('.logout-link').addEventListener('click', function (event) {
      event.preventDefault();
      Swal.fire({
         title: 'Are you sure?',
         text: "You will be logged out.",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, logout!'
      }).then((result) => {
         if (result.isConfirmed) {
            window.location.href = '../../logout.php';
         }
      });
   });

   document.addEventListener('mousemove', resetTimer);
   document.addEventListener('keypress', resetTimer);

   function resetTimer() {
       fetch('path/to/refresh_session.php', { method: 'POST' });
   }
</script>
