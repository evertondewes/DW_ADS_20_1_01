<?php
require_once 'bibliotecas/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (isset($id)) {
    $sql = "delete from cliente where id = $id";
//    echo $sql . '<br>';
    $conexao->exec($sql);
}

$consulta = $conexao->query('select id, nome, endereco from cliente');
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

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
    <h1 class="page-header">Clientes</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($resultado as $linha) {

                $id = $linha['id'];
                $nome = $linha['nome'];
                $endereco = $linha['endereco'];

                echo '<tr>';
                echo "<td><a href='edicao.php?id=$id'>$id</td>
                            <td>$nome</td>
                            <td>$endereco</td>
                            <td>
                                <a class='btn btn-danger' href='index.php?id=$id'>
                                    Apagar
                                </a>
                            </td>";
                echo '</tr>' . PHP_EOL;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>