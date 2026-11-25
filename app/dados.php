<?php
session_start();
$produtos = [
    1 => [
        'id' => 1,
        'nome' => 'Pão de queijo Romeu & Julieta',
        'preco' => 18.50,
        'descricao' => 'Folhado artesanal com queijo brie e peito de peru.',
        'tag' => 'QUENTINHO',
        'imagem' => 'imagem/paoqueijo.png'
    ], 

    2 => [
        'id' => 2,
        'nome' => 'Pastelzinho',
        'preco' => 10.90,
        'descricao' => 'Pastel frito de carne super recheado',
        'tag' => 'MAIS PEDIDO',
        'imagem' => 'imagem/pastel.png'
    ],

    3 => [
        'id' => 3,
        'nome' => 'Esfiha',
        'preco' => 10.90,
        'descricao' => 'Esfiha aberta de carne, super recheada e com massa feita de fubá.',
        'tag' => 'EM ALTA',
        'imagem' => 'imagem/esfiha.png'
    ],
    
        4=> [
        'id' => 4,
        'nome' => 'Coxinha',
        'preco' => 8.90,
        'descricao' => 'Coxinha recheada com frango desfiado e requeijão cremoso, super crocante.',
        'tag' => 'TOP DO MOMENTO',
        'imagem' => 'imagem/coxinha.png'
    ],
        5 => [
        'id' => 5,
        'nome' => 'Quiche Lorraine',
        'preco' => 16.90,
        'descricao' => 'Torta quiche lorraine salgada de calabresa.',
        'tag' => 'NOVO',
        'imagem' => 'imagem/quiche.png'
    ],
        6 => [
        'id' => 6,
        'nome' => 'Enroladinho de salsicha',
        'preco' => 7.90,
        'descricao' => 'Enroladinho de salsicha assado artesanal.',
        'tag' => 'MAIS PEDIDO',
        'imagem' => 'imagem/enroladinhosalsicha.png'
    ],
       7 => [
        'id' => 7,
        'nome' => 'Folhado',
        'preco' => 12.90,
        'descricao' => 'Folhado de frango desfiado cremoso amanteigado.',
        'tag' => 'MAIS PEDIDO',
        'imagem' => 'imagem/folhado.png'
    ],
        8 => [
        'id' => 8,
        'nome' => 'Expresso Doce Encontro',
        'preco' => 10.90,
        'descricao' => 'Blend exclusivo 100% arábica com mini trufa artesanal.',
        'tag' => 'MAIS PEDIDO',
        'imagem' => 'imagem/expresso.png'
    ],
        9 => [
        'id' => 9,
        'nome' => 'Cappuccino de Avelã',
        'preco' => 16.50,
        'descricao' => 'Expresso, leite vaporizado, avelã e canela polvilhada.',
        'tag' => 'ARTESANAL',
        'imagem' => 'imagem/chocolatequente.png'
    ],
        10 => [
        'id' => 10,
        'nome' => 'Pink Velvet Latte',
        'preco' => 18.00,
        'descricao' => 'Leite cremoso com toque suave de baunilha e chantilly rosa.',
        'tag' => 'ESPECIAL',
        'imagem' => 'imagem/pinklatte.png'
    ],
        11 => [
        'id' => 11,
        'nome' => 'Macchiato',
        'preco' => 15.00,
        'descricao' => ' Dose de espresso de grãos especiais finalizada com uma camada cremosa de espuma de leite.',
        'tag' => 'SUCESSO',
        'imagem' => 'imagem/machiatto.png'
    ],
        12 => [
        'id' => 12,
        'nome' => 'Matcha',
        'preco' => 18.00,
        'descricao' => 'Chá verde japonês de alta qualidade combinado com leite vaporizado cremoso. Bebida aromática, suave e aveludada.',
        'tag' => 'EM ALTA',
        'imagem' => 'imagem/matcha.png'
    ],
       14 => [
        'id' => 14,
        'nome' => 'Soda de Maracujá',
        'preco' => 15.00,
        'descricao' => 'Bebida gaseficada de maracujá refrescante.',
        'tag' => 'SUCESSO',
        'imagem' => 'imagem/sodamaracuja.png'
    ],
        15 => [
        'id' => 15,
        'nome' => 'Soda de Morango',
        'preco' => 15.00,
        'descricao' => 'Bebida gaseficada de morango refrescante.',
        'tag' => 'SUCESSO',
        'imagem' => 'imagem/sodamorango.png'
    ],

    16 => [
        'id' => 16,
        'nome' => 'Torta Rosa de Frutas Vermelhas',
        'preco' => 19.90,
        'descricao' => 'Massa sablée, creme de baunilha e seleção de frutas vermelhas.',
        'tag' => 'SUCESSO',
        'imagem' => 'imagem/framboesa.png'
    ],
    17 => [
        'id' => 17,
        'nome' => 'Trio de Macarons Vintage',
        'preco' => 15.00,
        'descricao' => 'Pistache, Framboesa e Doce de Leite.',
        'tag' => 'SEM GLÚTEN',
        'imagem' => 'imagem/macarons.png'
    ],
    18 => [
        'id' => 18,
        'nome' => 'Brigadeiro',
        'preco' => 15.00,
        'descricao' => 'Caixa de brigadeiro de sabores sortidos e gourmet.',
        'tag' => 'GOURMET',
        'imagem' => 'imagem/brigadeiro.png'
    ],
    19 => [
        'id' => 19,
        'nome' => 'Torta de Limão',
        'preco' => 15.00,
        'descricao' => 'Fatia de torta de limão cremosa .',
        'tag' => 'SUCESSO',
        'imagem' => 'imagem/limao.png'
    ],
    20 => [
        'id' => 20,
        'nome' => 'Red Velvet',
        'preco' => 15.00,
        'descricao' => 'Fatia de bolo de Red Velvet fofinho e delicioso.',
        'tag' => 'SUCESSO',
        'imagem' => 'imagem/redvelvet.png'
    ],
        21 => [
        'id' => 21,
        'nome' => 'Cupcake',
        'preco' => 8.90,
        'descricao' => 'Cupcake de baunilha e creme de ninho.',
        'tag' => 'EM ALTA',
        'imagem' => 'imagem/cupcakes.png'
    ],
    22 => [
        'id' => 22,
        'nome' => 'Cheescake ',
        'preco' => 20.00,
        'descricao' => 'Cheescake de mirtilo e pistache',
        'tag' => 'SUCESSO',
        'imagem' => 'imagem/cheescakepistache.png'
    ],

   
];
$cardapio_padrao = $produtos;
if (!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = $cardapio_padrao;
}
$produtos = &$_SESSION['produtos'];
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['pedidos'])) {
    $_SESSION['pedidos'] = [
        'DE-8492' => [
            'codigo' => 'DE-8492',
            'horario' => date('d/m/Y H:i'),
            'nome_cliente' => 'Ana Beatriz Silva',
            'email_cliente' => 'ana.beatriz@email.com',
            'telefone_cliente' => '(11) 98765-4321',
            'modalidade' => 'Delivery Entrega',
            'endereco' => 'Rua das Acácias, 450 - Jardim Paulista (CEP: 01400-000) - Apto 12',
            'pagamento' => 'PIX (Aprovação Imediata)',
            'itens' => [
                ['nome' => 'Pão de queijo Romeu & Julieta', 'qtd' => 2, 'subtotal' => 37.00],
                ['nome' => 'Cappuccino de Avelã', 'qtd' => 1, 'subtotal' => 16.50]
            ],
            'valor_total' => 53.50,
            'etapa' => 1
        ]
    ];
}

if (!isset($_SESSION['ultimo_pedido'])) {
    $_SESSION['ultimo_pedido'] = $_SESSION['pedidos']['DE-8492'];
}

$senha_gerencial = '1234';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    $id_produto = (int)($_POST['id_produto'] ?? 0);

    if ($acao === 'adicionar' && isset($produtos[$id_produto])) {
        $_SESSION['carrinho'][$id_produto] = ($_SESSION['carrinho'][$id_produto] ?? 0) + 1;
        header('Location: carrinho.php');
        exit;
    }

    if ($acao === 'aumentar' && isset($_SESSION['carrinho'][$id_produto])) {
        $_SESSION['carrinho'][$id_produto]++;
        header('Location: carrinho.php');
        exit;
    }

    if ($acao === 'diminuir' && isset($_SESSION['carrinho'][$id_produto])) {
        $_SESSION['carrinho'][$id_produto]--;
        if ($_SESSION['carrinho'][$id_produto] <= 0) {
            unset($_SESSION['carrinho'][$id_produto]);
        }
        header('Location: carrinho.php');
        exit;
    }

    if ($acao === 'remover' && isset($_SESSION['carrinho'][$id_produto])) {
        unset($_SESSION['carrinho'][$id_produto]);
        header('Location: carrinho.php');
        exit;
    }

   if ($acao === 'finalizar_pedido') {
        $modalidade = $_POST['modalidade'] ?? 'Comer no Local';
        $nome_cliente = trim($_POST['nome_cliente'] ?? 'Cliente');
        $email_cliente = trim($_POST['email_cliente'] ?? 'Não informado');
        $telefone_cliente = trim($_POST['telefone_cliente'] ?? 'Não informado');
        $pagamento = $_POST['pagamento'] ?? 'PIX';

        $rua = trim($_POST['rua'] ?? '');
        $numero = trim($_POST['numero'] ?? '');
        $bairro = trim($_POST['bairro'] ?? '');
        $cep = trim($_POST['cep'] ?? '');
        $complemento = trim($_POST['complemento'] ?? '');

        $endereco_completo = '';
        if ($modalidade === 'Delivery Entrega') {
            $endereco_completo = ($rua ?: 'Rua não informada') . ', ' . ($numero ?: 'S/N');
            if ($bairro) $endereco_completo .= ' - ' . $bairro;
            if ($cep) $endereco_completo .= ' (CEP: ' . $cep . ')';
            if ($complemento) $endereco_completo .= ' - ' . $complemento;
        }

        $itens_pedido = [];
        $total_pedido = 0.0;
        foreach ($_SESSION['carrinho'] as $id => $qtd) {
            if (isset($produtos[$id])) {
                $sub = $produtos[$id]['preco'] * $qtd;
                $total_pedido += $sub;
                $itens_pedido[] = [
                    'nome' => $produtos[$id]['nome'],
                    'qtd' => $qtd,
                    'subtotal' => $sub
                ];
            }
        }

        $codigo_novo = 'DE-' . rand(1000, 9999);
        $novo_pedido = [
            'codigo' => $codigo_novo,
            'horario' => date('d/m/Y \à\s H:i'),
            'nome_cliente' => $nome_cliente,
            'email_cliente' => $email_cliente,
            'telefone_cliente' => $telefone_cliente,
            'modalidade' => $modalidade,
            'endereco' => $endereco_completo,
            'pagamento' => $pagamento,
            'itens' => $itens_pedido,
            'valor_total' => $total_pedido,
            'etapa' => 1
        ];

        $_SESSION['pedidos'] = [$codigo_novo => $novo_pedido] + $_SESSION['pedidos'];
        $_SESSION['ultimo_pedido'] = $novo_pedido;
        $_SESSION['carrinho'] = [];

        header('Location: status.php?sucesso=1');
        exit;
    }

    if ($acao === 'login_admin') {
        $senha_digitada = $_POST['senha'] ?? '';
        if ($senha_digitada === $senha_gerencial) {
            $_SESSION['admin_logado'] = true;
            header('Location: admin.php');
            exit;
        } else {
            header('Location: admin.php?erro_senha=1');
            exit;
        }
    }

    if ($acao === 'sair_admin') {
        unset($_SESSION['admin_logado']);
        header('Location: index.php');
        exit;
    }
    if ($acao === 'login_cliente') {
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');
        $nome  = trim($_POST['nome'] ?? '');

        if (!empty($email) && !empty($senha)) {
            if (empty($nome)) {
                $nome = ucfirst(explode('@', $email)[0]);
            }
            $_SESSION['cliente_logado'] = [
                'nome'  => $nome,
                'email' => $email,
                'metodo' => 'E-mail e Senha'
            ];
            header('Location: login.php?sucesso=1');
            exit;
        }
    }

    if ($acao === 'login_google') {
        $_SESSION['cliente_logado'] = [
            'nome'  => 'Cliente Google',
            'email' => 'cliente.doce@gmail.com',
            'metodo' => 'Conta Google'
        ];
        header('Location: login.php?sucesso=1');
        exit;
    }

    if ($acao === 'sair_cliente') {
        unset($_SESSION['cliente_logado']);
        header('Location: login.php');
        exit;
    }

    if (!empty($_SESSION['admin_logado'])) {
        if ($acao === 'mudar_etapa') {
            $nova_etapa = (int)($_POST['etapa'] ?? 1);
            $cod_pedido = $_POST['codigo_pedido'] ?? ($_SESSION['ultimo_pedido']['codigo'] ?? '');

            if (isset($_SESSION['pedidos'][$cod_pedido])) {
                $_SESSION['pedidos'][$cod_pedido]['etapa'] = $nova_etapa;
            }
            if (($_SESSION['ultimo_pedido']['codigo'] ?? '') === $cod_pedido) {
                $_SESSION['ultimo_pedido']['etapa'] = $nova_etapa;
            }

            header('Location: admin.php?msg=status_atualizado');
            exit;
        }

        if ($acao === 'cadastrar_item') {
            $novo_id = empty($produtos) ? 1 : (max(array_keys($produtos)) + 1);
            $nome_img = trim($_POST['imagem'] ?? '');
            if ($nome_img !== '' && strpos($nome_img, '/') === false) {
                $nome_img = 'img/' . $nome_img;
            }

            $produtos[$novo_id] = [
                'id' => $novo_id,
                'nome' => trim($_POST['nome'] ?? 'Novo Item'),
                'preco' => (float)str_replace(',', '.', $_POST['preco'] ?? 0),
                'categoria' => strtoupper(trim($_POST['categoria'] ?? 'CAFÉS')),
                'tag' => strtoupper(trim($_POST['tag'] ?? 'NOVO')),
                'imagem' => $nome_img ?: 'img/expresso.jpg',
                'descricao' => trim($_POST['descricao'] ?? '')
            ];
            header('Location: admin.php?msg=item_adicionado');
            exit;
        }
        if ($acao === 'atualizar_item' && isset($produtos[$id_produto])) {
            $nome_img = trim($_POST['imagem'] ?? '');
            if ($nome_img !== '' && strpos($nome_img, '/') === false) {
                $nome_img = 'img/' . $nome_img;
            }

            $produtos[$id_produto]['nome'] = trim($_POST['nome'] ?? $produtos[$id_produto]['nome']);
            $produtos[$id_produto]['preco'] = (float)str_replace(',', '.', $_POST['preco'] ?? $produtos[$id_produto]['preco']);
            $produtos[$id_produto]['categoria'] = strtoupper(trim($_POST['categoria'] ?? $produtos[$id_produto]['categoria']));
            $produtos[$id_produto]['tag'] = strtoupper(trim($_POST['tag'] ?? $produtos[$id_produto]['tag']));
            $produtos[$id_produto]['imagem'] = $nome_img ?: $produtos[$id_produto]['imagem'];
            $produtos[$id_produto]['descricao'] = trim($_POST['descricao'] ?? $produtos[$id_produto]['descricao']);

            header('Location: admin.php?msg=item_atualizado');
            exit;
        }
        if ($acao === 'excluir_item' && isset($produtos[$id_produto])) {
            unset($produtos[$id_produto]);
            unset($_SESSION['carrinho'][$id_produto]);
            header('Location: admin.php?msg=item_excluido');
            exit;
        }
        if ($acao === 'restaurar_padrao') {
            $_SESSION['produtos'] = $cardapio_padrao;
            header('Location: admin.php?msg=restaurado');
            exit;
        }
    }
}
    $total_itens = 0;
    $valor_total = 0.0;
        foreach ($_SESSION['carrinho'] as $id => $qtd) {
            if (isset($produtos[$id])) {
             $total_itens += $qtd;
             $valor_total += $produtos[$id]['preco'] * $qtd;
    }
}
?>
