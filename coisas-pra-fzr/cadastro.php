<?php
require_once '/include/db.php';

try {
    // 1. Criar a tabela (caso ela tenha bugado)
    $pdo->exec("CREATE TABLE IF NOT EXISTS produtos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT,
        descricao TEXT,
        preco INTEGER,
        regiao TEXT,
        classe_icone TEXT
    )");

    // 2. Limpar para não duplicar
    $pdo->exec("DELETE FROM produtos");

    // 3. Inserir os itens de verdade
    $itens = [
        ['Cintila Pura', 'A substancia de Zaun.', 350, 'zaun', 'shimmer_icon'],
        ['Manopla Atlas', 'Tecnologia de Piltover.', 800, 'piltover', 'gauntlet_icon'],
        ['Respirador', 'Sobreviva ao Sumidouro.', 120, 'zaun', 'mask_icon']
    ];

    $sql = "INSERT INTO produtos (nome, descricao, preco, regiao, classe_icone) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    foreach ($itens as $i) {
        $stmt->execute($i);
    }

    echo "<h1>🔥 BANCO DE DADOS PRONTO!</h1>";
    echo "<p>Os itens foram inseridos. Agora vá ver sua página de Zaun.</p>";

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>