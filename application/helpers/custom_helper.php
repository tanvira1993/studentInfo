<?php 

function json_success($data = array(), $status = 200, $executeDuration = "")
{
	echo json_encode(array('success'=>1,'data'=>$data, 'executeTime' => $executeDuration));

}
?>