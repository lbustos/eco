<?php
// Si la pagina no es llamada por ajax se redirecciona a index
//if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
//	header('location: index.php');
//	exit;
//}
$str_data = file_get_contents("data/vitalitud.json");
$preguntas = json_decode(utf8_encode($str_data),true);
$ver = (isset($_GET['pregunta']))? (int)$_GET['pregunta'] : 0;
if (is_array($preguntas) && isset($preguntas['data']) && $ver > 0 && $ver <= count($preguntas['data'])){
?>
	<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Eco de los Andes ONE - Tu vitalitud </title>
		
		<link rel="stylesheet" href="css/eco-c.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
		<link rel="stylesheet" href="css/main.css" />
		<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
		<script src="js/enclave.js"></script>
	</head>
	<body>
	<div id="vitalitud-<?php echo $ver?>" class="vitalitud preguntas" data-role="page">
		<div id="encabezado-wrapper" class="encabezado-class">
			<div data-role="header" data-id="persistent" id="encabezado">
			</div>
		</div>
		<div data-role="content">
			<div class="grilla ui-grid-a">
				<div class="ui-block-a" ><div class="imagen img_demo"><span><?php echo $ver?></span></div></div>
				<div class="ui-block-b" >
					<h2><?php echo $preguntas['data'][$ver-1]['pregunta']?></h2>
					<p>
						<div data-role="fieldcontain">
					<?php 
						if (is_array($preguntas['data'][$ver-1]['opciones'])):
						$cantidad = 0;
						foreach($preguntas['data'][$ver-1]['opciones'] as $opciones):
									$cantidad++;
									echo '<input type="radio" name="v'.$cantidad.'" id="vitalitud-'.($ver).$cantidad.'" value="'.($ver).'_'.$cantidad.'" />';
									echo '<label for="vitalitud-'.($ver).$cantidad.'">'.$opciones['texto'].'</label>';
						endforeach;
						endif;
					?>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>
	</body>
	</html>
<?php 
}else{
	header('location:index.php');
	exit();
} 
?>