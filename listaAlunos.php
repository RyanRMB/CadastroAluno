<html>
	<head>
		<title>Lista de Alunos</title>
	</head>
	<body style="background-color: Black;color: Silver;">
	<table border="1">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Matrícula</th>
			<th>Período</th>
        </tr>
		
		<form action="cadastrarAluno.php" method="POST">
			<input type="submit" value="Voltar">	
		</form>
		<form action="alterarCadastro.php" method="POST">
			<input type="submit" value="Alterar Cadastro de Aluno">	
		</form>
		<form action="buscarAluno.php" method="POST">
			<input type="submit" value="Buscar Aluno">	
		</form>
	<?PHP
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (file_exists("alunos.txt")) 
			{
				$arqDis = fopen("alunos.txt","r") or die("erro ao criar arquivo");
			
				while (($linha = fgets($arqDis)) !== false)
				{
					$dados = explode(";", $linha);
					$dadosDeCadastro[] = ['nome' => $dados[0], 'idade' => $dados[1], 'matricula' => $dados[2], 'periodo' => $dados[3]];
					echo "<tr>";
					echo "<td>" . $dados[0] . "</td>";
					echo "<td>" . $dados[1] . "</td>";
					echo "<td>" . $dados[2] . "</td>";
					echo "<td>" . $dados[3] . "</td>";
					echo "</tr>";
				}
				fclose($arqDis);
			}
		}	
		?>
	</body>
</html>