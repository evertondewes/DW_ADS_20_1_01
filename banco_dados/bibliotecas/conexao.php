<?php
$conexao = new PDO('mysql:host=localhost;dbname=cliente', 'root', 'root'); //dbname

$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
