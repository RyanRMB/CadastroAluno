<html>
	<head>
		<title>Alterar Cadastro</title>
		
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
		<form class="formulario" action="alterarCadastro.php" method="POST">
			<div><h2 style="background-color: purple; color: white; border-radius: 8px; box-sizing: border-box; padding: 20px 20px; position: relative;top: -20px;">Alterar Cadastro de Aluno</h2></div>
			<input type = "text" name = "nomeNovo" placeholder = "Novo Nome">
			<br></br>
			<input type = "text" name = "idadeNova" placeholder = "Nova Idade">
			<br></br>
			<input type = "text" name = "matriculaNova" placeholder = "Nova Matrícula">
			<br></br>
			<input type= "text" name = "periodoNovo" placeholder = "Novo Período">
			<br></br>
			<br></br>
			<input type = "text" name = "matricula" placeholder = "Matrícula para Alteração">
			<br></br>
			<br></br>
			<input type="submit" value="ENVIAR">
		</form>
			<form action="listaAlunos.php" method="POST">
			<input type="submit" value="Lista de Alunos">	
		</form>
			<form action="cadastrarAluno.php" method="POST">
			<input type="submit" value="Voltar">	
		</form>
		<form action="buscarAluno.php" method="POST">
			<input type="submit" value="Buscar Aluno">	
		</form>
	<?PHP
		if (empty($_POST["nome"]) && empty($_POST["idade"]) && empty($_POST["matricula"]) && empty($_POST["periodo"]))
		{
		} else {
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$matriculaAux = $_POST["matricula"];
				$nomeN = $_POST["nomeNovo"];
				$idadeN = $_POST["idadeNova"];
				$matriculaN = $_POST["matriculaNova"];
				$periodoN = $_POST["periodoNovo"];
				$arqAux = fopen ("aux1.txt","w") or die("erro ao criar arquivo");
			if (file_exists("alunos.txt")) 
			{
				$arqAlu = fopen("alunos.txt","r") or die("erro ao criar arquivo");
				while (($linha = fgets($arqAlu)) !== false)
				{
					$dados = explode(";", $linha);
					$dadosDeCadastro[] = ['nome' => $dados[0], 'idade' => $dados[1], 'matricula' => $dados[2], 'periodo' => $dados[3]];	
					$matricula = $dados[2];

					if ($matricula === $matriculaAux) {
						$nAlu = $nomeN . ";" . $idadeN . ";" . $matriculaN . ";" . $periodoN . ";\n";
					} else {
						$nAlu = $dados[0] . ";" . $dados[1] . ";" . $dados[2] . ";" . $dados[3] . ";\n";
					}
					fwrite($arqAux,$nAlu);
				}
				fclose($arqAlu);
				fclose ($arqAux);
				unlink("alunos.txt");
				rename("aux1.txt", "alunos.txt");
			}		
			}	
		}		
	?>
	</body>
</html>