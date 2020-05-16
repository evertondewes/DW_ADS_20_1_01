<html>
<body>
<?php
require_once 'conexao.php';

// verifica se tem dados pra atualizar
$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
if(isset($nome) && strlen($nome) > 0) {

    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    $sql = "update cliente set nome='$nome', endereco='$endereco'  where id = $id;";

    //echo $sql . '<br>';

    $totalAtualziado = $conexao->exec($sql);

}

// prepara dados para serem exibidos no formulário
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$consulta = $conexao->query("select * from cliente where id = $id");

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<form method="post" action="edicao.php?id=<?php echo $id; ?>">
    <input type="hidden" name="id"  value="<?php echo $resultado[0]['id']; ?>">
    Id: <?php echo $id; ?><br>
    Nome: <input type="text" name="nome" value="<?php echo $resultado[0]['nome']; ?>"> <br>
    Enderço: <input type="text" name="endereco" value="<?php echo $resultado[0]['endereco']; ?>"> <br>
    <input type="submit" name="Cadastrar">
</form>
<?php

if(isset($totalAtualziado) && $totalAtualziado > 0) {
    echo "Total registros atualizados: $totalAtualziado <br>";
}

?>
<a href="index.php">Listagem Clientes</a>
</body>

</html>

