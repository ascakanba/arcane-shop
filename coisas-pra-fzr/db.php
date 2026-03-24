<?php
try {
    // Cria ou abre o arquivo de banco de dados
    $pdo = new PDO("sqlite:" . __DIR__ . "/database.db");
    
    // Configura para mostrar erros, caso algo dê errado
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria a tabela de produtos se ela ainda não existir
    $pdo->exec("CREATE TABLE IF NOT EXISTS produtos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT,
        descricao TEXT,
        preco INTEGER,
        regiao TEXT,
        classe_icone TEXT
    )");

} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
?>