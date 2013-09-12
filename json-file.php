<?php
if(isset($_GET['j']) && !empty($_GET['j'])){
	$str_data = file_get_contents("data/".$_GET['j'].".json");
	echo utf8_encode($str_data);
}
