<?php
$controller = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/manager/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/manager/index.php">
                <div><strong>POO</strong>Tour <strong>ADMIN</strong></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $controller == 'newsletters' ? 'active' : '' ?>">
                <a class="nav-link " href="manager.php">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Newsletter</span>
                </a>
            </li>
            <li class="nav-item <?= $controller == 'cities' ? 'active' : '' ?>">
                <a class="nav-link" href="manager.php?controller=cities">
                    <i class="fas fa-fw fa-city"></i>
                    <span>Villes</span>
                </a>
            </li>
            <?php if ($_SESSION['role'] == 3) { ?>
                <li class="nav-item <?= $controller == 'users' ? 'active' : '' ?>">
                    <a class="nav-link" href="manager.php?controller=users">
                        <i class="fas fa-user"></i>
                        <span>Users</span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item <?= $controller == 'hotels' ? 'active' : '' ?>">
                <a class="nav-link" href="manager.php?controller=hotels">
                    <i class="fas fa-hotel"></i>
                    <span>Hôtels</span>
                </a>
            </li>
            <li class="nav-item <?= $controller == 'flights' ? 'active' : '' ?>">
                <a class="nav-link" href="manager.php?controller=flights">
                    <i class="fas fa-plane"></i>
                    <span>Vols</span>
                </a>
            </li>
            <li class="nav-item <?= $controller == 'offers' ? 'active' : '' ?>">
                <a class="nav-link" href="manager.php?controller=offers">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Offres</span>
                </a>
            </li>
            <li class="nav-item <?= $controller == 'services' ? 'active' : '' ?>">
                <a class="nav-link" href="manager.php?controller=services">
                    <i class="fas fa-concierge-bell"></i>
                    <span>Services</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
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
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    Bienvenue, <b><?= $_SESSION['Firstname'] ?> <?= $_SESSION['Lastname'] ?></b>
                                </span>

                                <img class="img-profile img-fluid rounded-circle" src="<?= isset($_SESSION['avatar']) && file_exists('./public/upload/' . $_SESSION['avatar']) ? './public/upload/' . $_SESSION['avatar'] : 'https://www.gravatar.com/avatar/' . md5($_SESSION['email']) ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="manager.php?controller=users&action=logout">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Users
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Gestion des message flash error ou success  -->
                <?php if (isset($flash['message'])) { ?>
                    <?php require('view/components/alert.php'); ?>
                <?php } ?>

                <!-- Contenue de nos pages  -->
                <?= $content ?>


            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="manager.php?controller=users&action=logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="public/manager/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="public/manager/js/demo/datatables-demo.js"></script>
    <script src="public/manager/js/ajax.js"></script>
</body>

</html>