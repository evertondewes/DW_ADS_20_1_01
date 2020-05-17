<?php
require_once 'bibliotecas/conexao.php';


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!isset($id)) {
    die('Página acessada de forma errada');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);

    if (strlen($nome) > 0 && strlen($endereco) > 0) {

        $sql = "update cliente set nome='$nome', endereco='$endereco'  where id = $id;";
        $totalAtualziado = $conexao->exec($sql);
    }
}


// prepara dados para serem exibidos no formulário


$consulta = $conexao->query("select * from cliente where id = $id");

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

if (count($resultado) == 0) {
    die('Erro ao acessar o registro');
}

$nome = $resultado[0]['nome'];
$endereco = $resultado[0]['endereco'];

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

        <form method="post" action="edicao.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label>Id: <?php echo $id; ?></label><br>
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control"
                       value="<?php echo $nome; ?>"><br>
                <label for="endereco">Enderço</label>
                <input type="text" name="endereco" class="form-control"
                       value="<?php echo $endereco; ?>">
                <input type="submit" name="atualizar" value="Atualizar">
            </div>
        </form>
    </div>
</div>
<?php
if (isset($totalAtualziado) && $totalAtualziado > 0) {
    echo "<div align='center' class='alert'>
            Total registros atualizados: $totalAtualziado </div>";
}
?>
</body>
</html>

