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

    
$id_member = "";
$nama_member = "";
$jenis_kelamin = "";
$nomor_telp = "";

$success = "";
$error = "";

    // get url untuk operasi edit dll
    if(isset($_GET['op'])){
        $op = $_GET['op'];
    }else{
        $op = "";
    }

    // delete
    if($op == 'delete'){
        $id = $_GET['id'];
        $sql1 = "DELETE FROM tb_member WHERE id_member = '$id'";
        $q1 = mysqli_query($conn, $sql1);

        if($q1){
            $success = "Data berhasil di delete!";
        }else{
            $error = "Data Gagal di delete!";
        }
    }

        if($op == 'edit'){
            $id_member = $_GET['id'];
            $sql1 = "SELECT * FROM tb_member where id_member = '$id_member'";
            $q1 = mysqli_query($conn, $sql1);
            $r1 = mysqli_fetch_array($q1);

            // out data
            $id_member = $r1['id_member'];
            $nama_member = $r1['nama_member'];
            $jenis_kelamin = $r1['jenis_kelamin'];
            $nomor_telp = $r1['nomor_telp'];

            // if data doesn't exist
            if($id_member == ''){
                $error = "Data tidak ditemukan";
            }
        }

    // create data
    if(isset($_POST['simpan']))
    {
        // cek
        $id_buku = $_POST['id_member'];
        $nama_member = $_POST['nama_member'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $nomor_telp = $_POST['nomor_telp'];

        if( $id_member && $nama_member && $jenis_kelamin && $nomor_telp )
        {

            // update data
            if($op == 'edit')
            {
                $sql1 = "UPDATE tb_member SET id_member = '$id_member',nama_member = '$nama_member', jenis_kelamin = '$jenis_kelamin', nomor_telp = '$nomor_telp' WHERE id_member = '$id_member'";
                $q1 = mysqli_query($conn, $sql1);
                if($q1)
                {
                    $success = "Data berhasil di update!";
                }else{
                    $error = "Data gagal diupdate!";
                }
            }else{ //insert data
                $sql1 = "insert into tb_member(id_member,nama_member,jenis_kelamin,nomor_telp) values ('$id_member','$nama_member','$jenis_kelamin','$nomor_telp')";
                $sql = mysqli_query($conn,$sql1);
                // cond
                if($db)
                {
                    $success = "berhasil memasukan data baru";
                }else{
                    $error = "gagal memasukan data!";
                }
            }
        }else{
            $error = "Silahkan masukan semua data!";
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <!-- card dashboard -->
                        <div class="row">
                            <div class="col-xl-5 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-header">Jumlah member</div>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div class="sb-nav-link-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                            </svg>
                                        </div>
                                        <?php
                                        
                                        $sql3 = 'SELECT * FROM tb_member';
                                        $q3 = mysqli_query($conn, $sql3);

                                        $jumlah_member = mysqli_num_rows($q3)
                                        ?>
                                        <div class="jumlah mx-xl-3 mx-md-2" style="font-size: 34px;"><?= $jumlah_member ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-header">Member aktif</div>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div class="sb-nav-link-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                            </svg>
                                        </div>
                                        <?php
                                        $sql4 = 'SELECT * FROM tb_pinjam';
                                        $q4 = mysqli_query($conn, $sql4);

                                        $jumlah_member_aktif = mysqli_num_rows($q4);
                                        ?>
                                        <div class="mx-xl-3 mx-md-2" style="font-size: 34px;"><?= $jumlah_member_aktif ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal tambah buku-->
                        <div class="mx-auto">
                            <!-- input data -->
                            <div class="card">
                                <div class="card-header">
                                    Create / edit
                                </div>
                                <div class="card-body">
                                    <?php 
                                    if($error) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <div>
                                                <?php echo $error ?>
                                            </div>
                                        </div>
                                    <?php
                                    /* redirect */
                                    header('refresh:2;url=member.php');//setelah 3 detik
                                    }
                                    ?>
                                    <?php
                                    if($success){?>
                                        <div class="alert alert-success" role="alert">
                                            <?=$success?>
                                        </div>
                                    <?php
                                    header('refresh:2;url=member.php');
                                    }?>
                                    <form action="" method="post">
                                        <!-- book id -->
                                        <div class="mb-3 row">
                                            <label for="id_member" class="col-sm-2 col-form-label">ID</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="id_member" name="id_member" value="<?= $id_member ?>">
                                            </div>
                                        </div>
                                        <!-- book name -->
                                        <div class="mb-3 row">
                                            <label for="nama_member" class="col-sm-2 col-form-label">Nama member</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_member" name="nama_member" value="<?= $nama_member ?>">
                                            </div>
                                        </div>
                                        <!-- judul buku -->
                                        <div class="mb-3 row">
                                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis kelamin</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $jenis_kelamin ?>">
                                            </div>
                                        </div>
                                        <!-- tanggal rilis buku -->
                                        <div class="mb-3 row">
                                            <label for="nomor_telp" class="col-sm-2 col-form-label">Nomor Telp</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" value="<?= $nomor_telp ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" name="simpan" value="simpan data" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- output data-->
                            <div class="card">
                                <div class="card-header text-white bg-secondary">
                                    Data Member
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ID Member</th>
                                                <th scope="col">Nama Member</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">Nomor Telp</th>
                                            </tr>
                                            <tbody>
                                                <?php
                                                $sql2 = "SELECT * FROM tb_member ORDER BY nama_member ASC";
                                                $q2 = mysqli_query($conn, $sql2);
                                                $count = 0;

                                                while($r2 = mysqli_fetch_array($q2)){
                                                    $id_member = $r2['id_member'];
                                                    $nama_member = $r2['nama_member'];
                                                    $jenis_kelamin = $r2['jenis_kelamin'];
                                                    $nomor_telp = $r2['nomor_telp'];
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?=$count=+1?></th>
                                                        <td scope="row"><?=$id_member?></td>
                                                        <td scope="row"><?=$nama_member?></td>
                                                        <td scope="row"><?=$jenis_kelamin?></td>
                                                        <td scope="row"><?=$nomor_telp?></td>
                                                        <td scope="row">
                                                            <a href="member.php?op=edit&id=<?=$id_member?>">
                                                                <button type="button" class="edit btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                                            </a>
                                                            <a href="member.php?op=delete&id=<?=$id_member?>">
                                                                <button type="button" class="btn btn-danger" onclick=" return confirm('Delete temen ta?')">Delete</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </thead>
                                    </table>
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
