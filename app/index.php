<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início | Lanchonete Doce Encontro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css"> <!-- Link para o seu CSS -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'doce-pink-light': '#FAF0F2', 'doce-pink-base': '#F3C5CE', 'doce-pink-accent': '#E79DAA', 'doce-pink-dark': '#D87A8C',
                        'doce-mint-light': '#E8F0EC', 'doce-mint-base': '#9BB9A5', 'doce-mint-dark': '#72957E', 'doce-mint-deep': '#4C6B56',
                        'doce-gold': '#D4AF37', 'doce-cream': '#FFFAF5', 'doce-text': '#4A3B32'
                    },
                    fontFamily: { serif: ['"Playfair Display"', 'Georgia', 'serif'], garamond: ['"Cormorant Garamond"', 'serif'], sans: ['Montserrat', 'sans-serif'] }
                }
            }
        }
    </script>
</head>
<body class="antialiased min-h-screen flex flex-col bg-doce-pink-light text-doce-text">
    <div class="pink-awning-bg h-4 w-full shadow-sm"></div>
    <header class="sticky top-0 z-50 bg-doce-mint-base text-white shadow-md border-b-4 border-doce-mint-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-24">
            <a href="index.php" class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-doce-cream border-2 border-doce-gold flex items-center justify-center"><i class="fa-solid fa-mug-hot text-xl text-doce-pink-dark"></i></div>
                <div class="flex flex-col">
                    <span class="text-xs uppercase tracking-[0.3em] font-semibold text-doce-cream">Lanchonete</span>
                    <span class="font-serif text-2xl sm:text-3xl font-bold tracking-wider text-doce-cream">DOCE ENCONTRO</span>
                </div>
            </a>
            <nav class="hidden lg:flex items-center space-x-5 text-xs font-medium">
                <a href="index.php" class="btn-aesthetic-home px-4 py-2 rounded-full text-doce-text font-bold text-xs uppercase flex items-center gap-2"><span class="font-serif">Início</span></a>
                <a href="cardapio.php" class="text-doce-cream hover:text-doce-gold py-1">Cardápio (<?php echo count($cardapio_items); ?>)</a>
                <a href="carrinho.php" class="text-doce-cream hover:text-doce-gold py-1 flex items-center gap-1.5"><i class="fa-solid fa-bag-shopping"></i> Seu Pedido <?php if ($total_itens_carrinho > 0): ?><span class="bg-doce-pink-dark text-white px-2 py-0.5 rounded-full"><?php echo $total_itens_carrinho; ?></span><?php endif; ?></a>
            </nav>
        </div>
    </header>

    <!-- CONTEÚDO DA HOME -->
    <div class="banner">
        <img src="banner.png" width="100%" height="300">
        <section class="py-16 lg:py-24 bg-doce-pink-light">
            <div class="max-w-7xl mx-auto px-4 text-center lg:text-left">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-7 space-y-6">
                        <div class="lado-esquerdo"><i class="fa-solid fa-sparkles text-doce-gold"></i> O Cantinho Mais Charmoso da Cidade</div>
                        <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-doce-text leading-tight">Onde o afeto encontra o <span class="text-doce-pink-dark italic font-garamond">sabor inesquecível</span></h1>
                        <p class="text-base sm:text-lg text-doce-text/80 leading-relaxed">Bem-vindo à <strong>Lanchonete Doce Encontro</strong>. Delicie-se com nossos cafés artesanais frescos e salgados especiais.</p>
                        <div class="pt-4">
                            <a href="cardapio.php" class="bg-doce-mint-base text-white px-8 py-4 rounded-full font-bold shadow-lg hover:bg-doce-mint-dark inline-flex items-center gap-2">
                                <i class="fa-solid fa-book-open"></i> Ver Cardápio Completo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>