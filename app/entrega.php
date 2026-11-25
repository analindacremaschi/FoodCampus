<?php
$tipo = $_GET['tipo'] ?? 'delivery';

$isLocal    = ($tipo === 'local');
$isViagem   = ($tipo === 'viagem');
$isDelivery = ($tipo === 'delivery');

$displayEndereco = $isDelivery ? 'flex' : 'none';
$classeCaixa     = $isDelivery ? '' : 'modo-simples';
$requiredAttr    = $isDelivery ? 'required' : '';

$pagina_atual = 'carrinho';
$estilo_css   = 'styleentrega';
require_once 'cabecalho.php';

if (empty($_SESSION['carrinho'])) {
    header('Location: carrinho.php');
    exit;
}

$cliente_logado  = $_SESSION['cliente_logado'] ?? null;
$nome_padrao     = $cliente_logado['nome'] ?? '';
$email_padrao    = $cliente_logado['email'] ?? '';
$telefone_padrao = $cliente_logado['telefone'] ?? '';
?>

<section class="secao-entrega">
    <a href="carrinho.php" class="link-voltar">← Voltar para Seu Pedido</a>

    <div class="cabecalho-secao">
        <span class="subtitulo-secao">ÚLTIMA ETAPA</span>
        <h2 class="titulo-secao">Como você quer <span class="destaque-rosa">receber o pedido?</span></h2>
        <p class="descricao-secao">Preencha seus dados e escolha a forma de entrega e pagamento</p>
    </div>

    <form method="POST" action="entrega.php" class="form-checkout">
        
        <input type="hidden" name="acao" value="finalizar_pedido">

        <div class="opcoes-entrega">
            <a href="?tipo=local" style="text-decoration: none; color: inherit; display: contents;">
                <label class="cartao-opcao" style="cursor: pointer;">
                    <input type="radio" name="modalidade" value="Comer no Local" <?= $isLocal ? 'checked' : '' ?>>
                    <div class="conteudo-opcao">
                        <div class="icone-opcao rosa">🍴</div>
                        <h3>Comer no Local</h3>
                        <p>Mesa reservada com atendimento personalizado</p>
                    </div>
                </label>
            </a>

            <a href="?tipo=viagem" style="text-decoration: none; color: inherit; display: contents;">
                <label class="cartao-opcao" style="cursor: pointer;">
                    <input type="radio" name="modalidade" value="Retirada no Balcão (Para Viagem)" <?= $isViagem ? 'checked' : '' ?>>
                    <div class="conteudo-opcao">
                        <div class="icone-opcao azul">🛍️</div>
                        <h3>Para Viagem / Balcão</h3>
                        <p>Embalado para viagem, pronto em 20 minutos</p>
                    </div>
                </label>
            </a>

            <a href="?tipo=delivery" style="text-decoration: none; color: inherit; display: contents;">
                <label class="cartao-opcao" style="cursor: pointer;">
                    <input type="radio" name="modalidade" value="Delivery Entrega" id="radio-delivery" <?= $isDelivery ? 'checked' : '' ?>>
                    <div class="conteudo-opcao">
                        <div class="icone-opcao vermelho">🛵</div>
                        <h3>Delivery Entrega</h3>
                        <p>Entregamos fresquinho na sua casa</p>
                    </div>
                </label>
            </a>
        </div>

        <div class="caixa-dados-pedido <?= $classeCaixa ?>" id="caixa-dados">
            <div class="coluna-checkout">
                <h3>👤 Seus Dados & Pagamento</h3>

                <div class="campo-checkout">
                    <label>Nome Completo *</label>
                    <input type="text" name="nome_cliente" placeholder="Ex: Maria Clara" value="<?= htmlspecialchars($nome_padrao) ?>" required>
                </div>

                <div class="linha-dupla-checkout">
                    <div class="campo-checkout">
                        <label>E-mail *</label>
                        <input type="email" name="email_cliente" placeholder="cliente@email.com" value="<?= htmlspecialchars($email_padrao) ?>" required>
                    </div>

                    <div class="campo-checkout">
                        <label>Telefone / WhatsApp *</label>
                        <input type="text" name="telefone_cliente" placeholder="(11) 99999-9999" value="<?= htmlspecialchars($telefone_padrao) ?>" required>
                    </div>
                </div>

                <div class="campo-checkout">
                    <label>Forma de Pagamento *</label>
                    <select name="pagamento" required>
                        <option value="PIX (Aprovação Imediata)">💠 PIX (Aprovação Imediata)</option>
                        <option value="Cartão de Crédito">💳 Cartão de Crédito</option>
                        <option value="Cartão de Débito">💳 Cartão de Débito</option>
                        <option value="Dinheiro">💵 Dinheiro</option>
                    </select>
                </div>
            </div>

            
           <div class="coluna-checkout" id="coluna-endereco">
    <h3>📍 Endereço de Entrega</h3>

    <div class="linha-dupla-checkout">
        <div class="campo-checkout" style="flex: 2;">
            <label>Rua / Avenida</label>
            <input type="text" name="rua" id="campo-rua" placeholder="Ex: Rua das Flores">
        </div>

        <div class="campo-checkout" style="flex: 1;">
            <label>Número</label>
            <input type="text" name="numero" id="campo-numero" placeholder="123">
        </div>
    </div>

    <div class="linha-dupla-checkout">
        <div class="campo-checkout">
            <label>Bairro</label>
            <input type="text" name="bairro" id="campo-bairro" placeholder="Ex: Centro">
        </div>

        <div class="campo-checkout">
            <label>CEP</label>
            <input type="text" name="cep" placeholder="00000-000">
        </div>
    </div>

    <div class="campo-checkout">
        <label>Complemento / Ponto de Referência</label>
        <input type="text" name="complemento" placeholder="Ex: Apto 42, Bloco B">
    </div>
</div>

        <div class="area-botao-confirmar">
            <button type="submit" class="botao-confirmar-rosa">
                ♥ CONFIRMAR PEDIDO (R$ <?= number_format($valor_total, 2, ',', '.') ?>)
            </button>
        </div>
    </form>
</section>

<?php require_once 'rodape.php'; ?>