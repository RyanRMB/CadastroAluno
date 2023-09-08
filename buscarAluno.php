<html>
	<head>
		<title>Buscar Aluno</title>
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
	
	<body  style="background-color: Black;color: Silver;">
		<table border="1">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Matrícula</th>
			<th>Período</th>
        </tr>
		<form class="formulario" action="buscarAluno.php" method="POST">
			<div><h2 style="background-color: purple; color: white; border-radius: 8px; box-sizing: border-box; padding: 20px 20px; position: relative;top: -20px;">Cadastrar Aluno</h2></div>
			<input type = "text" name = "matriculaBus" placeholder = "Buscar por Matrícula">
			<br></br>
			<br></br>
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
			<form action="cadastrarAluno.php" method="POST">
			<input type="submit" value="Voltar">	
		</form>
		
		<?PHP 
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (file_exists("alunos.txt")) 
			{
				$matriculaAux = $_POST["matriculaBus"];
				$arqDis = fopen("alunos.txt","r") or die("erro ao criar arquivo");
			
				while (($linha = fgets($arqDis)) !== false)
				{
					$dados = explode(";", $linha);
					$dadosDeCadastro[] = ['nome' => $dados[0], 'idade' => $dados[1], 'matricula' => $dados[2], 'periodo' => $dados[3]];
					$matricula = $dados[2];
					if ($matricula === $matriculaAux)
					{
						echo "<tr>";
						echo "<td>" . $dados[0] . "</td>";
						echo "<td>" . $dados[1] . "</td>";
						echo "<td>" . $dados[2] . "</td>";
						echo "<td>" . $dados[3] . "</td>";
						echo "</tr>";
					}	
				}
				fclose($arqDis);
			}
		}	
		?>
	</body>
</html>