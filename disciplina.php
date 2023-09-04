<html>
	<head>
		<title>Disciplinas</title>
		<style>
		.formulario
				{
					background-color: #27285C;
					color: black;
					display: inline-block;
					position: relative;
					left: 40%;
					right: 40%;
					top: 100px;
					border-radius: 5px;
					text-align: center;
					width: 300px;
					height: 500px;
				}
		</style>
	</head>
	<body style="background-color: Black;color: Silver;">
		<form class="formulario" action="disciplina.php" method="POST">
		<div><h2 style="background-color: purple; color: white; border-radius: 8px; box-sizing: border-box; padding: 20px 20px; position: relative;top: -20px;">Criar Nova Disciplina</h2></div>
		<input type="text" name="nome" placeholder="Nome da Disciplina">
		<br></br>
		<input type="text" name="sigla" placeholder="Sigla da Disciplina">
		<br></br>
		<input type="text" name="cargah" placeholder="Carga Horária">
		<br></br>
		<br></br>
		<input type="submit" value="ENVIAR">
		</form>
		<form action="listadisciplinas.php" method="POST">
		<input type="submit" value="Lista de Disciplinas">	
		</form>
		
	<?PHP
		if (!isset($_POST["nome"]) && !isset($_POST["sigla"]) && !isset($_POST["cargah"]))
		{
		} else {
			$nome = $_POST["nome"];
			$sigla = $_POST["sigla"];
			$cargah = $_POST["cargah"];
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST')  
		{

			$nome = $_POST["nome"];
			$sigla = $_POST["sigla"];
			$cargah = $_POST["cargah"];
			$nDis = "$nome;$sigla;$cargah";
			$arqdis="disciplinas.txt";
			file_put_contents($arqdis, "$nDis\n", FILE_APPEND);
		}
		?>
	</body>
</html>
