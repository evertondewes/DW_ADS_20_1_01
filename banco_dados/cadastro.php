<?php
require_once 'bibliotecas/conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);

    if (strlen($endereco) > 0 && strlen($nome) > 0) {

        $sql = "insert into cliente(nome, endereco) value('$nome', '$endereco')";

        //echo $sql . '<br>';

        $totalRegistros = $conexao->exec($sql);

        if($totalRegistros == 1) {
            header('Location: index.php');
            die();
        }

//        $id = $conexao->lastInsertId();
//        echo "ID cadastrado: $id <br>";
    }

}

?>

<html>
<?php

$titulo = 'Cadastro';
require_once "bibliotecas/head.php";

?>
<body>
<?php

require_once 'bibliotecas/menu.php';
?>
<div class="container">
    <h1 class="page-header">Cadastro</h1>
    <div class="table-responsive">
        <form method="post" action="cadastro.php">
            <div class="form-group">
                <label for="nome">Nome</label><input type="text" name="nome" class="form-control"> <br>
                <label for="endereco">Enderço</label><input type="text" name="endereco" class="form-control">
                <input type="submit" name="Cadastrar" class="btn btn-primary" >
            </div>
        </form>
    </div>
</div>
</body>
</html>

