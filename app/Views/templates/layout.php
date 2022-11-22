<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href=<?= base_url("assets/vendor/fontawesome-free/css/all.min.css") ?> rel="stylesheet" type="text/css">
    <link rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=<?= base_url("assets/css/sb-admin-2.min.css") ?> rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href=<?= base_url("assets/vendor/datatables/dataTables.bootstrap4.min.css") ?> rel="stylesheet">
    <!-- <script src="https://kit.fontawesome.com/edfb891730.js" crossorigin="anonymous"></script> -->





</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?= $this->include("templates/navbar"); ?>



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

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('nama'); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/riau.png') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?= $this->renderSection("content"); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> &copy; Dinas Peternakan dan Kesehatan Hewan Provinsi Riau <?= date('Y'); ?></span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">yakin mau keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">pilih logout jika ingin keluar dari sistem.</div>
                <div class="modal-footer">
                    <form action="<?= base_url('logout') ?>" method="POST">
                        <?= csrf_field() ?>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Logout</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap core JavaScript-->
    <script src=<?= base_url("assets/vendor/jquery/jquery.min.js") ?>></script>
    <script src=<?= base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>></script>

    <!-- Core plugin JavaScript-->
    <script src=<?= base_url("assets/vendor/jquery-easing/jquery.easing.min.js") ?>></script>

    <!-- Custom scripts for all pages-->
    <script src=<?= base_url("assets/js/sb-admin-2.min.js") ?>></script>
    <!-- Page level plugins -->
    <script src=<?= base_url("assets/vendor/datatables/jquery.dataTables.min.js") ?>></script>
    <script src=<?= base_url("assets/vendor/datatables/dataTables.bootstrap4.min.js") ?>></script>

    <!-- Page level custom scripts -->
    <script src=<?= base_url("assets/js/demo/datatables-demo.js") ?>></script>

    <?= $this->renderSection('script') ?>

</body>

</html>