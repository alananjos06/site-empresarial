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

$sql = "SELECT id_nov, resumo, descricao FROM novidades ORDER BY id_nov DESC";
$resultado = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Novidades e promoções exclusivas - Sabor&Brasa Churrascaria.">
    <title>Novidades & Promoções - Sabor&Brasa</title>
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
                    <li><a href="produtos.php">Produtos e Serviços</a></li>
                    <li><a href="novidades.php" aria-current="page">Novidades</a></li>
                    <li><a href="contato.html">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="novidades-banner" aria-label="Banner de novidades">
            <div class="novidades-content">
                <h2>Novidades & Promoções</h2>
                <p>Confira as últimas ofertas e novidades do Sabor&Brasa!</p>
            </div>
        </section>

        <div class="container">

            <section id="horarios" aria-label="Horário de funcionamento">
                <h2>Horário de Funcionamento</h2>
                <div class="horarios-container">
                    <div class="horarios-info">
                        <ul class="horarios-lista">
                            <li><span class="dia">Segunda</span><span class="status-fechado">Fechado</span></li>
                            <li><span class="dia">Terça a Sexta</span><span class="horario">11h às 15h (Almoço) | 18h às 23h (Jantar)</span></li>
                            <li><span class="dia">Sábado</span><span class="horario">13h às 23h</span></li>
                            <li><span class="dia">Domingo</span><span class="horario">11h às 22h</span></li>
                        </ul>
                    </div>
                    <div class="aviso-importante">
                        <h4>⚠️ Informação Importante</h4>
                        <p>Aos feriados, consultamos nossos clientes para confirmar disponibilidade. Ligue ou envie mensagem via WhatsApp!</p>
                    </div>
                </div>
            </section>

            <section id="novidades-banco" aria-label="Novidades do banco de dados">
                <h2>Últimas Novidades</h2>
                <?php if (mysqli_num_rows($resultado) > 0): ?>
                <div class="novidades-grid">
                    <?php while ($novidade = mysqli_fetch_assoc($resultado)): ?>
                    <article class="novidade-card">
                        <p class="novidade-resumo">📢 <?php echo htmlspecialchars($novidade['resumo']); ?></p>
                        <p class="novidade-descricao"><?php echo htmlspecialchars($novidade['descricao']); ?></p>
                    </article>
                    <?php endwhile; ?>
                </div>
                <?php else: ?>
                <p style="text-align:center; color:#888; padding: 2rem;">Nenhuma novidade cadastrada no momento.</p>
                <?php endif; ?>
            </section>

            <section id="promocoes-principais" aria-label="Promoções principais">
                <h2>Promoções em Destaque</h2>
                <div class="promocoes-destaque">
                    <article class="promo-card promo-grande">
                        <div class="promo-badge">Exclusivo</div>
                        <h3>Terça é Dia de Promoção!</h3>
                        <p class="promo-descricao">Toda terça-feira: <strong>20% de desconto</strong> em todos os pratos principais para clientes em grupo (mínimo 4 pessoas).</p>
                        <p class="promo-periodo"><strong>Válido:</strong> Todas as terças do mês</p>
                        <a href="contato.html" class="btn-promo">Fazer Reserva</a>
                    </article>
                    <article class="promo-card promo-grande">
                        <div class="promo-badge">Novo</div>
                        <h3>Nosso Novo Menu!</h3>
                        <p class="promo-descricao">Adicionamos novos pratos especiais ao nosso cardápio! Experimente nossa seleção de carnes premium importadas.</p>
                        <p class="promo-periodo"><strong>A partir de:</strong> Agora!</p>
                        <a href="produtos.php" class="btn-promo">Ver Cardápio</a>
                    </article>
                </div>
                <div class="promocoes-grid">
                    <article class="promo-card">
                        <div class="promo-icone">👫</div>
                        <h4>Sexta Romântica</h4>
                        <p><strong>Sextas-feiras | 18h em diante</strong></p>
                        <p class="promo-texto">Venha a dois e ganhe uma taça de vinho premium à sua escolha!</p>
                    </article>
                    <article class="promo-card">
                        <div class="promo-icone">👨‍👩‍👧‍👦</div>
                        <h4>Fim de Semana em Família</h4>
                        <p><strong>Sábados e Domingos</strong></p>
                        <p class="promo-texto">Combo família com até 4 pessoas e <strong>desconto especial</strong>. Acompanhamentos inclusos!</p>
                    </article>
                    <article class="promo-card">
                        <div class="promo-icone">🎓</div>
                        <h4>Desconto Estudantil</h4>
                        <p><strong>Terça a Quinta | Com carteirinha válida</strong></p>
                        <p class="promo-texto">Estudantes ganham <strong>10% de desconto</strong> em qualquer prato.</p>
                    </article>
                    <article class="promo-card">
                        <div class="promo-icone">🎉</div>
                        <h4>Eventos & Corporativo</h4>
                        <p><strong>Consulte disponibilidade</strong></p>
                        <p class="promo-texto">Pacotes especiais para festas, eventos corporativos e reuniões.</p>
                    </article>
                </div>
            </section>

            <section id="eventos" aria-label="Próximos eventos">
                <h2>Próximos Eventos</h2>
                <div class="eventos-timeline">
                    <article class="evento-card">
                        <div class="evento-mes">Abril</div>
                        <h4>Noite de Música ao Vivo</h4>
                        <p>Apresentação de artista local todas as sextas à noite.</p>
                        <p class="evento-info"><strong>Quando:</strong> Sextas em Abril | <strong>Horário:</strong> A partir das 19h</p>
                    </article>
                    <article class="evento-card">
                        <div class="evento-mes">Abril</div>
                        <h4>Rodízio Premium com Garçom</h4>
                        <p>Experiência completa com os melhores cortes diretamente à sua mesa.</p>
                        <p class="evento-info"><strong>Quando:</strong> Todos os sábados | <strong>Reserva obrigatória</strong></p>
                    </article>
                    <article class="evento-card">
                        <div class="evento-mes">Maio</div>
                        <h4>Masterclass: Técnicas de Churrasco</h4>
                        <p>Aprenda técnicas profissionais de grelhado. Inclui degustação e certificado!</p>
                        <p class="evento-info"><strong>Quando:</strong> 15 de Maio | <strong>Vagas limitadas</strong></p>
                    </article>
                </div>
            </section>

            <section class="newsletter-cta" aria-label="Inscrição em newsletter">
                <h2>Fique por Dentro!</h2>
                <p>Receba as últimas promoções e novidades diretamente no seu WhatsApp.</p>
                <div class="newsletter-botoes">
                    <a href="https://wa.me/5511999999999" target="_blank" class="btn-newsletter btn-whatsapp">Seguir no WhatsApp</a>
                </div>
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