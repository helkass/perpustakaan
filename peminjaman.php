<?php
$host =  "localhost:3306";
$user = "root";
$pass = "";
$db = "perpustakaan";

// menghubungkan db
$conn = mysqli_connect($host,$user,$pass,$db);
    if (!$conn) {
        die("tidak bisa terkoneksi ke database");
    }

    
$id_pinjam = "";
$id_buku = "";
$id_member = "";
$tanggal_pinjam = "";
$tanggal_pengembalian = "";

$success = "";
$error = "";

    // create data
    if(isset($_POST['simpan']))
    {
        // cek
        $id_pinjam = $_POST['id_pinjam'];
        $id_buku = $_POST['id_buku'];
        $id_member = $_POST['id_member'];
        $tanggal_pinjam = $_POST['tanggal_pinjam'];
        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

        if($id_pinjam && $id_buku && $id_member && $tanggal_pinjam && $tanggal_pengembalian){
            // insert data
                $sql1 = "insert into tb_pinjam(id_pinjam,id_buku,id_member,tanggal_pinjam,tanggal_pengembalian) values ('$id_pinjam','$id_buku','$id_member','$tanggal_pinjam','$tanggal_pengembalian')";
                $q1 = mysqli_query($conn,$sql1);
                // cond
                if($q1)
                {
                    $success = "buku berhasil dipinjam";
                }else{
                    $error = "gagal meminjam buku!";
                }
            }else{
                $error = "silahkan masukan data";
            }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>

        <link href="css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Classless</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                    </svg>
                                </div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="member.php">
                                <div class="sb-nav-link-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                    </svg>
                                </div>
                                Member
                            </a>
                            <a class="nav-link" href="peminjaman.php".html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Peminjaman
                            </a>
                            <a class="nav-link" href="laporanPeminjaman.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan Peminjaman
                            </a>
                            <a class="nav-link" href="laporanPengembalian.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan Pengambalian
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Peminjaman</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pinjam Buku</li>
                        </ol>
                        <!-- Button trigger modal tambah buku-->
                        <div class="mx-auto">
                            <!-- input data -->
                            <div class="card">
                                <div class="card-header">
                                    Create / edit
                                </div>
                                <div class="card-body">
                                    <div class="card-body">
                                    <form action="" method="post">
                                        <!-- book id -->
                                        <div class="mb-3 row">
                                            <label for="id_pinjam" class="col-sm-2 col-form-label">ID Pinjam</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="<?= date('m').uniqid() ?>">
                                            </div>
                                        </div>
                                        <!-- book id-->
                                        <div class="mb-3 row">
                                            <label for="id_buku" class="col-sm-2 col-form-label">ID buku</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="id_buku" name="id_buku" value="">
                                            </div>
                                        </div>
                                        <!-- id member-->
                                        <div class="mb-3 row">
                                            <label for="id_member" class="col-sm-2 col-form-label">Id Member</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="id_member" name="id_member" value="">
                                            </div>
                                        </div>
                                        <!-- tanggal rilis buku -->
                                        <div class="mb-3 row">
                                            <label for="tanggal-pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= date('Y-m-d') ?>">
                                            </div>
                                        </div>
                                        <!-- author -->
                                        <div class="mb-3 row">
                                            <label for="tanggal-pengembalian" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                                            <div class="col-sm-10">
                                                <?php $day = date('d')+7; ?>
                                                <input type="text" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="<?= date('Y-m-'.$day) ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" id="simpan" name="simpan" value="Pinjam Buku" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- end main content -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
</html>
