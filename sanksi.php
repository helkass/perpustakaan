<?php

$denda = '2000';
$date_now = date_create();
$date = date_create("2022-01-20");
$diff = date_diff($date, $date_now);

// get data from laporanPeminjaman jika tanggal melebihi batas
// code here
// end

$total_denda = $diff*$denda; //denda 2000 per hari

echo 'terlambat ' . $diff->days . ' hari';
echo '<br>';
echo 'total denda yang harus dibayar = ' . $total_denda;

