<?php

$conn = new mysqli("localhost", "root", "12345678", "tma_soal_a");

if ($conn->connect_errno) {
  die('MYSQL connection failed: ' . $conn->connect_errno);
}

$sql = file_get_contents('klasifikasi_penilaian.sql');

$result = $conn->query($sql);
if (!$result) {
  die('MYSQL query failed: ' . $conn->errno);
}

foreach ($result->fetch_all() as $value) {
  $nama = $value[1];
  $jabatan = $value[2];
  $penilaian = $value[3];
  $klasifikasi_penilaian = $value[4];

  switch ($klasifikasi_penilaian) {
    case 'B':
      echo '<p>Nama: ' . $nama . ', Jabatan: ' . $jabatan  . ', Penilaian: ' . $penilaian . ', Klasifikasi Penilaian: <span style="color: lightblue;">' . $klasifikasi_penilaian . '</p>';
      break;
    case 'A':
      echo '<p>Nama: ' . $nama . ', Jabatan: ' . $jabatan  . ', Penilaian: ' . $penilaian . ', Klasifikasi Penilaian: <span style="color: blue;">' . $klasifikasi_penilaian . '</p>';
      break;
    case 'A+':
      echo '<p>Nama: ' . $nama . ', Jabatan: ' . $jabatan  . ', Penilaian: ' . $penilaian . ', Klasifikasi Penilaian: <span style="color: green;">' . $klasifikasi_penilaian . '</p>';
      break;
    default:
      echo '<p>Nama: ' . $nama . ', Jabatan: ' . $jabatan  . ', Penilaian: ' . $penilaian . ', Klasifikasi Penilaian: ' . $klasifikasi_penilaian . '</p>';
  }
}
