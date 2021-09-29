<?php
$conn = new SQLite3('mural.db');
if (isset($_POST['nomep'])) {
	extract($_POST);
	if ($inserir = $conn->exec("insert into tb_recados(rec_nomep, rec_texto) values ('$nomep', '$rec')")) {
		header("Location:muralrec.php");
	} else {
		echo "Não foi possivel cadastrar a pessoa!";
	}
}
$consulta = $conn->query("SELECT * from tb_recados");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Mural de Recados - 1M</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<div class="titulo">
		<h1 id="titulo">Coloque seu Recado</h1>
		<br>
	</div>
	<form id="recados" class="form" action="?" method="POST">
		<div class="camp">
			<label>Seu nome:</label>
			<input id="nomep" type="text" name="nomep" required>
		</div>
		<div class="camp">
			<label>Recado:</label>
			<input id="rec" type="text" name="rec" required>
		</div>
		<button id="b1" class="botao" type="submit">Enviar</button>
	</form>
	<br>
	<table border="1">
		<tr>
			<td> Nome </td>
			<td> Recado </td>
		</tr>
<?php while($resultado = $consulta->fetchArray()){ ?> 
		<tr>
			<td> <?php echo $resultado['rec_nomep']; ?> </td>
			<td> <?php echo $resultado['rec_texto']; ?> </td>
		</tr>
<?php } ?>
	</table>
</body>

</html>