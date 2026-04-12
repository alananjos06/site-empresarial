<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "empresa";

$conn = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conn) {
    die("<p style='color:red; text-align:center;'>Erro ao conectar ao banco de dados: " . mysqli_connect_error() . "</p>");
}

mysqli_set_charset($conn, "utf8");

$sql = "SELECT id_prod, nome, valor, qtdestoque, descricao, imagem, badge FROM produtos ORDER BY nome ASC";
$resultado = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cardápio - Sabor&Brasa Churrascaria Premium">
    <title>Produtos e Serviços - Sabor&Brasa</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo-area">
                <div class="logo-wrapper">
                    <img src="imagens/logo-restaurante.png" width="150px" height="150px">
                    <h1>Sabor&Brasa<span> Restaurante e Churrascaria</span></h1>
                </div>
            </div>
            <nav role="navigation" aria-label="Menu principal">
                <ul>
                    <li><a href="index.html">Página Inicial</a></li>
                    <li><a href="sobre.html">Sobre</a></li>
                    <li><a href="produtos.php" aria-current="page">Produtos e Serviços</a></li>
                    <li><a href="novidades.php">Novidades</a></li>
                    <li><a href="contato.html">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="novidades-banner" aria-label="Banner produtos">
    <div class="novidades-content">
        <h2>Nossos Produtos e Serviços</h2>
        <p>Explore nossa variedade de pratos, atualizado diariamente com os melhores sabores!</p>
    </div>
        </section>
            <section class="produtos-dinamicos" aria-label="Lista de produtos do banco de dados">
                <h3>Cardápio Completo</h3>

                <?php if (mysqli_num_rows($resultado) > 0): ?>
                <div class="produtos-grid">
                    <?php while ($produto = mysqli_fetch_assoc($resultado)): ?>
                    <article class="produto-card">
    <?php if (!empty($produto['imagem'])): ?>
    <div class="produto-imagem">
        <?php if (!empty($produto['badge'])): ?>
        <span class="badge"><?php echo $produto['badge']; ?></span>
        <?php endif; ?>
        <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
    </div>
    <?php endif; ?>
    <h4><?php echo htmlspecialchars($produto['nome']); ?></h4>
    <?php if (!empty($produto['descricao'])): ?>
    <p class="produto-descricao"><?php echo htmlspecialchars($produto['descricao']); ?></p>
    <?php endif; ?>
    <p class="produto-preco">
        R$ <?php echo number_format($produto['valor'], 2, ',', '.'); ?>
    </p>
</article>
                    <?php endwhile; ?>
                </div>
                <?php else: ?>
                <p style="text-align:center; color:#888; padding: 2rem;">
                    Nenhum produto cadastrado no momento. Consulte-nos pelo WhatsApp!
                </p>
                <?php endif; ?>
            </section>

            <section class="cta-cardapio" aria-label="Chamada para ação">
                <h3>Está com fome? Faça sua Reserva!</h3>
                <p>Garanta sua mesa para saborear os melhores pratos da região</p>
                <a href="contato.html" class="btn-reserva-grande">Reservar Agora</a>
            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Sabor&Brasa - Todos os direitos estão reservados.</p>
        <p>Equipe: Alana, Kelly, Monique e Giovanna</p>
    </footer>
</body>
</html>
<?php mysqli_close($conn); ?>