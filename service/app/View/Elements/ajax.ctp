<?php
$callback = !empty($callback) ? $callback : null;
$data = !empty($data) ? (array)$data : array('status' => 'fail', 'message' => 'NoDataFound', 'data' => null);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
if (!empty($callback)) {
	echo "{$callback}(" . json_encode($data) . ")";
} else {
	echo json_encode($data);
}

exit ;
?>
