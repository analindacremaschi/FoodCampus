<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Copie o mesmo <head> que está no index.php -->
    <title>Seu Pedido | Lanchonete Doce Encontro</title>
</head>
<body class="antialiased min-h-screen flex flex-col bg-doce-pink-light text-doce-text">
    <!-- Copie o mesmo <header> que está no index.php -->

    <!-- CONTEÚDO DO CARRINHO -->
    <section class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
                <div>
                    <span class="text-doce-pink-dark font-semibold text-xs uppercase tracking-widest">Sacola Doce Encontro</span>
                    <h1 class="font-serif text-3xl sm:text-4xl font-bold text-doce-text mt-1">Seu Pedido</h1>
                </div>
                <a href="cardapio.php" class="text-xs font-bold text-doce-mint-deep hover:text-doce-pink-dark transition flex items-center gap-1.5 bg-white px-4 py-2.5 rounded-full shadow-sm w-fit"><i class="fa-solid fa-arrow-left"></i> Adicionar mais delícias</a>
            </div>

            <?php if (empty($_SESSION['carrinho'])): ?>
                <div class="bg-white p-12 rounded-3xl text-center shadow-md max-w-xl mx-auto">
                    <h3 class="font-serif text-2xl font-bold text-doce-text">Sua sacola está vazia</h3>
                    <a href="cardapio.php" class="bg-doce-mint-base text-white px-6 py-3 rounded-full font-bold text-xs mt-4 inline-block">Ver Cardápio</a>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <div class="lg:col-span-7 space-y-4">
                        <?php foreach ($_SESSION['carrinho'] as $id_c => $qtd_c): ?>
                            <?php $prod = $cardapio_items[$id_c]; ?>
                            <div class="bg-white p-5 rounded-2xl shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <img src="<?php echo htmlspecialchars($prod['imagem']); ?>" class="w-20 h-20 rounded-xl object-cover">
                                    <div>
                                        <h3 class="font-serif text-lg font-bold"><?php echo htmlspecialchars($prod['nome']); ?></h3>
                                        <p class="text-xs">Quantidade: <strong><?php echo $qtd_c; ?></strong></p>
                                    </div>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <a href="carrinho.php?action=menos_qtd&id=<?php echo $prod['id']; ?>" class="w-6 h-6 rounded-full bg-doce-pink-base text-center">-</a>
                                    <span><?php echo $qtd_c; ?></span>
                                    <a href="carrinho.php?action=mais_qtd&id=<?php echo $prod['id']; ?>" class="w-6 h-6 rounded-full bg-doce-mint-base text-center text-white">+</a>
                                    <a href="carrinho.php?action=del_carrinho&id=<?php echo $prod['id']; ?>" class="text-red-500 ml-2"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="lg:col-span-5 bg-doce-cream p-6 rounded-3xl border-4 border-doce-mint-base shadow-xl">
                        <h2 class="font-serif text-2xl font-bold text-doce-text pb-4 border-b-2 mb-5">Resumo do Pedido</h2>
                        <div class="flex justify-between items-center mb-6">
                            <span class="font-serif text-lg font-bold">TOTAL:</span>
                            <span class="font-serif text-3xl font-bold text-doce-pink-dark">R$ <?php echo number_format($subtotal_carrinho, 2, ',', '.'); ?></span>
                        </div>
                        <a href="entrega.php" class="w-full bg-doce-mint-base text-white font-bold py-4 rounded-full text-center block">Escolher forma de Entrega</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>