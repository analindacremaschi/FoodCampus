<?php 
$pagina_atual = 'cardapio';
$estilo_css = 'stylecardapio';
require_once 'cabecalho.php'; 
?>

<html>
    <link rel="stylesheet" href="style.css">
    <?php if (isset($estilo_css) && $estilo_css !== 'style'): ?>
        <link rel="stylesheet" href="<?= $estilo_css ?>.css">
    <?php endif; ?>
<section class="secao-padrao">
    <div class="cabecalho-secao">
        <span class="subtitulo-secao">SABORES INESQUECÍVEIS</span>
        <h2 class="titulo-secao">Nosso Cardápio Artesanal</h2>
        <p class="descricao-secao">Atualmente temos <strong><?= count($produtos) ?></strong> delícias disponíveis</p>
    </div>

    <div class="grade-cardapio">
        <?php foreach ($produtos as $item): ?>
            <div class="cartao-produto">
                <div class="topo-cartao">
                    <div class="moldura-imagem">
                        <img src="<?= htmlspecialchars($item['imagem']) ?>" alt="<?= htmlspecialchars($item['nome']) ?>" class="foto-produto">
                    </div>
                    <div class="info-produto">
                        <h3 class="nome-produto"><?= htmlspecialchars($item['nome']) ?></h3>
                        <span class="preco-produto">R$ <?= number_format($item['preco'], 2, ',', '.') ?></span>
                    </div>
                </div>

                <p class="descricao-produto"><?= htmlspecialchars($item['descricao']) ?></p>

                <div class="rodape-cartao">
                    <span class="etiqueta-categoria"><?= htmlspecialchars($item['tag']) ?></span>
                    
                    <form method="POST" action="cardapio.php">
                        <input type="hidden" name="acao" value="adicionar">
                        <input type="hidden" name="id_produto" value="<?= $item['id'] ?>">
                        <button type="submit" class="botao-pedir">+ Pedir</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
</html>
<?php require_once 'rodape.php'; ?>