<?php
// config.php
session_start();

$senha_admin = "1234"; 
$erro_senha = false;

// 1. INICIALIZAÇÃO DO CARDÁPIO NA SESSÃO
if (!isset($_SESSION['cardapio'])) {
    $_SESSION['cardapio'] = [
        1 => ['id' => 1, 'nome' => 'Espresso Doce Encontro', 'preco' => 10.90, 'categoria' => 'cafes', 'tag' => 'Mais Pedido', 'descricao' => 'Blend exclusivo 100% arábica com mini trufa artesanal.', 'imagem' => 'expresso.jpg.png'],
        2 => ['id' => 2, 'nome' => 'Cappuccino de Avelã', 'preco' => 16.50, 'categoria' => 'cafes', 'tag' => 'Artesanal', 'descricao' => 'Espresso, leite vaporizado, avelã e canela polvilhada.', 'imagem' => 'avelã.jpg.png'],
        3 => ['id' => 3, 'nome' => 'Pink Velvet Latte', 'preco' => 18.00, 'categoria' => 'cafes', 'tag' => 'Especial', 'descricao' => 'Leite cremoso com toque suave de baunilha e chantilly rosa.', 'imagem' => 'pink.png'],
        4 => ['id' => 4, 'nome' => 'Torta Rosa de Frutas Vermelhas', 'preco' => 19.90, 'categoria' => 'doces', 'tag' => 'Sucesso', 'descricao' => 'Massa sablée, creme de baunilha e seleção de frutas vermelhas.', 'imagem' => 'FRUTAS.JPG.png'],
        5 => ['id' => 5, 'nome' => 'Trio de Macarons Vintage', 'preco' => 15.00, 'categoria' => 'doces', 'tag' => 'Sem Glúten', 'descricao' => 'Pistache, Framboesa e Doce de Leite.', 'imagem' => 'trio.jpg.png'],
        6 => ['id' => 6, 'nome' => 'Pão de queijo Romeu & Julieta', 'preco' => 18.50, 'categoria' => 'salgados', 'tag' => 'Quentinho', 'descricao' => 'Folhado artesanal com queijo brie e peito de peru.', 'imagem' => 'pao-quijo.png']
    ];
}

// INICIALIZAÇÃO DO CARRINHO E STATUS
if (!isset($_SESSION['carrinho'])) { $_SESSION['carrinho'] = []; }
if (!isset($_SESSION['status_pedido'])) { $_SESSION['status_pedido'] = 2; }

// AÇÕES DO CARRINHO
if (isset($_GET['action'])) {
    $acao = $_GET['action'];
    $id_prod = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($acao === 'add_carrinho' && $id_prod) {
        if (isset($_SESSION['carrinho'][$id_prod])) {
            $_SESSION['carrinho'][$id_prod]++;
        } else {
            $_SESSION['carrinho'][$id_prod] = 1;
        }
        header("Location: carrinho.php");
        exit;
    }

    if ($acao === 'mais_qtd' && $id_prod && isset($_SESSION['carrinho'][$id_prod])) {
        $_SESSION['carrinho'][$id_prod]++;
        header("Location: carrinho.php");
        exit;
    }

    if ($acao === 'menos_qtd' && $id_prod && isset($_SESSION['carrinho'][$id_prod])) {
        $_SESSION['carrinho'][$id_prod]--;
        if ($_SESSION['carrinho'][$id_prod] <= 0) unset($_SESSION['carrinho'][$id_prod]);
        header("Location: carrinho.php");
        exit;
    }

    if ($acao === 'del_carrinho' && $id_prod) {
        unset($_SESSION['carrinho'][$id_prod]);
        header("Location: carrinho.php");
        exit;
    }
}

// CÁLCULOS GERAIS PARA O CABEÇALHO
$cardapio_items = $_SESSION['cardapio'];
$total_itens_carrinho = 0;
$subtotal_carrinho = 0;
foreach ($_SESSION['carrinho'] as $id_c => $qtd_c) {
    if (isset($cardapio_items[$id_c])) {
        $total_itens_carrinho += $qtd_c;
        $subtotal_carrinho += ($cardapio_items[$id_c]['preco'] * $qtd_c);
    }
}
?>