<?php
	$iniciarCalendario = false;

	$guardarDataInicial = '';
	$guardarDataFinal = '';

	$logicaDataInicial = isset($_GET['dataInicial']) && $_GET['dataInicial'] != null;
	$logicaDataFinal = isset($_GET['dataFinal']) && $_GET['dataFinal'] != null;

	if($logicaDataInicial && $logicaDataInicial){
		$guardarDataInicial = $_GET['dataInicial'];
		$guardarDataFinal = $_GET['dataFinal'];

		$iniciarCalendario = true;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Configurações -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Título -->
		<title>Calendário</title>
		<!-- Estilo -->
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="scripts.js"></script>
	</head>
	<body>
		<header>
			<nav id="navegacao-topo">
				<h1><a href="index.php">Calendario</a></h1>
			</nav>
		</header>
		<form id="formulario-calendario">
			<label for="dataInicial">Data Inicial: </label>
			<input onchange="displayCalendario()" type="date" name="dataInicial" id="dataInicial" value="<?php echo $guardarDataInicial ?>">
			<label for="dataFinal">Data Final: </label>
			<input onchange="displayCalendario()" type="date" name="dataFinal" id="dataFinal" value="<?php echo $guardarDataFinal ?>">

			<span id="mensagemTeste"></span>
		</form>

		<?php if($iniciarCalendario){ ?>
			<!-- range de datas do período setado -->
			<?php
				$dataComeco = new DateTime($guardarDataInicial);
				$dataFim = new DateTime($guardarDataFinal);

				$rangeData = [];
				$indiceRangeData = 0;
				while($dataComeco <= $dataFim){
					$rangeData[$indiceRangeData] = $dataComeco->format('Y-m-d');
					$indiceRangeData++;
				    $dataComeco = $dataComeco->modify('+1day');
				}
			?>
			<!-- calendário -->
			<div id="container">
				<aside class="legendas">
					
				</aside>
				<div id="calendario">
					
				</div>
			</div>
		<?php } ?>
	</body>
</html>