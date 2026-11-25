<?php 
$pagina_atual = 'carrinho';
$estilo_css = 'carrinho';
require_once 'cabecalho.php'; 
?>

<html>
    <head>
        <title>Doce Encontro</title>
    </head>
    <body>
        <section class="secao-padrao">
    <div class="barra-topo-pagina">
        <div>
            <span class="subtitulo-secao">SACOLA DOCE ENCONTRO</span>
            <h2 class="titulo-secao-esquerda">Seu Pedido</h2>
        </div>
        <a href="cardapio.php" class="botao-secundario">← Adicionar mais delícias</a>
    </div>

    <?php if (empty($_SESSION['carrinho'])): ?>
        <div class="caixa-vazia">
            <div class="icone-vazio">🛍️</div>
            <h3>Sua sacola está vazia</h3>
            <p>Explore nosso cardápio e clique em "+ Pedir" no seu item favorito!</p>
            <a href="cardapio.php" class="botao-verde-medio">VER CARDÁPIO</a>
        </div>
    <?php else: ?>
        <div class="layout-carrinho">
            <div class="lista-itens-carrinho">
                <?php foreach ($_SESSION['carrinho'] as $id => $qtd): 
                    $prod = $produtos[$id];
                    $subtotal_item = $prod['preco'] * $qtd;
                ?>
                    <div class="item-carrinho">
                        <div class="item-carrinho-esquerda">
                            <div class="moldura-imagem-carrinho">
                                <img src="<?= htmlspecialchars($prod['imagem']) ?>" alt="<?= htmlspecialchars($prod['nome']) ?>" class="foto-produto-carrinho">
                            </div>
                            <div>
                                <h4 class="nome-produto"><?= htmlspecialchars($prod['nome']) ?></h4>
                                <p class="detalhe-quantidade">Quantidade: <strong><?= $qtd ?></strong></p>
                                <p class="preco-unitario">Preço unitário: R$ <?= number_format($prod['preco'], 2, ',', '.') ?></p>
                            </div>
                        </div>

                        <div class="item-carrinho-direita">
                            <span class="subtotal-item">R$ <?= number_format($subtotal_item, 2, ',', '.') ?></span>
                            
                            <div class="controles-quantidade">
                                <form method="POST" action="carrinho.php">
                                    <input type="hidden" name="acao" value="diminuir">
                                    <input type="hidden" name="id_produto" value="<?= $id ?>">
                                    <button type="submit" class="botao-qtd">-</button>
                                </form>
                                
                                <span class="numero-qtd"><?= $qtd ?></span>
                                
                                <form method="POST" action="carrinho.php">
                                    <input type="hidden" name="acao" value="aumentar">
                                    <input type="hidden" name="id_produto" value="<?= $id ?>">
                                    <button type="submit" class="botao-qtd">+</button>
                                </form>

                                <form method="POST" action="carrinho.php">
                                    <input type="hidden" name="acao" value="remover">
                                    <input type="hidden" name="id_produto" value="<?= $id ?>">
                                    <button type="submit" class="botao-lixeira" title="Remover item">🗑️</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <aside class="resumo-pedido">
                <h3>Resumo do Pedido</h3>
                <hr class="divisor-tracejado">
                
                <div class="linha-resumo">
                    <span>Subtotal (<?= $total_itens ?> <?= $total_itens == 1 ? 'item' : 'itens' ?>)</span>
                    <strong class="valor-subtotal">R$ <?= number_format($valor_total, 2, ',', '.') ?></strong>
                </div>
                
                <div class="linha-resumo">
                    <span>Embalagem especial</span>
                    <span class="texto-gratis">GRÁTIS</span>
                </div>
                
                <hr class="divisor-resumo">
                
                <div class="linha-total">
                    <span>TOTAL:</span>
                    <span class="valor-total">R$ <?= number_format($valor_total, 2, ',', '.') ?></span>
                </div>

                <a href="entrega.php" class="botao-verde-largo">ESCOLHER FORMA DE ENTREGA →</a>
            </aside>
        </div>
    <?php endif; ?>
</section>
</body>
</html>
<?php require_once 'rodape.php'; ?>