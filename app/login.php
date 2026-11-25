<?php 
$pagina_atual = 'login';
$estilo_css = 'login';
require_once 'cabecalho.php'; 

$cliente = $_SESSION['cliente_logado'] ?? null;
$modo_cadastro = isset($_GET['criar']);
?>

<section class="secao-login">
    <?php if (!$cliente): ?>
        <div class="cartao-login">
            <div class="icone-perfil-topo">🧁</div>
            <span class="subtitulo-secao">ÁREA DO CLIENTE</span>
            <h2 class="titulo-login"><?= $modo_cadastro ? 'Criar Conta Doce' : 'Bem-vindo de volta' ?></h2>
            <p class="descricao-login">
                <?= $modo_cadastro ? 'Preencha seus dados para criar seu perfil.' : 'Entre com seu e-mail e senha para acompanhar seus pedidos.' ?>
            </p>
            <form method="POST" action="login.php">
                <input type="hidden" name="acao" value="login_google">
                <button type="submit" class="botao-google">
                    <span class="letra-g">G</span> Entrar com o Google
                </button>
            </form>

            <div class="separador-ou"><span>ou use seu e-mail</span></div>

            <form method="POST" action="login.php" class="form-cliente">
                <input type="hidden" name="acao" value="login_cliente">

                <?php if ($modo_cadastro): ?>
                    <div class="campo-grupo">
                        <label>Seu Nome Completo *</label>
                        <input type="text" name="nome" placeholder="Ex: Maria Clara" required>
                    </div>
                <?php endif; ?>

                <div class="campo-grupo">
                    <label>E-mail *</label>
                    <input type="email" name="email" placeholder="seuemail@exemplo.com" required>
                </div>

                <div class="campo-grupo">
                    <label>Senha *</label>
                    <input type="password" name="senha" placeholder="••••••••" required>
                </div>

                <button type="submit" class="botao-entrar-cliente">
                    <?= $modo_cadastro ? 'CRIAR MEU PERFIL' : 'ENTRAR NA CONTA' ?>
                </button>
            </form>

            <div class="rodape-login">
                <?php if ($modo_cadastro): ?>
                    Já tem uma conta? <a href="login.php" class="link-alternar">Fazer login</a>
                <?php else: ?>
                    Ainda não tem perfil? <a href="login.php?criar=1" class="link-alternar">Criar conta agora</a>
                <?php endif; ?>
            </div>
        </div>

    <?php else: ?>
        <div class="cartao-perfil">
            <?php if (isset($_GET['sucesso'])): ?>
                <div class="alerta-bem-vindo">✅ Login realizado com sucesso!</div>
            <?php endif; ?>

            <div class="avatar-cliente">👤</div>
            <span class="badge-metodo">Conectado via <?= htmlspecialchars($cliente['metodo']) ?></span>
            <h2 class="nome-cliente"><?= htmlspecialchars($cliente['nome']) ?></h2>
            <p class="email-cliente"><?= htmlspecialchars($cliente['email']) ?></p>

            <hr class="divisor-resumo">

            <div class="acoes-perfil">
                <a href="cardapio.php" class="botao-verde-perfil">📖 Fazer Novo Pedido</a>
                <a href="status.php" class="botao-rosa-perfil">🕒 Acompanhar Meu Pedido</a>
            </div>

            <form method="POST" action="login.php" class="form-sair">
                <input type="hidden" name="acao" value="sair_cliente">
                <button type="submit" class="botao-sair-conta">Sair da Conta</button>
            </form>
        </div>
    <?php endif; ?>
</section>

<?php require_once 'rodape.php'; ?>