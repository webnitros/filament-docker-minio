<?php

$file = BASE_DIR . 'database/_backup/2023-09-16T010101+0000.sql';
$filename = '2023-09-16T010101+0000.sql';
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $filename . '"');
readfile($file);
exit();

