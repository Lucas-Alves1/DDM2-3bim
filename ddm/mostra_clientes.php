<?php
    include 'conexao.php';
    $id_usuario = $_GET['id'];
    $selectNome = "SELECT usuario.nome FROM usuario WHERE usuario.id = $id_usuario";
    // $mostraNome = mysqli_query($conexao, $selectNome);
    // while($resultadoNome = mysqli_fetch_assoc($mostraNome)){
    //     echo "Nome do Usuário: " . $resultadoNome['nome']. "<br><br>";
    // }
    $consulta = $conexao->query("SELECT nome FROM Usuario WHERE id = $id_usuario");
    $resultadoNome = mysqli_fetch_assoc($consulta);
    $nome = $resultadoNome["nome"];
    echo "Nome do Usuário: $nome <br><br>";
    // consulta em SQL que será executada na base de dados
    $sql = "SELECT usuario.id, usuario.nome, usuario.email, livro.autor, livro.titulo, livro.ano, livro.editora 
    FROM usuario, livro 
    WHERE usuario.id = livro.id 
    AND usuario.id = $id_usuario";

    // armazena o resultado da consulta
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
    // saída de dados de cada linha da tabela
    while($linha = mysqli_fetch_assoc($resultado)) {
        echo "Título do Livro: " . $linha["titulo"]. "<br>";
        echo "Autor: " . $linha["autor"]. "<br>";
        echo "Ano de Publicação: " . $linha["ano"]. "<br>";
        echo "Editora: " . $linha["editora"]. "<br>";
        echo "<br>";
    }
    } else {
        echo "0 resultados";
    }

    // Fechar a conexão
    mysqli_close($conexao);
?>