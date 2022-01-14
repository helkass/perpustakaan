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

    
$id_buku = "";
$nama_buku = "";
$judul_buku = "";
$tanggal_rilis = "";
$author = "";
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
        $sql1 = "DELETE FROM tb_book WHERE id = '$id'";
        $q1 = mysqli_query($conn, $sql1);

        if($q1){
            $success = "Data berhasil di delete!";
        }else{
            $error = "Data Gagal di delete!";
        }
    }

    if($op == 'edit'){
        $id_buku = $_GET['id'];
        $sql1 = "SELECT * FROM tb_book where id = '$id_buku'";
        $q1 = mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_array($q1);

        // out data
        $id_buku = $r1['id'];
        $nama_buku = $r1['nama_buku'];
        $judul_buku = $r1['judul_buku'];
        $tanggal_rilis = $r1['tanggal_rilis'];
        $author = $r1['author'];

        // if data doesn't exist
        if($id_buku == ''){
            $error = "Data tidak ditemukan";
        }
    }

    // create data
    if(isset($_POST['simpan']))
    {
        // cek
        $id_buku = $_POST['id_buku'];
        $nama_buku = $_POST['nama_buku'];
        $judul_buku = $_POST['judul_buku'];
        $tanggal_rilis = $_POST['tanggal_rilis'];
        $author = $_POST['author'];

        if( $id_buku && $nama_buku && $judul_buku && $tanggal_rilis && $author )
        {

            // update data
            if($op == 'edit')
            {
                $sql1 = "UPDATE tb_book SET id = '$id_buku',nama_buku = '$nama_buku', judul_buku = '$judul_buku', tanggal_rilis = '$tanggal_rilis', author = '$author' WHERE id = '$id_buku'";
                $q1 = mysqli_query($conn, $sql1);
                if($q1)
                {
                    $success = "Data berhasil di update!";
                }else{
                    $error = "Data gagal diupdate!";
                }
            }else{ //insert data
                $sql1 = "insert into tb_book(id,nama_buku,judul_buku,tanggal_rilis,author) values ('$id_buku','$nama_buku','$judul_buku','$tanggal_rilis','$author')";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .mx-auto{
            max-width: 800px;
        }
        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
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
                header('refresh:3;url=index.php');//setelah 3 detik
                }
                ?>
                <?php
                if($success){?>
                    <div class="alert alert-success" role="alert">
                        <?=$success?>
                    </div>
                <?php
                header('refresh:3;url=index.php');
                }?>
                <form action="" method="post">
                    <!-- book id -->
                    <div class="mb-3 row">
                        <label for="id_buku" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?= $id_buku ?>">
                        </div>
                    </div>
                    <!-- book name -->
                    <div class="mb-3 row">
                        <label for="nama_buku" class="col-sm-2 col-form-label">Nama buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?= $nama_buku ?>">
                        </div>
                    </div>
                    <!-- judul buku -->
                    <div class="mb-3 row">
                        <label for="judul_buku" class="col-sm-2 col-form-label">Judul buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?= $judul_buku ?>">
                        </div>
                    </div>
                    <!-- tanggal rilis buku -->
                    <div class="mb-3 row">
                        <label for="tgl-rilis" class="col-sm-2 col-form-label">Tanggal liris</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_rilis" name="tanggal_rilis" value="<?= $tanggal_rilis ?>">
                        </div>
                    </div>
                    <!-- author -->
                    <div class="mb-3 row">
                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author" name="author" value="<?= $author ?>">
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
                Data buku
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Tanggal rilis</th>
                            <th scope="col">Author</th>
                            <th scope="col">aksi</th>
                        </tr>
                        <tbody>
                            <?php
                            $sql2 = "SELECT * FROM tb_book ORDER BY id DESC";
                            $q2 = mysqli_query($conn, $sql2);
                            $sort = 1;

                            while($r2 = mysqli_fetch_array($q2)){
                                $id = $r2['id'];
                                $nama = $r2['nama_buku'];
                                $judul = $r2['judul_buku'];
                                $tanggal = $r2['tanggal_rilis'];
                                $author = $r2['author'];

                                ?>
                                <tr>
                                    <th scope="row"><?=$sort?></th>
                                    <td scope="row"><?=$id?></td>
                                    <td scope="row"><?=$nama?></td>
                                    <td scope="row"><?=$judul?></td>
                                    <td scope="row"><?=$tanggal?></td>
                                    <td scope="row"><?=$author?></td>
                                    <td scope="row">
                                        <a href="index.php?op=edit&id=<?=$id?>">
                                            <button type="button" class="btn btn-warning">Edit</button>
                                        </a>
                                        <a href="index.php?op=delete&id=<?=$id?>">
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>