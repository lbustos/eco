﻿<?php
// Si la pagina no es llamada por ajax se redirecciona a index
if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	header('location: index.php');
	exit;
}
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
<!-- RESULTADO -->
<div id="vitalitud-resultado" class="vitalitud" data-role="page">
    <div id="encabezado-wrapper" class="encabezado-class">
		<div data-role="header" id="encabezado">
		</div>
		<div data-role="header">
			<h1>Medí tu Vitalitud</h1>
			<a href="index.htm"  data-icon="home" data-iconpos="notext" data-direction="reverse">Inicio</a>
		</div>
	</div>
	<div data-role="content">
		<div class="grilla ui-grid-a">
			<div class="ui-block-a" ><div class="gradiente-gris imagen img_demo "><div class="medidor"></div></div></div>
			<div class="ui-block-b" >
			<h2 id="texto-puntos">Puntos</h2>
			<p id="texto-resultado">
			</p>
			<div class="cartel-vitalitud">Vitalitud, porque la vitalidad es una actitud</div>
                        </div>
		</div>
	</div>
</div>


</body>
</html>