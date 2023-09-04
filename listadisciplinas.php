<html>
	<head>
	</head>
	<body style="background-color: Black;color: Silver;">
	<table border="1">
        <tr>
            <th>Nome</th>
            <th>Sigla</th>
            <th>Carga Horária</th>
        </tr>
	<?PHP
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (file_exists("disciplinas.txt")) 
			{
				$arqDis = fopen("disciplinas.txt","a") or die("erro ao criar arquivo");
				$arqdis = file("disciplinas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
				foreach ($arqdis as $linha) 
				{
					$dados = explode(";", $linha);
					if (count($dados) === 3) 
					{
						$disciplinas[] = ['nome' => $dados[0], 'sigla' => $dados[1], 'cargah' => $dados[2]];
					}
					echo "nome: " . $dados[0] . " sigla: " . $dados[1] . " carga: " . $dados[2];
					$linha = "nome;sigla;cargah\n";
					$linha = $dados[0] . ";" . $dados[1] . ";" . $dados[2] . "\n";
					fwrite($arqDis,$linha);
				}
				fclose($arqDis);
			}
		}	
		?>
	</body>
</html>