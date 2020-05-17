<?php

// conecta no SGBD sem indicar a Base de Dados 'dbname'
$conexao = new PDO('mysql:host=localhost;', 'root', 'root');

// exibe para o usuário eventuais problemas
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$conexao->exec('create database cliente;'); // cria a Base de Dados
$conexao->exec('use cliente;'); // Seleciona a base para uso

// cria a tabela
$conexao->exec('CREATE table cliente(
                    id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
                    nome VARCHAR(250),
                    endereco VARCHAR(150)
                );
');
