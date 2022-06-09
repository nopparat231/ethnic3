<!DOCTYPE html>
<html lang="en">
<?php include("../Connect.php"); ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Pages</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- ค้นหาไอค่อน -->
    <!-- https://fontawesome.com/v4/icons/ -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="index.php?ethnic">
                    <i class="fas fa-list-ul" aria-hidden="true"></i>
                    <span>ชาติพันธุ์</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?amcustom">
                    <i class="fas fa-list-ul" aria-hidden="true"></i>
                    <span>ประเพณี</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?amfood">
                    <i class="fas fa-list-ul" aria-hidden="true"></i>
                    <span>อาหาร</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?amclothes">
                    <i class="fas fa-list-ul" aria-hidden="true"></i>
                    <span>เสื้อผ้า</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?amallplace">
                    <i class="fas fa-map-marker" aria-hidden="true"></i>
                    <span>สถานที่</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?users">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>จัดการผู้ใช้งาน</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                    <span> ออกจากระบบ </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                
                    <?php

                    if (isset($_GET['ethnic'])) {
                        include('ethnic.php');
                    } elseif (isset($_GET['amcustom'])) {
                        include('amcustom.php');
                    } elseif (isset($_GET['amfood'])) {
                        include('amfood.php');
                    } elseif (isset($_GET['amclothes'])) {
                        include('amclothe.php');
                    } elseif (isset($_GET['amallplace'])) {
                        include('amallplace.php');
                    } elseif (isset($_GET['users'])) {
                        include('users.php');
                    } else {
                        echo "<h1 class='h3 mb-4 text-gray-800'>ยินดีต้อนรับ Admin</h1>";
                    }

                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ethnic 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>