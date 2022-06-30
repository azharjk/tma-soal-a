<?php

function create_connection(): mysqli
{
  $conn = new mysqli("localhost", "root", "12345678", "tma_soal_a");

  if ($conn->connect_errno) {
    die('MYSQL connection failed: ' . $conn->connect_errno);
  }

  return $conn;
}
