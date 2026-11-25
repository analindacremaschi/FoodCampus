<?php require_once 'dados.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanchonete Doce Encontro</title>
    <link rel="stylesheet" href="estilo.css">
   <?php if (isset($estilo_css)): ?>
        <link rel="stylesheet" href="<?= $estilo_css ?>.css?v=2">
    <?php endif; ?>
</head>
<body>

<header class="cabecalho-principal">
    <div class="container-cabecalho">
        <a href="index.php" class="marca-logo">
            <div class="icone-logo">🧁</div>
            <div class="texto-logo">
                <span class="subtitulo-logo">LANCHONETE</span>
                <span class="titulo-logo">DOCE ENCONTRO</span>
            </div>
        </a>

        <nav class="menu-navegacao">
            <a href="index.php" class="link-menu <?= ($pagina_atual == 'inicio') ? 'ativo' : '' ?>"> Início</a>
            <a href="cardapio.php" class="link-menu <?= ($pagina_atual == 'cardapio') ? 'ativo' : '' ?>">Cardápio (<?= count($produtos) ?>)</a>
            <a href="carrinho.php" class="link-menu <?= ($pagina_atual == 'carrinho') ? 'ativo' : '' ?>">
                 Seu Pedido 
                <?php if ($total_itens > 0): ?>
                    <span class="contador-carrinho"><?= $total_itens ?></span>
                <?php endif; ?>
            </a>
            <a href="status.php" class="link-menu <?= ($pagina_atual == 'status') ? 'ativo' : '' ?>"> Status</a>
            <a href="sobre.php" class="link-menu <?= ($pagina_atual == 'sobre') ? 'ativo' : '' ?>"> Sobre Nós</a>
            <a href="contato.php" class="link-menu <?= ($pagina_atual == 'contato') ? 'ativo' : '' ?>">Contato</a>
            
            <?php if (!empty($_SESSION['cliente_logado'])): ?>
                <a href="login.php" class="link-menu <?= ($pagina_atual == 'login') ? 'ativo' : '' ?>">
                    👤 Olá, <?= htmlspecialchars(explode(' ', $_SESSION['cliente_logado']['nome'])[0]) ?>
                </a>
            <?php else: ?>
                <a href="login.php" class="link-menu <?= ($pagina_atual == 'login') ? 'ativo' : '' ?>">👤 Entrar</a>
            <?php endif; ?>

            <a href="admin.php" class="botao-admin"> PAINEL ADMIN</a>
        </nav>
    </div>
</header>

<main class="conteudo-principal">

