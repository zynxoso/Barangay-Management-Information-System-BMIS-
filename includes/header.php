<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />

      <link rel="icon" href="assets/image/systemlogo.png" type="image/icon type">
      
      <title>SAN AGUSTIN ACCESS</title>

      <!-- SweetAlert CSS: Provides a customizable alert box -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

      <!-- SweetAlert2: Customizable alert boxes -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <!-- DataTables CSS: Enables responsive tables -->
      <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet" />

      <!-- MDB UI Kit CSS: Material Design Bootstrap framework -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />

      <!-- Font Awesome Icons: Provides various icons -->
      <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

      <!-- jsPDF: Enables PDF generation -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

      <!-- jsPDF AutoTable: Enables automatic table generation in PDFs -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

      <!-- XLSX: Enables Excel file generation -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
      
      <!-- Simple DataTables CSS: Customizable data tables -->
      <link href="assets/simple-datatables/dist/style.css" rel="stylesheet" />

      <!-- Font Awesome JavaScript: Initializes Font Awesome icons -->
      <link rel="stylesheet" href="assets/fontawesome/js/fontawesome.min.js">

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <link href="assets/css/styles.css" rel="stylesheet" />
   </head>
   <!-- to disable scroll bar but scroll is working -->
   <style>
      body::-webkit-scrollbar {
      display: none;
      }
      .dataTables_filter button {
      border-radius: 14px;
      }
   </style>

   <body class="sb-nav-fixed container-fluid">

      <!-- to keep show dropdown list -->
      <?php include ('active.php') ?>

      <!-- to include each part of the page. -->
      <?php include 'navbar-top.php'; ?>

      <div id="layoutSidenav">
      <?php include 'sidebar.php'; ?>

      <div id="layoutSidenav_content">
         
      <main>