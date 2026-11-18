<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Copie o mesmo <head> que está no index.php acima (até o fim da tag </head>) -->
    <title>Cardápio | Lanchonete Doce Encontro</title>
    <!-- Inclua os scripts do tailwind, fontes e o estilo.css exatamente como no arquivo index.php -->
</head>
<body class="antialiased min-h-screen flex flex-col bg-doce-pink-light text-doce-text">
    <!-- Copie o mesmo <header> que está no index.php acima -->

    <!-- CONTEÚDO DO CARDÁPIO -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="text-doce-pink-dark font-semibold text-xs uppercase tracking-widest">Sabores Inesquecíveis</span>
                <h1 class="font-serif text-4xl font-bold text-doce-text mt-1">Nosso Cardápio Artesanal</h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($cardapio_items as $item): ?>
                    <div class="bg-white p-6 rounded-2xl border-2 border-doce-mint-base/30 shadow-md flex flex-col justify-between hover:shadow-xl transition">
                        <div>
                            <div class="flex justify-between items-start mb-3 gap-3">
                                <img src="<?php echo htmlspecialchars($item['imagem']); ?>" alt="<?php echo htmlspecialchars($item['nome']); ?>" class="rounded-xl object-cover h-24 border border-doce-mint-base/20 w-24">
                                <div class="flex flex-col">
                                    <h3 class="font-serif text-lg font-bold text-doce-text leading-snug"><?php echo htmlspecialchars($item['nome']); ?></h3>
                                    <span class="font-serif text-lg font-bold text-doce-mint-dark mt-1">R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></span>
                                </div>
                            </div>
                            <p class="text-xs text-doce-text/70 mb-4 leading-relaxed"><?php echo htmlspecialchars($item['descricao']); ?></p>
                        </div>
                        <div class="flex justify-between items-center pt-3 border-t border-doce-pink-light">
                            <span class="text-[10px] uppercase bg-doce-pink-base/30 text-doce-pink-dark px-2.5 py-1 rounded-md font-semibold"><?php echo htmlspecialchars($item['tag']); ?></span>
                            <!-- LINK ATUALIZADO PARA MANDAR PARA O config.php (via propria página) -->
                            <a href="cardapio.php?action=add_carrinho&id=<?php echo $item['id']; ?>" class="text-xs bg-doce-mint-base hover:bg-doce-mint-dark text-white px-3.5 py-1.5 rounded-full font-semibold flex items-center gap-1 shadow-sm"><i class="fa-solid fa-plus text-[10px]"></i> Pedir</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</body>
</html>