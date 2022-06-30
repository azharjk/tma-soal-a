<?php

include "db.php";
include "query.php";

$conn = create_connection();

$result = get_result_query($conn);

foreach ($result as $v) {
  echo $v['html'];
}
