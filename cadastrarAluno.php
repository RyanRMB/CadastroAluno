<html>
	<head>
		<title>Cadastro</title>
		
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
		<form class="formulario" action="cadastrarAluno.php" method="POST">
			<div><h2 style="background-color: purple; color: white; border-radius: 8px; box-sizing: border-box; padding: 20px 20px; position: relative;top: -20px;">Cadastrar Aluno</h2></div>
			<input type = "text" name = "nome" placeholder = "Nome do Aluno">
			<br></br>
			<input type = "text" name = "idade" placeholder = "Idade do Aluno">
			<br></br>
			<input type = "text" name = "matricula" placeholder = "Matrícula do Aluno">
			<br></br>
			<input type= "text" name = "periodo" placeholder = "Período">
			<br></br>
			<br></br>
			<input type="submit" value="ENVIAR">
		</form>
		<form action="listaAlunos.php" method="POST">
			<input type="submit" value="Lista de Alunos">	
		</form>
		<form action="alterarCadastro.php" method="POST">
			<input type="submit" value="Alterar Cadastro de Aluno">	
		</form>
		<form action="buscarAluno.php" method="POST">
			<input type="submit" value="Buscar Aluno">	
		</form>
		
	<?PHP
		if (empty($_POST["nome"]) && empty($_POST["idade"]) && empty($_POST["matricula"]) && empty($_POST["periodo"]))
		{
		} else {
			$nome = $_POST["nome"];
			$idade = $_POST["idade"];
			$matricula = $_POST["matricula"];
			$periodo = $_POST["periodo"];
			if ($_SERVER['REQUEST_METHOD'] == 'POST')  
			{																						
				$arqAlu = fopen("alunos.txt","a") or die("erro ao criar arquivo");
				$nAlu = $nome . ";" . $idade . ";" . $matricula . ";" . $periodo . ";\n";
				fwrite($arqAlu, $nAlu);
				fclose($arqAlu);
			}
		}
		?>
	</body>
</html>
