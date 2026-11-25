<?php 
$pagina_atual = 'admin';
$estilo_css = 'admin';
require_once 'cabecalho.php'; 

$logado = !empty($_SESSION['admin_logado']);
$pedidos_lista = $_SESSION['pedidos'] ?? [];

$item_edicao = null;
if ($logado && isset($_GET['editar'])) {
    $id_editar = (int)$_GET['editar'];
    if (isset($produtos[$id_editar])) {
        $item_edicao = $produtos[$id_editar];
    }
}
?>

<?php if (!$logado): ?>
    <div class="fundo-modal-admin">
        <div class="caixa-modal-login">
            <a href="index.php" class="botao-fechar-modal" title="Fechar">✕</a>
            
            <div class="icone-cadeado">🔒</div>
            <h2 class="titulo-modal">Acesso Gerencial</h2>
            <p class="subtitulo-modal">Digite a senha de acesso restrito</p>

            <?php if (isset($_GET['erro_senha'])): ?>
                <div class="erro-login">Senha incorreta! Tente novamente.</div>
            <?php endif; ?>

            <form method="POST" action="admin.php" class="formulario-login">
                <input type="hidden" name="acao" value="login_admin">
                <input type="password" name="senha" placeholder="••••" class="campo-senha" required autofocus>
                <button type="submit" class="botao-entrar-painel">ENTRAR NO PAINEL</button>
            </form>
        </div>
    </div>

<?php else: ?>
    <section class="secao-admin">
        
        <?php if (isset($_GET['msg'])): ?>
            <div class="alerta-admin-sucesso">
                <?php
                $mensagens = [
                    'item_adicionado'   => '✅ Novo item cadastrado com sucesso!',
                    'item_atualizado'   => '✅ Item alterado com sucesso!',
                    'item_excluido'     => '🗑️ Item removido do cardápio!',
                    'restaurado'        => '🔄 Cardápio padrão restaurado!',
                    'status_atualizado' => '🕒 Status do pedido atualizado!'
                ];
                echo $mensagens[$_GET['msg']] ?? '✅ Operação realizada!';
                ?>
            </div>
        <?php endif; ?>

        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Doce Encontro</title>
        </head>
        <body>
             <div class="banner-gerenciador">
            <div>
                <span class="etiqueta-painel">⚙️ PAINEL ADMINISTRATIVO</span>
                <h1 class="titulo-gerenciador">Gerenciador da Lanchonete</h1>
                <p class="subtitulo-gerenciador">Acompanhe os pedidos recebidos e gerencie o cardápio em tempo real.</p>
            </div>

            <div class="acoes-banner">
                <form method="POST" action="admin.php">
                    <input type="hidden" name="acao" value="restaurar_padrao">
                    <button type="submit" class="botao-restaurar"> Restaurar Cardápio Padrão</button>
                </form>
                <form method="POST" action="admin.php">
                    <input type="hidden" name="acao" value="sair_admin">
                    <button type="submit" class="botao-sair-admin">Sair</button>
                </form>
            </div>
        </div>

        <div class="grade-admin">
            
            <div class="cartao-admin">
                <div class="cabecalho-cartao-admin">
                    <h3><?= $item_edicao ? '✏️ Alterar Item' : '➕ Cadastrar Novo Item' ?></h3>
                    <?php if ($item_edicao): ?>
                        <a href="admin.php" class="link-cancelar-edicao">CANCELAR EDIÇÃO</a>
                    <?php endif; ?>
                </div>

                <form method="POST" action="admin.php" class="formulario-item">
                    <input type="hidden" name="acao" value="<?= $item_edicao ? 'atualizar_item' : 'cadastrar_item' ?>">
                    <?php if ($item_edicao): ?>
                        <input type="hidden" name="id_produto" value="<?= $item_edicao['id'] ?>">
                    <?php endif; ?>

                    <div class="grupo-campo">
                        <label>Nome do Item *</label>
                        <input type="text" name="nome" placeholder="Ex: Torta de Pistache" value="<?= htmlspecialchars($item_edicao['nome'] ?? '') ?>" required>
                    </div>

                    <div class="linha-dupla-campos">
                        <div class="grupo-campo">
                            <label>Preço (R$) *</label>
                            <input type="text" name="preco" placeholder="15.00" value="<?= $item_edicao ? number_format($item_edicao['preco'], 2, '.', '') : '' ?>" required>
                        </div>

                        <div class="grupo-campo">
                            <label>Categoria *</label>
                            <select name="categoria">
                                <?php $cat_atual = $item_edicao['categoria'] ?? 'CAFÉS'; ?>
                                <option value="CAFÉS" <?= ($cat_atual == 'CAFÉS') ? 'selected' : '' ?>>Cafés</option>
                                <option value="DOCES" <?= ($cat_atual == 'DOCES') ? 'selected' : '' ?>>Doces</option>
                                <option value="SALGADOS" <?= ($cat_atual == 'SALGADOS') ? 'selected' : '' ?>>Salgados</option>
                                <option value="BEBIDAS" <?= ($cat_atual == 'BEBIDAS') ? 'selected' : '' ?>>Bebidas</option>
                            </select>
                        </div>
                    </div>

                    <div class="grupo-campo">
                        <label>Tag / Selo Especial</label>
                        <input type="text" name="tag" placeholder="Ex: Mais Pedido, Artesanal" value="<?= htmlspecialchars($item_edicao['tag'] ?? '') ?>">
                    </div>

                    <div class="grupo-campo">
                        <label>Nome do Ficheiro de Imagem</label>
                        <input type="text" name="imagem" placeholder="Ex: expresso.jpg ou torta.png" value="<?= htmlspecialchars(str_replace(['img/', 'imagem/'], '', $item_edicao['imagem'] ?? '')) ?>">
                    </div>

                    <div class="grupo-campo">
                        <label>Descrição Delicada *</label>
                        <textarea name="descricao" rows="3" placeholder="Descreva os ingredientes..." required><?= htmlspecialchars($item_edicao['descricao'] ?? '') ?></textarea>
                    </div>

                    <button type="submit" class="botao-salvar-item">
                         <?= $item_edicao ? 'ATUALIZAR ITEM' : 'SALVAR NO CARDÁPIO' ?>
                    </button>
                </form>
            </div>

            <div class="coluna-direita-admin">
                
                <div class="cartao-admin">
                    <div class="cabecalho-cartao-admin">
                        <h3> Pedidos Recebidos</h3>
                        <span class="contador-itens-badge"><?= count($pedidos_lista) ?> pedido(s)</span>
                    </div>

                    <?php if (empty($pedidos_lista)): ?>
                        <p style="color: #8c8082; font-size: 13px;">Nenhum pedido recebido ainda.</p>
                    <?php else: ?>
                        <div class="lista-pedidos-admin">
                            <?php foreach ($pedidos_lista as $ped): ?>
                                <?php $etapa_ped = $ped['etapa'] ?? 1; ?>
                                <div class="card-pedido-detalhe">
                                    
                                    <div class="topo-card-pedido">
                                        <div>
                                            <span class="codigo-ped-badge"><?= htmlspecialchars($ped['codigo']) ?></span>
                                            <span class="horario-ped">🕒 <?= htmlspecialchars($ped['horario']) ?></span>
                                        </div>
                                        <div class="valor-ped">
                                            R$ <?= number_format($ped['valor_total'], 2, ',', '.') ?>
                                        </div>
                                    </div>

                                    <div class="info-cliente-ped">
                                        <p><strong>👤 Cliente:</strong> <?= htmlspecialchars($ped['nome_cliente']) ?></p>
                                        <p><strong>📧 E-mail:</strong> <?= htmlspecialchars($ped['email_cliente']) ?> &nbsp;|&nbsp; <strong>📱 Tel:</strong> <?= htmlspecialchars($ped['telefone_cliente']) ?></p>
                                        <p><strong>💳 Pagamento:</strong> <?= htmlspecialchars($ped['pagamento']) ?></p>
                                    </div>

                                    <div class="box-modalidade-ped <?= ($ped['modalidade'] === 'Delivery Entrega') ? 'is-delivery' : '' ?>">
                                        <strong>Modalidade: <?= htmlspecialchars($ped['modalidade']) ?></strong>
                                        <?php if ($ped['modalidade'] === 'Delivery Entrega' && !empty($ped['endereco'])): ?>
                                            <p class="endereco-ped"> <strong>Endereço:</strong> <?= htmlspecialchars($ped['endereco']) ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="lista-itens-ped">
                                        <span class="titulo-itens-ped"> Itens do Pedido:</span>
                                        <ul>
                                            <?php foreach ($ped['itens'] as $it): ?>
                                                <li>
                                                    <span><strong><?= $it['qtd'] ?>x</strong> <?= htmlspecialchars($it['nome']) ?></span>
                                                    <span>R$ <?= number_format($it['subtotal'], 2, ',', '.') ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                    <div class="botoes-status-grid">
                                        <?php 
                                        $etapas_lista = [
                                            1 => '1. Recebido',
                                            2 => '2. Em Preparo',
                                            3 => '3. A Caminho',
                                            4 => '4. Entregue'
                                        ];
                                        foreach ($etapas_lista as $num => $rotulo): 
                                        ?>
                                            <form method="POST" action="admin.php">
                                                <input type="hidden" name="acao" value="mudar_etapa">
                                                <input type="hidden" name="codigo_pedido" value="<?= htmlspecialchars($ped['codigo']) ?>">
                                                <input type="hidden" name="etapa" value="<?= $num ?>">
                                                <button type="submit" class="botao-etapa <?= ($etapa_ped == $num) ? 'ativa' : '' ?>">
                                                    <?= $rotulo ?>
                                                </button>
                                            </form>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="cartao-admin">
                    <div class="cabecalho-cartao-admin">
                        <h3> Lista de Todos os Itens</h3>
                        <span class="contador-itens-badge"><?= count($produtos) ?> itens no total</span>
                    </div>

                    <div class="tabela-wrapper">
                        <table class="tabela-admin">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Categoria</th>
                                    <th>Preço</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produtos as $prod): ?>
                                    <tr>
                                        <td class="celula-item">
                                            <img src="<?= htmlspecialchars($prod['imagem']) ?>" alt="" class="miniatura-tabela">
                                            <span><?= htmlspecialchars($prod['nome']) ?></span>
                                        </td>
                                        <td>
                                            <span class="badge-categoria"><?= htmlspecialchars($prod['categoria'] ?? 'GERAL') ?></span>
                                        </td>
                                        <td class="celula-preco">
                                            R$ <?= number_format($prod['preco'], 2, ',', '.') ?>
                                        </td>
                                        <td class="celula-acoes">
                                            <a href="admin.php?editar=<?= $prod['id'] ?>" class="botao-icone-editar" title="Editar">✏️</a>
                                            
                                            <form method="POST" action="admin.php" class="form-inline">
                                                <input type="hidden" name="acao" value="excluir_item">
                                                <input type="hidden" name="id_produto" value="<?= $prod['id'] ?>">
                                                <button type="submit" class="botao-icone-excluir" title="Excluir">🗑️</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
        </body>
        </html>
       
<?php endif; ?>

<?php require_once 'rodape.php'; ?>