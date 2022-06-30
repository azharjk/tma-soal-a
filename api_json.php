<?php

include "db.php";
include "query.php";

$conn = create_connection();

$result = get_result_query($conn);

header('Content-Type: application/json; charset=utf-8');

$json_result = ['data' => []];

foreach ($result as $value) {
  array_push(
    $json_result['data'],
    $value['json']
  );
}

echo json_encode($json_result);
