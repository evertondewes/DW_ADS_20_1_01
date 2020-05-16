<?php

$conexao = new PDO('mysql:host=localhost;', 'root', 'root'); //dbname
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conexao->exec('create database cliente;');
$conexao->exec('use cliente;');
$conexao->exec('
CREATE table cliente(
    id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(250),
 endereco VARCHAR(150)
);

');
