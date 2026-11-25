<?php 
$pagina_atual = 'status';
$estilo_css = 'status';
require_once 'cabecalho.php'; 

$pedido = $_SESSION['ultimo_pedido'];
$etapa = $pedido['etapa'] ?? 1;

$nomes_etiqueta = [
    1 => 'RECEBIDO',
    2 => 'EM PREPARO',
    3 => 'A CAMINHO',
    4 => 'ENTREGUE'
];
$cores_etiqueta = [
    1 => '#84a58d',
    2 => '#e09f5a',
    3 => '#d9778b',
    4 => '#6b8e75'
];
?>

<section class="secao-padrao">
    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alerta-sucesso">
            ✅ Pedido confirmado com sucesso! Acompanhe abaixo o preparo da sua encomenda.
        </div>
    <?php endif; ?>

    <div class="cabecalho-secao">
        <span class="subtitulo-secao">ACOMPANHAMENTO EM TEMPO REAL</span>
        <h2 class="titulo-secao">Status do seu <span class="destaque-rosa">Pedido Doce</span></h2>
    </div>

    <div class="cartao-status">
        <div class="topo-status">
            <div>
                <span class="etiqueta-codigo">CÓDIGO DA ENCOMENDA</span>
                <h3 class="numero-codigo"><?= htmlspecialchars($pedido['codigo']) ?></h3>
                <p class="texto-modalidade">Modalidade: <strong><?= htmlspecialchars($pedido['modalidade']) ?></strong></p>
            </div>
            <span class="etiqueta-recebido" style="background-color: <?= $cores_etiqueta[$etapa] ?>;">
                <?= $nomes_etiqueta[$etapa] ?>
            </span>
        </div>

        <hr class="divisor-resumo">

        <div class="linha-do-tempo">
            <div class="etapa-status <?= ($etapa >= 1) ? 'concluida' : '' ?>">
                <div class="circulo-etapa">✓</div>
                <span class="tempo-etapa"><?= ($etapa == 1) ? 'AGORA' : 'CONCLUÍDO' ?></span>
                <strong>Pedido Recebido</strong>
            </div>

            <div class="etapa-status <?= ($etapa >= 2) ? 'concluida' : '' ?>">
                <div class="circulo-etapa">🧁</div>
                <span class="tempo-etapa"><?= ($etapa == 2) ? 'AGORA' : ($etapa > 2 ? 'CONCLUÍDO' : 'EM BREVE') ?></span>
                <strong>Em Preparo</strong>
            </div>

            <div class="etapa-status <?= ($etapa >= 3) ? 'concluida' : '' ?>">
                <div class="circulo-etapa">🛵</div>
                <span class="tempo-etapa"><?= ($etapa == 3) ? 'AGORA' : ($etapa > 3 ? 'CONCLUÍDO' : 'AGUARDANDO') ?></span>
                <strong>Saiu para Entrega</strong>
            </div>

            <div class="etapa-status <?= ($etapa >= 4) ? 'concluida' : '' ?>">
                <div class="circulo-etapa">♥</div>
                <span class="tempo-etapa"><?= ($etapa == 4) ? 'AGORA' : 'FINAL' ?></span>
                <strong>Momento Doce!</strong>
            </div>
        </div>
    </div>
</section>

<?php require_once 'rodape.php'; ?>