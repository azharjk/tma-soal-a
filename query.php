<?php

function get_result_query($conn): array
{
  $sql = file_get_contents('klasifikasi_penilaian.sql');

  $result = $conn->query($sql);
  if (!$result) {
    die('MYSQL query failed: ' . $conn->errno);
  }

  $ret = [];

  foreach ($result->fetch_all() as $value) {
    $id = $value[0];
    $nama = $value[1];
    $jabatan = $value[2];
    $penilaian = $value[3];
    $klasifikasi_penilaian = $value[4];

    $json = [
      'id' => $id,
      'nama' => $nama,
      'jabatan' => $jabatan,
      'penilaian' => $penilaian,
      'klasifikasi_penilaian' => $klasifikasi_penilaian,
    ];

    $html = '';

    switch ($klasifikasi_penilaian) {
      case 'B':
        $html = '<p>Nama: ' . $nama . ', Jabatan: ' . $jabatan  . ', Penilaian: ' . $penilaian . ', Klasifikasi Penilaian: <span style="color: lightblue;">' . $klasifikasi_penilaian . '</p>';;
        break;
      case 'A':
        $html = '<p>Nama: ' . $nama . ', Jabatan: ' . $jabatan  . ', Penilaian: ' . $penilaian . ', Klasifikasi Penilaian: <span style="color: blue;">' . $klasifikasi_penilaian . '</p>';
        break;
      case 'A+':
        $html = '<p>Nama: ' . $nama . ', Jabatan: ' . $jabatan  . ', Penilaian: ' . $penilaian . ', Klasifikasi Penilaian: <span style="color: green;">' . $klasifikasi_penilaian . '</p>';
        break;
      default:
        $html = '<p>Nama: ' . $nama . ', Jabatan: ' . $jabatan  . ', Penilaian: ' . $penilaian . ', Klasifikasi Penilaian: ' . $klasifikasi_penilaian . '</p>';
    }

    array_push($ret, [
      'html' => $html,
      'json' => $json
    ]);
  }

  $result->free_result();

  return $ret;
}
