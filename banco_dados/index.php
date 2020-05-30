<?php
require_once 'bibliotecas/conexao.php';
require_once 'bibliotecas/Cliente.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (isset($id)) {
    $sql = "delete from cliente where id = $id";

//    echo $sql . '<br>';

    $totalExcluidos = $conexao->exec($sql);
}

$cliente = new  Cliente();

$resultado = $cliente->listar();
?>

<html>
<?php

$titulo = 'Listagem';
require_once "bibliotecas/head.php";

?>
<body>

<?php
require_once 'bibliotecas/menu.php';
?>

<div class="container">
    <h1 class="page-header">Clientes</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Comandos</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($resultado as $linha) {

                $id = $linha['id'];
                $nome = $linha['nome'];
                $endereco = $linha['endereco'];

                echo '<tr>';
                echo "<td><a href='edicao.php?id=$id'>$id</a></td>
                      <td>$nome</td>
                      <td>$endereco</td>
                      <td><a href='index.php?id=$id'  type='button' class='btn btn-danger'>Apagar</a></td>";
                echo '</tr>' . PHP_EOL;
            }

            ?>
            </tbody>
        </table>
    </div>
    <?php

    if (isset($totalExcluidos) && $totalExcluidos > 0) {
        echo "<div align='center' class='alert alert-info'>
                    Total registros excluidos: $totalExcluidos </div>";
    }
    ?>
</div>
</body>
</html>