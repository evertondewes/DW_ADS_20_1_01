<?php

require_once 'conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if(isset($id)) {
    $sql = "delete from cliente where id = $id";

    echo $sql . '<br>';

    $conexao->exec($sql);
}

$consulta = $conexao->query('select * from cliente');

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

//echo '<pre>' . print_r($resultado, true) . '</pre>';

echo '<table style="border: 1px solid black;" >';
echo '<th>ID</th><th>Nome</th><th>Endereço</th><th>Comandos</th>';

foreach ($resultado as $linha ) {

    $id = $linha['id'] ;
    $nome = $linha['nome'] ;
    $endereco = $linha['endereco'] ;

    echo '<tr>';
    echo "<td><a href='edicao.php?id=$id'>$id</td><td>$nome</td><td>$endereco</td><td><a href='index.php?id=$id'>Apagar</a></td>";
    echo '</tr>' . PHP_EOL;
}
echo '</table><br>';

?>
<a href="cadastro.php">Cadastrar Novo Cliente</a>
