<html>
<head>
	<title>Teste - Signo Web</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php include("conexao.class.php"); ?>
<body>
	<div class="container">
		<div class="row">
			<div class="col" style="width: 100%;">
				<div class="box form-inline box-content-between">
					<div>
						<h1>Listagem</h1>
					</div>
					<div><a href="formulario.php" class="btn btn-success">
						Novo</a>
					</div>					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col" style="width: 100%;">				
				<table class="table table-striped">
					<thead>
						<th>Nome</th>
						<th>Email</th>
						<th>Telefone</th>
						<th>Data de Nascimento</th>
						<th>Endereço</th>
					</thead>
					<tbody>
						<?php 
						$conn = Database::init();

						$sql = 'SELECT * FROM cadastro ORDER BY Nome';

						$dados = $conn->query($sql);

						if( !empty($dados) ){
						
						foreach ($dados as $row) { ?>
						<tr>
							<td><?php echo ( isset($row['Nome']) || !empty($row['Nome']) ) ? $row['Nome'] : ""; ?></td>
							<td><?php echo ( isset($row['Email']) || !empty($row['Email']) ) ? $row['Email'] : ""; ?></td>
							<td><?php echo ( isset($row['Telefone']) || !empty($row['Telefone']) ) ? $row['Telefone'] : ""; ?></td>
							<td><?php echo ( isset($row['Data_de_Nascimento']) || !empty($row['Data_de_Nascimento']) ) ? $row['Data_de_Nascimento'] : ""; ?></td>
							<td><?php echo ( isset($row['Endereco']) || !empty($row['Endereco']) ) ? $row['Endereco'] : ""; ?></td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
