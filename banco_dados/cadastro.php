<html>
<body>
<form method="post" action="cadastro.php">
    Nome: <input type="text" name="nome"> <br>
    Enderço: <input type="text" name="endereco">
    <input type="submit" name="Cadastrar">
</form>
</body>

<?php
require_once 'conexao.php';

if($_SERVER['REQUEST_METHOD']  == 'POST') {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);

    if (strlen($nome) > 0 && strlen($endereco) > 0) {

        $sql = "insert into cliente(nome, endereco) value('$nome', '$endereco')";

        //echo $sql . '<br>';

        $conexao->exec($sql);

        $id = $conexao->lastInsertId();

        echo "ID cadastrado: $id <br>";
    }
}
?>
<a href="index.php">Listagem Clientes</a>

</html>

