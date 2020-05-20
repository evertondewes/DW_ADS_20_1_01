<?php
require_once 'bibliotecas/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!isset($id)) {
    die('Acesso incorreto');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);

    if (strlen($endereco) > 0 && strlen($nome) > 0) {
        $sql = "update cliente set nome='$nome', endereco='$endereco'  where id = $id;";

        $totalAtualziado = $conexao->exec($sql);
    }
}

$consulta = $conexao->query("select * from cliente where id = $id");
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

if (count($resultado) == 0) {
    die('Erro ao acessar o registro');
}

$nome = $resultado[0]['nome'];
$endereco = $resultado[0]['endereco'];

?>

<html>
<?php
$titulo = 'Edição';
require_once "bibliotecas/head.php";
?>

<body>
<?php

require_once 'bibliotecas/menu.php';
?>
<div class="container">
    <h1 class="page-header"><?php echo $titulo; ?></h1>
    <div class="table-responsive">
        <form method="post" action="edicao.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label>Id <?php echo $id; ?></label><br>
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control"
                       value="<?php echo $nome; ?>"> <br>
                <label for="endereco">Enderço</label>
                <input type="text" name="endereco" class="form-control"
                       value="<?php echo $endereco; ?>"><br>
                <input type="submit" name="atualizar" value="Atualizar"
                       class="btn btn-dark">
            </div>
        </form>
    </div>
    <?php

    if (isset($totalAtualziado) && $totalAtualziado > 0) {
        echo "<div align='center' class='alert alert-info'>
                    Total registros atualizados: $totalAtualziado </div>";
    }
    ?>
</div>
</body>

</html>

