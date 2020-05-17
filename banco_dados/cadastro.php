<?php
require_once 'bibliotecas/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);

    if (strlen($nome) > 0 && strlen($endereco) > 0) {

        $sql = "insert into cliente(nome, endereco) value('$nome', '$endereco')";

        //echo $sql . '<br>';

        $totalCadastrado = $conexao->exec($sql);

        if ($totalCadastrado == 1) {
            header('Location: index.php');
            exit;
        }

//        $id = $conexao->lastInsertId();
//        echo "ID cadastrado: $id <br>";
    }
}

$tituloPagina = 'Lista de Usuários';
require_once 'bibliotecas/head.php';

?>
<!doctype html>
<html lang="pt">
<body>

<?php
require_once 'bibliotecas/menu.php';
?>

<div class="container">
    <h1 class="page-header">Cadastro Clientes</h1>
    <div class="table-responsive">
        <form method="post" action="cadastro.php">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control"> <br>
                <label for="endereco">Enderço</label>
                <input type="text" name="endereco" class="form-control">
                <input type="submit" name="Cadastrar">
            </div>
        </form>
    </div>
</div>
</body>
</html>